@extends('pondasi.belakang.rangka')
@section('judulLaman', 'Konfirmasi Penghapusan | ION Network Website')
@section('isinya')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"> Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('pengguna.index')}}">Pengguna</a></li>
            <li class="breadcrumb-item active" aria-current="page">Konfirmasi Penghapusan</li>
        </ol>
    </nav>

    <div class="row">

        {!! Form::model($pengguna, [
            'method' => 'DELETE',
            'route'  => ['pengguna.destroy', $pengguna->id],
        ]) !!}

        <div class="col-md-9 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p>
                        Berikut adalah detail Pengguna yang akan anda <strong class='text-danger'>HAPUS</strong> :
                    </p>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2">
                                <p>ID</p>
                                <p>Nama</p>
                                <p>Artikel</p>
                                <p>Berita</p>
                            </div>
                            <div class="col-md-8">
                                <p>: {{$pengguna->id}}</p>
                                <p>: {{$pengguna->name}}</p>
                                <p>: {{$pengguna->artikels->count()}}</p>
                                <p>: 42</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="container ms-3">
                                            
                        <!-- Opsi 1 -->
                        <div class="row">
                            <div class="col-md-6 col-sm-12 mb-1">
                                <input type="radio" name="opsi_hapus_pengguna" value="hapus_all"> Hapus semua (Akun + Konten)
                            </div>
                        </div>
                        <!-- Opsi 2 -->
                        <div class="row">
                            <div class="col-md-6 col-sm-12 mb-1">
                                <input type="radio" name="opsi_hapus_pengguna" value="hapus_akun"> Hapus akun saja
                            </div>
                        </div>
                        <!-- Opsi 3 -->
                        <div class="row">
                            <div class="col-md-6 col-sm-12 mb-1 d-inline-block">
                                <input type="radio" name="opsi_hapus_pengguna" value="kasih_konten"> Berikan <strong class="text-success">konten</strong> pada: {{ Form::select('pengguna_terpilih', $penggunanya, null, ['class' => 'form-select ms-3 mt-1 w-50', 'id' => 'select_kasih_konten']) }}
                            </div>
                        </div>
                        <!-- Opsi 4 -->
                        <div class="row">
                            <div class="col-md-6 col-sm-12 mb-1">
                                <input type="radio" name="opsi_hapus_pengguna" value="hapus_akun_kasih_konten"> Hapus Akun & Berikan <strong class="text-success">konten</strong> pada: {{ Form::select('pengguna_terpilih_kasih_konten', $penggunanya, null, ['class' => 'form-select ms-3 mt-1 w-50', 'id' => 'select_hapus_akun_kasih_konten']) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a  href="{{route('pengguna.index')}}" class="btn btn-dark">Kembali</a>
                    <button class="btn btn-danger" type="submit">Konfirm</button>
                </div>

            </div>
        </div>

        <div class="col-md-3 grid-margin">
        </div>

    </div>
        
    {!! Form::close() !!}

@endsection
@section('linkCabutan')
<link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@endsection
@section('customEdit') 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<script>
    $(document).ready(function () {
        // Sembunyikan Form::select secara default
        $('#select_kasih_konten, #select_hapus_akun_kasih_konten').hide();

        // Atur event change pada radio button
        $('input[name="opsi_hapus_pengguna"]').change(function () {
            // Tampilkan Form::select sesuai dengan radio button yang dipilih
            if ($(this).val() === 'kasih_konten') {
                $('#select_kasih_konten').show();
                $('#select_hapus_akun_kasih_konten').hide();
            } else if ($(this).val() === 'hapus_akun_kasih_konten') {
                $('#select_hapus_akun_kasih_konten').show();
                $('#select_kasih_konten').hide();
            }
        });
    });
</script>
@endsection     