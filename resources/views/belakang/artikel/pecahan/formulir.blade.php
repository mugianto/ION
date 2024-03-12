@php
    use App\Models\Kategori;
@endphp
<div class="row">

    <div class="col-md-9 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="form-group mb-2 {{$errors->has('judul') ? 'has-error' : ''}}">
                    {!! Form::label('judul', null, ['class' => ' ms-1 mb-2 text-uppercase', 'for' => 'judul']) !!}
                    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
                    @if($errors->has('judul'))
                        <div class="alert alert-danger alert-dismissible fade show mt-1 p-1" role="alert">
                            <strong class="text-uppercase">{{$errors->first('judul')}}</strong>
                            <button type="button" class="btn-close p-2" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>

                <div class="form-group mb-2 {{$errors->has('slug') ? 'has-error' : ''}}">
                    {!! Form::label('slug', null, ['class' => ' ms-1 mb-2 text-uppercase', 'for' => 'slug']) !!}
                    <div class="input-group">
                    {!! Form::text('slug', $artikel->slug, [
                        'class' => 'form-control fst-italic' . (\Route::is('artikel.edit') ? ' bg-secondary text-light' : ''),
                        'readonly' => \Route::is('artikel.edit'),
                        'id' => 'slugInput'
                    ]) !!}

                        <button type="button" id="toggleSlugEdit" class="btn btn-outline-secondary">Edit</button>
                    </div>


                    @if($errors->has('slug'))
                        <div class="alert alert-danger alert-dismissible fade show mt-1 p-1" role="alert">
                            <strong class="text-uppercase">{{$errors->first('slug')}}</strong>
                            <button type="button" class="btn-close p-2" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>

                <div class="form-group mb-2 {{$errors->has('kutipan') ? 'has-error' : ''}}">
                    {!! Form::label('kutipan', null, ['class' => ' ms-1 mb-2 text-uppercase', 'for' => 'kutipan'])
                    !!}
                    {!! Form::textarea('kutipan', null, ['class' => 'form-control']) !!}
                    @if($errors->has('kutipan'))
                        <div class="alert alert-danger alert-dismissible fade show mt-1 p-1" role="alert">
                            <strong class="text-uppercase">{{$errors->first('kutipan')}}</strong>
                            <button type="button" class="btn-close p-2" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>

                <div class="form-group mb-2{{ $errors->has('isi_artikel') ? 'has-error' : '' }}">
                    {!! Form::label('isi_artikel', null, ['class' => 'ms-1 mb-2']) !!}
                    {!! Form::textarea('isi_artikel', null, ['class' => 'form-control', 'style' => 'min-height:
                    350px;']) !!}

                    @if($errors->has('isi_artikel'))
                        <div class="alert alert-danger alert-dismissible fade show mt-1 p-1" role="alert">
                            <strong class="text-uppercase">{{$errors->first('isi_artikel')}}</strong>
                            <button type="button" class="btn-close p-2" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
        
    <div class="col-md-3 grid-margin">
        <div class="card">
    
            <div class="card-body">
    
                <div class="form-group mb-2 {{$errors->has('terbit_tgl') ? 'has-error' : ''}}">
                    {!! Form::label('terbit_tgl', null, ['class' => ' ms-1 mb-2 text-uppercase', 'for' => 'terbit_tgl']) !!}
                    {!! Form::text('terbit_tgl', null, ['class' => 'form-control', 'id' => 'terbit_tgl_datepicker']) !!}
                    @if($errors->has('terbit_tgl'))
                        <div class="alert alert-danger alert-dismissible fade show mt-1 p-1" role="alert">
                            <strong class="text-uppercase">{{$errors->first('terbit_tgl')}}</strong>
                            <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                     @endif
                </div>
    
                <div class="form-group mb-2 {{$errors->has('id_kategori') ? 'has-error' : ''}}">
                    {!! Form::label('id_kategori', 'Kategori', ['class' => 'text-muted ms-1 mb-2 text-uppercase text-bold']) !!}
                    <select name="id_kategori" id="id_kategori" class="form-select form-select-lg mb-3" aria-label=".form-select-lg">
                        @foreach($kategoris as $kategori)
                            <option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                        @endforeach
                    </select>
                </div>
                    
                <div class="form-group mb-2 {{$errors->has('gambar') ? 'has-error' : ''}}">
                    <label class="text-muted ms-1 mb-2 text-uppercase text-bold" for="gambar">Gambar Utama</label><br>
    
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new img-thumbnail mb-3" style="width: 100%; height: auto;">
                            <img src="{{ ($artikel->GambarThumbArtikel) ? $artikel->GambarThumbArtikel : '/storage/asetnya/upl/gambar/gambar-default.jpg'}}" alt="Gambar dari - {{$artikel->judul}}">
                        </div>
                        <div class="fileinput-preview fileinput-exists img-thumbnail mb-3" style="max-width: 275px; max-height: auto;"></div>
                            <div>
                                <span class="btn btn-outline-secondary btn-file">
                                    <span class="fileinput-new">Pilih Gambar</span>
                                    <span class="fileinput-exists">Rubah</span>
                                    <input type="file" name="gambar"></span>
                                <a href="#" class="btn btn-danger float-end fileinput-exists"
                                    data-dismiss="fileinput">Hapus</a>
                            </div>
                        </div>
                        @if($errors->has('gambar'))
                        <div class="alert alert-danger alert-dismissible fade show mt-1 p-1" role="alert">
                            <strong class="text-uppercase">{{$errors->first('gambar')}}</strong>
                            <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    </div>