    <div class="col-md-9 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="form-group mb-2 {{$errors->has('name') ? 'has-error' : ''}}">
                    {!! Form::label('Nama', '', ['class' => ' ms-1 mb-2', 'for' => 'name']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                    @if($errors->has('name'))
                        <div class="alert alert-danger alert-dismissible fade show mt-1 p-1" role="alert">
                            <strong class="text-uppercase">{{$errors->first('name')}}</strong>
                            <button type="button" class="btn-close p-2" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>

                <div class="form-group mb-2 {{$errors->has('slug') ? 'has-error' : ''}}">
                    {!! Form::label('slug', null, ['class' => ' ms-1 mb-2 text-uppercase', 'for' => 'slug']) !!}
                    <div class="input-group">
                    {!! Form::text('slug', $role->slug, [
                        'class' => 'form-control fst-italic' . (\Route::is('role.edit') ? ' bg-secondary text-light' : ''),
                        'readonly' => \Route::is('role.edit'),
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

                <div class="form-group mb-2 {{$errors->has('email') ? 'has-error' : ''}}">
                    {!! Form::label('E-mail', '', ['class' => ' ms-1 mb-2', 'for' => 'email']) !!}
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    @if($errors->has('email'))
                        <div class="alert alert-danger alert-dismissible fade show mt-1 p-1" role="alert">
                            <strong class="text-uppercase">{{$errors->first('email')}}</strong>
                            <button type="button" class="btn-close p-2" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>
    
                <div class="form-group mb-2 {{$errors->has('role') ? 'has-error' : ''}}">
                    {!! Form::label('role', 'Role', ['class' => 'text-muted ms-1 mb-2
                    text-bold']) !!}
                    <select name="role_id" id="role_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg">
                        @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-2 {{$errors->has('password') ? 'has-error' : ''}}">
                    {!! Form::label('Password', '', ['class' => 'ms-1 mb-2', 'for' => 'password']) !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    @if($errors->has('password'))
                        <div class="alert alert-danger alert-dismissible fade show mt-1 p-1" role="alert">
                            <strong class="text-uppercase">{{$errors->first('password')}}</strong>
                            <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>

                <div class="form-group mb-2 {{$errors->has('password_confirmation') ? 'has-error' : ''}}">
                    {!! Form::label('Konfirmasi Password', '', ['class' => 'ms-1 mb-2', 'for' => 'password_confirmation']) !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    @if($errors->has('password_confirmation'))
                        <div class="alert alert-danger alert-dismissible fade show mt-1 p-1" role="alert">
                            <strong class="text-uppercase">{{$errors->first('password_confirmation')}}</strong>
                            <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div> 

                <div class="row mt-4">
                    <div class="col">
                        <a href="{{route('pengguna.index')}}" class="btn btn-dark">Kembali</a>
                        <button id="btnBuatKategori" type="submit" class="btn btn-info">
                            {{$pengguna->exists ? 'Update' : "Ciptakan"}}
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
        
    <div class="col-md-3 grid-margin">

    </div>
    