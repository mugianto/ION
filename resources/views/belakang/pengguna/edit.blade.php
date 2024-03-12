@extends('pondasi.belakang.rangka')
@section('judulLaman', 'Buat Pengguna | ION Network Website')
@section('isinya')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"> Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('pengguna.index')}}">Pengguna</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Pengguna</li>
        </ol>
    </nav>

<div class="row">

    {!! Form::model($pengguna, [
        'method' => 'PUT',
    'route'  => ['pengguna.update', $pengguna->id],
        'files'  => TRUE,
        'id' => 'penggunaForm'
    ]) !!}
    {{ csrf_field() }}


        @include('belakang.pengguna.pecahan.formulir')
        
    {!! Form::close() !!}

</div>

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