@extends('pondasi.belakang.rangka')
@section('judulLaman', 'Buat Artikel | ION Network Website')
@section('isinya')
@php
    use App\Models\Kategori;
@endphp
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"> Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('artikel.index')}}">Artikel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Buat Artikel</li>
        </ol>
    </nav>

    {!! Form::model($artikel, [
        'method' => 'POST',
        'route'  => 'artikel.store',
        'files'  => TRUE,
        'id' => 'post-form'
    ]) !!}
    <div class="row">

        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">

                <div class="form-group mb-2 {{$errors->has('judul') ? 'has-error' : ''}}">
                    {!! Form::label('judul', null, ['class' => ' ms-1 mb-2 text-uppercase', 'for' => 'judul']) !!}
                    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
                    @if($errors->has('judul'))
                        <div class="alert alert-danger alert-dismissible fade show mt-1 p-1" role="alert">
                            <strong class="text-uppercase">{{$errors->first('judul')}}</strong>
                            <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>

                <div class="form-group mb-2 {{$errors->has('slug') ? 'has-error' : ''}}">
                    {!! Form::label('slug', null, ['class' => ' ms-1 mb-2 text-uppercase', 'for' => 'slug']) !!}
                    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                    @if($errors->has('slug'))
                        <div class="alert alert-danger alert-dismissible fade show mt-1 p-1" role="alert">
                            <strong class="text-uppercase">{{$errors->first('slug')}}</strong>
                            <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>

                <div class="form-group mb-2 {{$errors->has('kutipan') ? 'has-error' : ''}}">
                    {!! Form::label('kutipan', null, ['class' => ' ms-1 mb-2 text-uppercase', 'for' => 'kutipan']) !!}
                    {!! Form::textarea('kutipan', null, ['class' => 'form-control']) !!}
                    @if($errors->has('kutipan'))
                        <div class="alert alert-danger alert-dismissible fade show mt-1 p-1" role="alert">
                            <strong class="text-uppercase">{{$errors->first('kutipan')}}</strong>
                            <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>

                <div class="form-group mb-2{{ $errors->has('isi_artikel') ? 'has-error' : '' }}">
                    {!! Form::label('isi_artikel', null, ['class' => 'ms-1 mb-2']) !!}
                    {!! Form::textarea('isi_artikel', null, ['class' => 'form-control']) !!}

                    @if($errors->has('kutipan'))
                        <div class="alert alert-danger alert-dismissible fade show mt-1 p-1" role="alert">
                            <strong class="text-uppercase">{{$errors->first('kutipan')}}</strong>
                            <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>

                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin">
            <div class="card">
                <div class="card-body">

                    <div class="form-group mb-2 {{$errors->has('terbit_tgl') ? 'has-error' : ''}}">
                        <label class="text-muted ms-1 mb-2 text-uppercase text-bold" for="terbit_tgl">Terbit Tgl</label>
                            <input type="text" class="form-control" id="terbit_tgl_datepicker" name="terbit_tgl" class="form-control mb-0"/>
                            @if($errors->has('terbit_tgl'))
                                <div class="alert alert-danger alert-dismissible fade show mt-0 p-1" role="alert">
                                    <strong class="text-uppercase">{{$errors->first('terbit_tgl')}}</strong>
                                    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>      
                                </div>
                            @endif
                    </div>

                    <div class="form-group mb-2{{ $errors->has('id_kategori') ? 'has-error' : '' }}">
                        {!! Form::select('id_kategori', Kategori::pluck('nama_kategori', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Pilih Kategori']) !!}

                        @if($errors->has('id_kategori'))
                                <div class="alert alert-danger alert-dismissible fade show mt-3 p-1" role="alert">
                                    <strong class="text-uppercase">{{$errors->first('id_kategori')}}</strong>
                                    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>      
                                </div>
                            @endif
                    </div>

                    <div class="form-group mb-2 {{$errors->has('gambar') ? 'has-error' : ''}}">
                        <label class="text-muted ms-1 mb-2 text-uppercase text-bold" for="gambar">Gambar Utama</label><br>
                        
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new img-thumbnail mb-3" style="width: 275px; height: auto;">
                                <img src="{{asset('/storage/asetnya/upl/gambar/gambar-default.jpg')}}"  alt="Asuuu Lu">
                            </div>
                            <div class="fileinput-preview fileinput-exists img-thumbnail mb-3" style="max-width: 275px; max-height: auto;"></div>
                            <div>
                                <span class="btn btn-outline-secondary btn-file">
                                <span class="fileinput-new">Pilih Gambar</span>
                                <span class="fileinput-exists">Rubah</span>
                                <input type="file" name="gambar"></span>
                                <a href="#" class="btn btn-danger float-end fileinput-exists" data-dismiss="fileinput">Hapus</a>
                            </div>
                        </div>
                        @if($errors->has('gambar'))
                        <div class="alert alert-danger alert-dismissible fade show mt-1 p-1" role="alert">
                            <strong class="text-uppercase">{{$errors->first('gambar')}}</strong>
                            <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    </div>
                    <div class="form-group my-2 d-grid">
                        <button id="btnBuatArtikel" type="submit" class="btn btn-outline-info">Buat Artikel</button>
                    </div>
                        <button id="btnDrafArtikel" class="btn-sm btn btn-secondary fs-6 float-end mt-2">Simpan Draft</button>
                </div>
            </div>
        </div>

    </div>
                    
</form>

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
        // Menangkap perubahan nilai pada input judul
        $('#judul').on('input', function () {
            // Ambil nilai judul
            var judul = $(this).val();

            // Ganti '&' menjadi 'dan'
            judul = judul.replace(/&/g, 'dan');

            // Ubah nilai judul menjadi slug dan set nilai pada input slug
            var slug = slugify(judul);
            $('#slug').val(slug);
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

    //  EDITOR WYSIWYG Simple MDE

    var simplemde = new SimpleMDE({ element: document.getElementById("isi_artikel") });

    var simplemde = new SimpleMDE({ element: document.getElementById("kutipan") });

    $('#terbit_tgl_datepicker').datetimepicker({ footer: true, modal: true, uiLibrary: 'bootstrap5', format: 'yyyy-mm-dd HH:mm:ss' });
    $('#btnDrafArtikel').click(function (e) {
    e.preventDefault();
    $('#terbit_tgl_datepicker').val(null);
    $('#artikelForm').submit();
});
</script>
@endsection 