@extends('pondasi.belakang.rangka')
@section('judulLaman', 'Buat Pengguna | ION Network Website')
@section('isinya')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"> Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('pengguna.index')}}">Pengguna</a></li>
            <li class="breadcrumb-item active" aria-current="page">Buat Pengguna</li>
        </ol>
    </nav>

    <div class="row">

        {!! Form::model($pengguna, [
            'method' => 'POST',
            'route'  => 'pengguna.store',
            'files'  => TRUE,
            'id' => 'penggunaForm'
        ]) !!}

        @include('belakang.pengguna.pecahan.formulir')

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
@endsection     
<script>
    $(document).ready(function () {
        // Menangkap perubahan nilai pada input judul
        $('#judul').on('input', function () {
            // Ambil nilai judul
            var judul = $(this).val();

            // Ganti '&' menjadi 'dan'
            judul = judul.replace(/&/g, 'dan');

            // Ubah nilai judul menjadi slug dan set nilai pada input slug
            var slug = slugify(judul);
            $('#slugInput').val(slug);
        });

        // Fungsi untuk mengubah string menjadi slug
        function slugify(text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')           // Ganti spasi dengan -
                .replace(/[^\w\-]+/g, '')       // Hapus karakter non-word
                .replace(/\-\-+/g, '-')         // Ganti beberapa - berturut-turut dengan satu -
                .replace(/^-+/, '')             // Hapus - dari awal teks
                .replace(/-+$/, '');            // Hapus - dari akhir teks
        }
    });
</script>