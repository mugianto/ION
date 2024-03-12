<?php

namespace App\Http\Controllers\Belakang; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Kategori;
use App\Models\Artikel;
use Illuminate\Validation\Rule;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::get();
        return view('belakang.kategori.cmanKategori', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = new Kategori();
        return view('belakang.kategori.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Requests\KategoriStoreRequest $request)
    {
        $kategori = Kategori::create($request->all());
    
        return redirect('/cman/kategori')->with('pesanBagus', '<i class="text-success" data-feather="check-square"></i> Kategori | <span class="text-info">' . $kategori->nama_kategori . '</span> | <strong class="text-success">Berhasil Dibuat</strong>');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('belakang.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Requests\KategoriUpdateRequest $request, string $id)
    {
        $kategori    = Kategori::findOrFail($id);
        $kategori->update($request->all());

        return redirect('/cman/kategori')->with('pesanBagus', '<i class="text-success" data-feather="check-square"></i> Kategori | <span class="text-info">' . $kategori->nama_kategori . '</span> | <strong class="text-success">Berhasil Diupdate</strong>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requests\KategoriDestroyRequest $request, string $id)
    {
        // Kategori::findOrFail($id)->delete();
        $kategori = Kategori::findOrFail($id);
        Artikel::withTrashed()->where('id_kategori', $id)->update(['id_kategori' => 1]);
        $kategori->delete();
        
        return redirect('/cman/kategori')->with('pesanError',  [
            'message' => '<i class="text-danger" data-feather="x-circle"></i> Kategori | <span class="text-info">' . $kategori->nama_kategori . '</span> | <span  class=" text-danger">Dihapus Permanent</span> ',
            'type' => 'error'
        ]);
    }
}
