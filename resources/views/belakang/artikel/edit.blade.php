@extends('pondasi.belakang.rangka')
@section('judulLaman', 'Buat Artikel | ION Network Website')
@section('isinya')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"> Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('artikel.index')}}">Artikel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Artikel</li>
        </ol>
    </nav>

    {!! Form::model($artikel, [
        'method' => 'PUT',
    'route'  => ['artikel.update', $artikel->id],
        'files'  => TRUE,
        'id' => 'artikelForm'
    ]) !!}

        @include('belakang.artikel.pecahan.formulir')

                        <div class="form-group my-2 d-grid">
                            <button id="btnBuatArtikel" type="submit" class="btn btn-outline-info">Update Artikel</button>
                        </div>
                        <button id="btnDrafArtikel" class="btn-sm btn btn-secondary fs-6 float-end mt-2">Simpan Draft</button>
                    </div>

                </div>
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
    //  EDITOR WYSIWYG Simple MDE
    $(document).ready(function() {
        $("#toggleSlugEdit").on("click", function() {
            $("#slugInput").prop("readonly", function(_, value) {
                $(this).toggleClass('bg-secondary text-light', !value);
                return !value;
            });

            // Tambahan: Untuk memberi fokus ke input setelah mengaktifkan edit
            if (!$("#slugInput").prop("readonly")) {
                $("#slugInput").focus();
            }
        });
    });
    var simplemde = new SimpleMDE({ element: document.getElementById("isi_artikel") });

    $('#terbit_tgl_datepicker').datetimepicker({ footer: true, modal: true, uiLibrary: 'bootstrap5', format: 'yyyy-mm-dd HH:mm:ss' });
    $('#btnDrafArtikel').click(function (e) {
        e.preventDefault();
        $('#terbit_tgl_datepicker').val(null);
        $('#artikelForm').submit();
    });
    
</script>

@endsection     