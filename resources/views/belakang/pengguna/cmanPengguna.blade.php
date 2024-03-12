@extends('pondasi.belakang.rangka')
@section('judulLaman', 'Kumpulan Pengguna | ION Network Website')
@section('isinya')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="alert alert-secondary py-3">
                <a href="{{route('home')}}"> Dashboard</a> / Pengguna 
            </div>
        </div>
        <div class="col-md-8">
            @if(!$penggunanya->count())
                <div class="alert alert-danger py-3">
                    <i data-feather="x-square"></i> Tidak ada Pengguna
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

                            <a href="{{route('pengguna.create')}}" class="btn btn-md btn-outline-info"><i data-feather="plus"></i> Buat pengguna</a>
                            
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="tabelData" class="table">
                            <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="75%">Nama</th>
                                    <th width="10%">Artikel</th>
                                    <th width="10%">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!$penggunanya->count())
                                    <tr class="align-middle">
                                        <td>Kosong</td>
                                        <td>Kosong</td>
                                        <td>
                                            <button disabled id="editpengguna" class="btn btn-secondary btn-icon btn-xs">
                                                <i data-feather="check-square"></i>
                                            </button>
                                            <button disabled 
                                                class="btn btn-secondary btn-icon btn-xs">
                                                <i data-feather="trash-2"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @else
                                    @include('belakang.pengguna.pecahan.penggunaTabel')
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
    function deletePermanent(kategoriId) {
        // Tampilkan prompt konfirmasi
        var confirmation = confirm("Apakah Anda yakin ingin menghapus pengguna permanent?");
        
        // Cek hasil konfirmasi
        if (confirmation) {
            // Submit form jika pengguna memilih "OK" atau "Yes"
            document.getElementById('deleteForm_' + kategoriId).submit();
        } else {
            // Do nothing or provide feedback to the user (optional)
            console.log("Penghapusan permanent dibatalkan.");
        }
    }
    $(document).ready(function() {
        @if(session('kategoriDibuat'))
            $('#kategoriDibuat').modal('show');
        @endif
    });
</script>
@endsection
