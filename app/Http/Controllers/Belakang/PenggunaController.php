<?php

namespace App\Http\Controllers\Belakang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Models\Artikel;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penggunanya = User::get();
        return view('belakang.pengguna.cmanPengguna', compact('penggunanya'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengguna = new User();
        $roles = Role::all();
        return view('belakang.pengguna.create', compact('pengguna', 'roles'));
    }

    public function store(Requests\PenggunaStoreRequest $request)
    {
        // Membuat pengguna baru
        $pengguna = User::create($request->all());
    
        // Menyematkan peran yang dipilih dari formulir
        $pengguna->assignRole($request->input('id'));
    
        return redirect('/cman/pengguna')->with('pesanBagus', '<i class="text-success" data-feather="check-square"></i> Pengguna | <span class="text-info">' . $pengguna->name . '</span> | <strong class="text-success">Berhasil Dibuat</strong>');
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
        $pengguna = User::findOrFail($id);

        $roles = Role::get();
        return view('belakang.pengguna.edit', compact('pengguna', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Requests\PenggunaUpdateRequest $request, string $id)
    {
        $pengguna = User::findOrFail($id);
    
        // Pemeriksaan perubahan pada email dan password
        $changes = [];
    
        // Periksa dan tambahkan perubahan pada email
        if ($request->filled('email') && $request->email !== $pengguna->email) {
            $changes['email'] = $request->email;
        }
    
        // Periksa dan tambahkan perubahan pada name
        if ($request->filled('name') && $request->name !== $pengguna->name) {
            $changes['name'] = $request->name;
        }
    
        // Jika password diisi, tambahkan perubahan pada password
        if ($request->filled('password')) {
            $changes['password'] = bcrypt($request->password);
        }
    
        // Lakukan pembaruan hanya jika ada perubahan
        if (!empty($changes)) {
            $pengguna->update($changes);
            return redirect('/cman/pengguna')->with('pesanBagus', '<i class="text-success" data-feather="check-square"></i> Pengguna | <span class="text-info">' . $pengguna->name . '</span> | <strong class="text-success">Berhasil Diupdate</strong>');
        } else {
            // Tidak ada perubahan, berikan pesan informasi
            return redirect('/cman/pengguna')->with('pesanBagus', 'Tidak ada perubahan yang dilakukan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requests\PenggunaDestroyRequest $request, string $id)
    {
        try {
        $pengguna = User::findOrFail($id);
        $opsiHapusPengguna = $request->opsi_hapus_pengguna;
        $penggunaTerpilih = $request->pengguna_terpilih;
        $penggunaTerpilihKasihKonten = $request->pengguna_terpilih_kasih_konten;
        $jumlahArtikel = $pengguna->artikels()->count();
    
        if ($opsiHapusPengguna == 'hapus_all') 
        {
            $pengguna->artikels()->withTrashed()->forceDelete();
            $pengguna->delete();
    
            $pesan = 'Semua artikel dan akun pengguna ' . $pengguna->name . ' dihapus secara permanen.';
        } 
        elseif ($opsiHapusPengguna == 'hapus_akun') 
        {
            $pengguna->artikels()->update(['id_penulis' => 1]);
            $pengguna->delete();
    
            $pesan = 'Akun pengguna ' . $pengguna->name . ' dihapus, artikel dialihkan';
        } 
        elseif ($opsiHapusPengguna == 'kasih_konten') 
        {
            $pengguna->artikels()->update(['id_penulis' => $penggunaTerpilih]);
            $pesan = $jumlahArtikel . ' Artikel berhasil dipindahkan ke ' . $pengguna->name . '.';
        } 
        elseif ($opsiHapusPengguna == 'hapus_akun_kasih_konten') 
        {
            // Dapatkan objek User dengan ID $penggunaTerpilihKasihKonten
            $penggunaTerpilihKasihKonten = User::findOrFail($penggunaTerpilihKasihKonten);
        
            $pengguna->artikels()->update(['id_penulis' => $penggunaTerpilihKasihKonten->id]);
            $pengguna->artikels()->withTrashed()->forceDelete();
            $pengguna->delete();
        
            $pesan = 'Akun pengguna ' . $pengguna->name . ' Berhasil dihapus, dan artikel dialihkan ke ' . $penggunaTerpilihKasihKonten->name . '.';
        }
        
    
        return redirect('/cman/pengguna')->with('pesanError', [
            'message' => '<i class="text-danger" data-feather="x-circle"></i> ' . $pesan,
            'type' => 'error'
        ]);
        } catch (ModelNotFoundException $e) {
            return redirect('/cman/pengguna')->with('pesanError', 'Pengguna tidak ditemukan.');
        }
    
    }
    
    public function konfirm(Requests\PenggunaDestroyRequest $request, string $id)
    {
        $pengguna = User::findOrFail($id);
        $penggunanya = User::where('id', '!=', $pengguna->id)->pluck('name', 'id');
        
        return view('belakang.pengguna.konfirm', compact('pengguna', 'penggunanya'));
    }
}