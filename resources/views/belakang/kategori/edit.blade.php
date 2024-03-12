@extends('pondasi.belakang.rangka')
@section('judulLaman', 'Buat Kategori | ION Network Website')
@section('isinya')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"> Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('kategori.index')}}">Kategori</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Kategori</li>
        </ol>
    </nav>

<div class="row">

    {!! Form::model($kategori, [
        'method' => 'PUT',
    'route'  => ['kategori.update', $kategori->id],
        'files'  => TRUE,
        'id' => 'artikelForm'
    ]) !!}

        @include('belakang.kategori.pecahan.formulir')

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
        // Menangkap perubahan nilai pada input nama_kategori
        $('#nama_kategori').on('input', function () {
            // Ambil nilai nama_kategori
            var nama_kategori = $(this).val();

            // Ganti '&' menjadi 'dan'
            nama_kategori = nama_kategori.replace(/&/g, 'dan');

            // Ubah nilai nama_kategori menjadi slug_kategori dan set nilai pada input slug_kategori
            var slug_kategori = slugify(nama_kategori);
            $('#slug_kategori').val(slug_kategori);
        });

        // Fungsi untuk mengubah string menjadi slug_kategori
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

@endsection     