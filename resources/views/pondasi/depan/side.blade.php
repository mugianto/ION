<!-- Side widgets-->
<div class="col-lg-4">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Enter search term..."
                    aria-label="Enter search term..." aria-describedby="button-search" />
                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
            </div>
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    @foreach ($kategoris as $kategori )
                            <a href="{{route('l_artikel.kategori', $kategori->slug_kategori)}}" type="button" class="m-2 btn btn-info position-relative">
                                {{$kategori->nama_kategori}}
                                <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-primary">
                                {{$kategori->artikels->count()}}
                                    <span class="visually-hidden">unread</span>
                                </span>
                            </a>
                    @endforeach
                </div>
            </div>
        </div>  
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">Side Widget</div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">&#x27A4; An item</li>
                <li class="list-group-item">&#x27A4; A second item</li>
                <li class="list-group-item">&#x27A4; A third item</li>
                <li class="list-group-item">&#x27A4; A fourth item</li>
                <li class="list-group-item">&#x27A4; And a fifth one</li>
            </ul>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">Popular Post</div>
        <div class="card-body">
            <ul id="artikel_popular">
                @foreach($popular_artikel as $artikel)
                    <li class="list-group-item">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-3 img_pop_art ps-0">
                                    <img class="animated rollIn" src="{{$artikel->gambarThumbArtikel}}" alt="gambar thumb dari = {{$artikel->judul}}" />
                                </div>
                                <div class="col-sm-9 konten_pop_art">
                                    <h3>
                                        <a href="{{ route('l_artikel.detail', $artikel->slug) }}" class="link">
                                        {{Illuminate\Support\Str::limit($artikel->judul, 40)}}
                                        </a>
                                    </h3>
                                    <span class="time" ><i class="fa fa-clock-o"></i> {{ $artikel->tgl }}</span>
                                    <span class="comment"><i class="fa fa-comment"></i> {{ $artikel->artikel_viewer }}</span>
                                </div>
                            </div>
                        </div>
                    </li>
                                <hr>
                @endforeach
            </ul>
        </div>
    </div>

</div>
