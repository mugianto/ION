
@extends('pondasi.depan.rangka')
@section('isiNya')

<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            
        <h1 class="fw-bolder">
            @if(Request::is('artikel'))
                {{ 'Artikel' }}
            @elseif(Request::is('penulis/*'))
                {{ $artikelPertama->penulis->name }}
            @elseif(Request::is('kategori/*'))
                {{ $artikelPertama->kategori->nama_kategori }}
            @else
                {{ 'Halaman Default' }}
            @endif
        </h1>
            <p class="lead mb-0"><i class="fa fa-user"></i> A Bootstrap 5 starter layout for your next blog homepage</p>
        </div>
    </div>
</header>
<!-- Blog entries-->
<div class="col-lg-8">


        @if(! $artikels->count())
            <div class="alert alert-info">
                Tidak Ada Artikel
            </div>
        @else
            <div class="card mb-4">
                <a href="{{ route('l_artikel.detail', $artikelPertama->slug) }}"><img class="card-img-top" src="{{$artikelPertama->GambarThumbArtikel}}" alt="{{$artikelPertama->judul}}" /></a>
                <div class="card-body">
                    <div class="small text-muted">
                        <a class="me-2" href="{{route('l_artikel.penulis', $artikelPertama->penulis->slug_penulis)}}" class="link"><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{   Illuminate\Support\Str::limit($artikelPertama->penulis->name, 10) }}</a>
                        <i class="fa fa-calendar-o"></i>  <time class="me-2">{{ $artikelPertama->tgl }}</time>
                        <a href="{{ route('l_artikel.detail', $artikelPertama->penulis->name) }}" class="me-2"><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{$artikelPertama->penulis->name}}</a></div>
                    <a href="{{ route('l_artikel.detail', $artikelPertama->slug) }}">
                        <h2 class="card-title">{{$artikelPertama->judul}}</h2>
                    </a>
                    <p class="card-text">{{$artikelPertama->kutipan}}</p>
                    <a class="btn btn-primary" href="{{ route('l_artikel.detail', $artikelPertama->slug) }}">Lebih Detail →</a>
                </div>
            </div>

            <div class="row">
                @foreach ($artikels as $artikel)
                
                    @if ($artikel->id !== $artikelPertama->id)
                    <div class="col-md-6 col-sm-12">
                        <!-- Blog post-->
                        <div class="card mb-4 shadow">
                            <a href="{{ route('l_artikel.detail', $artikel->slug) }}">
                                <img class="card-img-top" src="{{ $artikel->GambarThumbArtikel }}" alt="{!! $artikel->judul !!}" />
                            </a>
                            <div class="card-body">
                                <div class="small text-muted">
                                    <a href="{{route('l_artikel.penulis', $artikel->penulis->slug_penulis)}}" class="link"><i class="fa fa-user-circle-o ms-2" aria-hidden="true"></i> {{   Illuminate\Support\Str::limit($artikel->penulis->name, 10) }}</a>
                                    <i class="fa fa-calendar-o"></i> {{ $artikel->tgl }} 
                                    
                                    <i class="fa fa-tag ms-2" aria-hidden="true"></i>
                                    <a href="{{ route('l_artikel.kategori', $artikel->kategori->slug_kategori) }}" class="link">{{ $artikel->kategori->nama_kategori }}</a>
                                    <hr class="mb-2">
                                </div>
                                <a href="{{ route('l_artikel.detail', $artikel->slug) }}">
                                    <h2 class="card-title h4">{{  Illuminate\Support\Str::limit($artikel->judul, 20) }}</h2>
                                </a>
                                <p class="card-text">{{ Illuminate\Mail\Markdown::parse(Illuminate\Support\Str::limit($artikel->kutipan, 160)) }}
</p>
                                <a class="btn btn-primary" href="{{ route('l_artikel.detail', $artikel->slug) }}">Lebih Detail →</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                @endforeach
            </div>
        @endif

    <!-- Pagination-->
    {!! $artikels->links() !!}
</div>

@include('pondasi.depan.side')
@endsection
        