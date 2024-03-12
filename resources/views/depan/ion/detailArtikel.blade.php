@extends('pondasi.depan.rangka')
@section('isiNya')

<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            
        <h1 class="fw-bolder">
            @if(Request::is('artikel/*'))
                {{ $artikel->judul }}
            @endif

        </h1>
            <p class="lead mb-0"><i class="fa fa-user"></i> A Bootstrap 5 starter layout for your next blog homepage</p>
        </div>
    </div>
</header>
<!-- Blog entries-->
<div class="col-lg-8">
    <!-- Featured blog post-->
    <div class="card mb-4">
        <a href="#!"><img class="card-img-top" src="{{$artikel->GambarArtikel}}" alt="{!!$artikel->judul!!}" /></a>
        <div class="card-body">
            <div class="small text-muted">{{$artikel->tgl}} - <strong>Penulis:
                    {{$artikel->penulis->name}}</strong></div>
            <h1 class="card-title">{{$artikel->judul}}</h1>
            <cite>{!!$artikel->htmlKutipan!!}</cite>
            <p class="card-text">
                {!! $artikel->htmlIsi !!}
        </div>
    </div>
</div>

@include('pondasi.depan.side')
@endsection
