@extends('pondasi.belakang.rangka')
@section('judulLaman', 'Kumpulan Artikel | ION Network Website')
@section('isinya')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="alert alert-secondary py-3">
                <a href="{{route('home')}}"> Dashboard</a> / Artikel
            </div>
        </div>
        <div class="col-md-8">
            @if(!$artikels->count())
                <div class="alert alert-danger py-3">
                    <i data-feather="x-square"></i> Ora Ono Artikel
                </div>
            @else
                @include('belakang.partials.pesan')
            @endif
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3 align-middle">
                        <div class="col">

                            <a href="{{route('artikel.create')}}" class="btn btn-md btn-outline-info"><i data-feather="plus"></i> Buat Artikel</a>
                            
                            <a href="{{route('l_artikel')}}" target="_blank" class="btn btn-md btn-info ms-1">Lihat Laman <i data-feather="log-out"></i> </a>

                        </div>
                        <div class="col text-end pt-2 pe-4" style="font-size: 20px;">

                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Semua Artikel" href="?lihat=all" class="link"><i data-feather="codesandbox"></i></a> | 
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Artikel Terbit"  href="?lihat=terbit" class="link text-success"><i data-feather="check-circle"></i></a> | 
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Artikel Terjadwal"  href="?lihat=terjadwal" class="link text-info"><i data-feather="calendar"></i></a> |
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Artikel Draft"  href="?lihat=draft" class="link text-warning"><i data-feather="flag"></i></a> |
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Tempat Sampah / BIN" href="?lihat=bin" class="link text-danger"><i data-feather="trash-2"></i></a>
                        
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="tabelData" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!$artikels->count())
                                    <tr class="align-middle">
                                        <td>Kosong</td>
                                        <td>Kosong</td>
                                        <td>Kosong</td>
                                        <td>Kosong</td>
                                        <td>Kosong</td>
                                        <td>
                                            <button disabled id="editArtikel" class="btn btn-secondary btn-icon btn-xs">
                                                <i data-feather="check-square"></i>
                                            </button>
                                            <button disabled 
                                                class="btn btn-secondary btn-icon btn-xs">
                                                <i data-feather="trash-2"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @else
                                    @foreach($artikels as $artikel)
                                        @if(!$onlyTrashed)
                                            @include('belakang.artikel.pecahan.artikelTabel')
                                        @else
                                            @include('belakang.artikel.pecahan.binArtikelTabel')
                                        @endif
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('dataTableCss')
<link rel="stylesheet" href="{{asset('storage/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">
@endsection
@section('pluginKhusus')
<script src="{{asset('storage/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{asset('storage/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
@endsection

@section('customEdit')
<script src="{{asset('storage/assets/js/data-table.js')}}"></script>
<script>
    function deletePermanent(artikelId) {
        // Tampilkan prompt konfirmasi
        var confirmation = confirm("Yakin ingin menghapus artikel permanent?");
        
        // Cek hasil konfirmasi
        if (confirmation) {
            // Submit form jika pengguna memilih "OK" atau "Yes"
            document.getElementById('deleteForm_' + artikelId).submit();
        } else {
            // Do nothing or provide feedback to the user (optional)
            console.log("Penghapusan permanent dibatalkan.");
        }
    }
    function buangBin(artikelId) {
        // Tampilkan prompt konfirmasi
        var confirmation = confirm("Yakin ingin menghapus artikel permanent?");
        
        // Cek hasil konfirmasi
        if (confirmation) {
            // Submit form jika pengguna memilih "OK" atau "Yes"
            document.getElementById('deleteForm_' + artikelId).submit();
        } else {
            // Do nothing or provide feedback to the user (optional)
            console.log("Tidak jadi buang ke Bin");
        }
    }
    $(document).ready(function() {
        @if(session('pesanDibuat'))
            $('#pesanDibuat').modal('show');
        @endif
    });
</script>
@endsection
