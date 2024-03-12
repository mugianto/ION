@php
    use App\Models\Kategori;
@endphp
    <div class="col-md-9 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="form-group mb-2 {{$errors->has('nama_kategori') ? 'has-error' : ''}}">
                    {!! Form::label('nama_kategori', null, ['class' => ' ms-1 mb-2 text-uppercase', 'for' => 'nama_kategori']) !!}
                    {!! Form::text('nama_kategori', null, ['class' => 'form-control']) !!}
                    @if($errors->has('nama_kategori'))
                        <div class="alert alert-danger alert-dismissible fade show mt-1 p-1" role="alert">
                            <strong class="text-uppercase">{{$errors->first('nama_kategori')}}</strong>
                            <button type="button" class="btn-close p-2" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>

                <div class="form-group mb-2 {{$errors->has('slug_kategori') ? 'has-error' : ''}}">
                    {!! Form::label('slug_kategori', null, ['class' => ' ms-1 mb-2 text-uppercase', 'for' => 'slug_kategori']) !!}
                    {!! Form::text('slug_kategori', null, ['class' => 'form-control']) !!}
                    @if($errors->has('slug_kategori'))
                        <div class="alert alert-danger alert-dismissible fade show mt-1 p-1" role="alert">
                            <strong class="text-uppercase">{{$errors->first('slug_kategori')}}</strong>
                            <button type="button" class="btn-close p-2" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group mt-4 d-grid bg-dark">
                            <a href="{{route('kategori.index')}}" class="btn btn-dark text-danger">Batal</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group mt-4 d-grid">
                            <button id="btnBuatKategori" type="submit" class="btn btn-info">
                                {{$kategori->exists ? 'Update Kategori' : "Buat Kategori"}}
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
        
    <div class="col-md-3 grid-margin">

    </div>
    