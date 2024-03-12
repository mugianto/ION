@if(session('pesanBagus'))
    <div class="alert alert-dark py-3 align-middle "> 
        {!! session('pesanBagus') !!}
    </div>
@elseif(session('pesanError.message'))
    <div class="alert bg-dark py-3 align-middle text-light">
        {!! session('pesanError.message') !!}
    </div>
@endif


