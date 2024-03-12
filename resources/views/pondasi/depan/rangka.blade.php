{{-- Head --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>ughi-ion</title>


    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('mixUghi.min.css') }}">
    <link rel="stylesheet" href="{{asset('storage/asetnya/css/edit.css')}}">

    @include('pondasi.depan.meta')

</head>
{{-- /Head --}}
{{-- Body --}}

<body>
    @include('pondasi.depan.head')

    <!-- Page content-->
    <div class="container">
        <div class="row">

            @yield('isiNya')

        </div>
    </div>
    @include('pondasi.depan.foot')
    <script src="{{ mix('mixUghi.min.js') }}" defer></script>
    <script src="{{asset('storage/asetnya/js/edit.js')}}"></script>
</body>

</html>
{{-- /Body --}}
