<?php
namespace App\Http\Controllers\Depan;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\User;

class ArtikelController extends Controller
{
    protected $batasi = 5;

    public function indexnya()  
    {   
        $artikels = Artikel::with('penulis')
            ->terbaru()
            ->terbit()
            ->paginate($this->batasi);
            
        $artikelPertama = $artikels->first();

        list($kategoris, $namaKategori) = $this->getKategoriData();
// dd($artikelPertama);
        return view('depan.ion.artikel', compact('artikels', 'kategoris', 'artikelPertama', 'namaKategori'));
    }

    public function detailnya($slug)
    {
        $artikel = Artikel::terbit()
            ->where('slug', $slug)
            ->firstOrFail();

        list($kategoris) = $this->getKategoriData();

        $artikel->increment('artikel_viewer');

        return view('depan.ion.detailArtikel', compact('artikel', 'kategoris'));
    }

    public function kategorinya($slug_kategori) 
    {
        $kategori = Kategori::where('slug_kategori', $slug_kategori)->firstOrFail();

        list($artikelPertama, $artikels, $namaKategori) = $this->getKategoriArtikels($kategori);

        list($kategoris) = $this->getKategoriData();

        return view('depan.ion.artikel', compact('artikels', 'kategoris', 'artikelPertama', 'namaKategori'));
    }

    public function penulisnya($slug_penulis) 
    {
        $penulis = User::where('slug_penulis', $slug_penulis)->firstOrFail();

        list($artikelPertama, $artikels, $namaPenulis) = $this->getPenulisArtikels($penulis);

        list($kategoris) = $this->getKategoriData();

        return view('depan.ion.artikel', compact('artikels', 'kategoris', 'artikelPertama', 'namaPenulis'));
    }

    // Metode untuk mengambil data kategori
    private function getKategoriData() {
        $kategoris = Kategori::with(['artikels' => function($query){
            $query->terbit();
        }])->orderBy('nama_kategori', 'asc')->get();
        
        return [$kategoris, null];
    }

    // Metode untuk mendapatkan artikel dan nama kategori dari kategori
    private function getKategoriArtikels($kategori) {
        $artikelPertama = $kategori->artikels()
            ->terbaru()
            ->terbit()
            ->first();

        $artikels = $kategori->artikels()
            ->terbaru()
            ->terbit()
            ->paginate($this->batasi);

        $namaKategori = ucwords(str_replace('-', ' ', $kategori->slug_kategori));

        return [$artikelPertama, $artikels, $namaKategori];
    }

    // Metode untuk mendapatkan artikel dan nama penulis dari penulis
    private function getPenulisArtikels($penulis) {
        $artikelPertama = $penulis->artikels()
            ->terbaru()
            ->terbit()
            ->first();

        $artikels = $penulis->artikels()
            ->terbaru()
            ->terbit()
            ->paginate($this->batasi);

        $namaPenulis = ucwords(str_replace('-', ' ', $penulis->slug_penulis));

        return [$artikelPertama, $artikels, $namaPenulis];
    }
    
}

