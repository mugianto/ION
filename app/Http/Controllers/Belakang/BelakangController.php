<?php

namespace App\Http\Controllers\Belakang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Intervention\Image\ImageManagerStatic as Image;


class BelakangController extends Controller
{
    protected $uploadPath;

    public function __construct()
    {
        $this->uploadPath = [
            'tmptImgOtentik' => public_path('/storage/asetnya/upl/gambar/artikel/otentik'),
            'tmptImgOtentikTmbh' => public_path('/storage/asetnya/upl/gambar/artikel/otentik/tambahan'),
            'tmptImgThumb' => public_path('/storage/asetnya/upl/gambar/artikel/thumb')
        ];
    }
    
    public function index(Request $request) 
    {
        $onlyTrashed = FALSE;
        $userRole = session('user_role');
        if(($lihat = $request->get('lihat')) && $lihat == 'bin' )
        {
            $artikels = Artikel::onlyTrashed()->with('kategori', 'penulis')->get();
            $onlyTrashed = TRUE;
        } elseif($lihat == 'terbit') {
            $artikels = Artikel::terbit()->with('kategori', 'penulis')->get();
        } elseif($lihat == 'terjadwal') {
            $artikels = Artikel::terjadwal()->with('kategori', 'penulis')->get();
        } elseif($lihat == 'draft') {
            $artikels = Artikel::draft()->with('kategori', 'penulis')->get();
        } else {
            $artikels = Artikel::get();
        }
        return view('belakang.artikel.cmanArtikel', compact('artikels', 'onlyTrashed', 'userRole')); 
        // dd($artikels);
    }

    public function create(Artikel $artikel)
    {
        $this->authorize('membuat');
        // Logika untuk membuat artikel
        $kategoris = Kategori::get();
        return view('belakang.artikel.create', compact('artikel', 'kategoris'));
    }

    public function store(Requests\ArtikelRequest $request) 
    {
        $this->authorize('membuat');
        // Logika untuk menyimpan artikel
        $reqData = $this->handleRequest($request);
        // $request->user()->artikels()->create($reqData);
        $artikel = new Artikel($reqData);
        $artikel->created_at = now();
        $artikel->updated_at = now();
        $request->user()->artikels()->save($artikel);

        return redirect(route('artikel.index'))->with('pesanBagus', '<i class=" text-success" data-feather="check-square"></i> Artikel | <span class="text-info">' . $artikel->judul . '</span> | <strong class="text-success ">Berhasil Dibuat</strong>');
    }

    private function handleRequest($request)
    {
        $reqData = $request->all();
        $judulArtikel = $request->input('judul');
        $judulArtikel = Str::slug($judulArtikel, '-');
        $tglNow = now()->format('Ymd-His');
        
        if ($request->hasFile('gambar')) {
            $gambarNya = $request->file('gambar');
            $namaFileTanpaEkstensi = pathinfo($gambarNya->getClientOriginalName(), PATHINFO_FILENAME);
            $namaGambar = $tglNow . '-' . $judulArtikel . '-' . $gambarNya->getClientOriginalName();
            $namaThumbGambar = $tglNow . '-' . $judulArtikel . '-' . $gambarNya->getClientOriginalName();
            $tempatGambarOtentik = $this->uploadPath['tmptImgOtentik'];
            $tempatGambarThumb = $this->uploadPath['tmptImgThumb'];
    
            // Simpan gambar asli di folder 'otentik'
            $gambarNya->move($tempatGambarOtentik, $namaGambar);
    
            // Buat thumbnail dengan ukuran 335x173 px dan simpan di folder 'thumb'
            $thumbnail = Image::make($tempatGambarOtentik . '/' . $namaGambar)
                ->fit(335, 173)
                ->save($tempatGambarThumb . '/' . $namaThumbGambar);
    
            $reqData['gambar'] = $namaGambar;
        }
    
        return $reqData;
    }

    public function show($id)
    {
        // dd('show');
    }

    public function edit($id)
    {
        $this->authorize('edit');
        // Logika untuk mengedit artikel
        $artikel = Artikel::findOrFail($id);
        $kategoris = Kategori::get();
        return view('belakang.artikel.edit', compact('artikel', 'kategoris')); 
    } 

    public function update(Requests\ArtikelRequest $request, $id)
    {
        $this->authorize('edit');
        // Logika untuk menyimpan perubahan artikel
        $artikel    = Artikel::findOrFail($id);
        $gambarLama = $artikel->image;
        $data     = $this->handleRequest($request);
        $artikel->update($data);

        if ($gambarLama !== $artikel->image) {
            $this->removeImage($gambarLama);
        }
        return redirect(route('artikel.index'))->with('pesanBagus', '<i class=" text-success" data-feather="check-circle"></i> Artikel | <span class="text-info">' . $artikel->judul . '</span> | <strong class="text-success ">Berhasil Diupdate</strong>');
    }

    public function destroy($id)
    {
        $this->authorize('hapus');
        // Logika untuk menghapus artikel
        // Artikel::findOrFail($id)->delete();
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();
        return redirect('/cman/artikel')->with('pesanError',  [
            'message' => '<i class="text-danger" data-feather="x-circle"></i> Artikel | <span class="text-info">' . $artikel->judul . '</span> | <span  class=" text-danger">Dibuang ke BIN</span> ',
            'type' => 'error'
        ]);
    }
    
    public function restore($id)
    {
        $this->authorize('pulihkan');
        $artikelId = Artikel::withTrashed()->findOrFail($id)->id;
        $artikel = Artikel::withTrashed()->findOrFail($id);
        $artikel->restore();
    
        return redirect('/cman/artikel?lihat=bin')->with('pesanBagus', '<i class=" text-success" data-feather="check-square"></i> Artikel | <span class="text-info">' . $artikel->judul . '</span> | <strong class="text-success ">Berhasil Dipulihkan</strong>');

    }
    
    public function forceDestroy($id)
    {
        $this->authorize('permanen');
        // Logika untuk menghapus permanen artikel
        $artikel = Artikel::withTrashed()->findOrFail($id);
    
        // Hapus file gambar jika artikel memiliki gambar
        if ($artikel->gambar) {
            // Hapus file dari folder "otentik"
            $gambarPathOtentik = public_path('/storage/asetnya/upl/gambar/artikel/otentik') . '/' . $artikel->gambar;
            if (file_exists($gambarPathOtentik)) {
                unlink($gambarPathOtentik);
            }
    
            // Hapus file dari folder "thumb"
            $gambarPathThumb = public_path('/storage/asetnya/upl/gambar/artikel/thumb') . '/' . $artikel->gambar;
            if (file_exists($gambarPathThumb)) {
                unlink($gambarPathThumb);
            }
        }
    
        // Dapatkan ID artikel sebelum menghapusnya secara permanen
        $artikelId = $artikel->id;
    
        // Hapus artikel secara permanen dari database
        $artikel->forceDelete();
        return redirect('/cman/artikel?lihat=bin')->with('pesanError',  [
            'message' => '<i class="text-danger" data-feather="x-circle"></i> Artikel | <span class="text-info">' . $artikel->judul . '</span> | <span  class=" text-danger">Dihapus Permanent</span> ',
            'type' => 'error'
        ]);
    }
    
        
}
