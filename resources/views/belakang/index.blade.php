@extends('pondasi.belakang.rangka')
@section('judulLaman', 'Internet Untuk Semua | ION Network Website')
@section('isinya')

        <div class="card-header">{{ __('Dashboard') }}</div>
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis magni, quos odio, eum
                dignissimos reiciendis minus aliquam consequatur ut animi sint laudantium! Minima
                voluptatibus veritatis, quos ad eaque modi nihil? Lorem, ipsum dolor sit amet consectetur
                adipisicing elit. Harum iste rerum minima cum ratione id illum quidem dolor animi mollitia
                delectus tenetur hic, beatae et nulla placeat accusantium, consectetur aliquid? Lorem ipsum
                dolor sit amet consectetur adipisicing elit. Corrupti eos odit voluptate voluptas similique
                illo earum quo voluptatibus perferendis amet laborum magni soluta accusantium, nobis
                praesentium? Quod itaque cupiditate id?</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur perferendis odit
                laborum, velit quidem nisi commodi vero corrupti fugiat, quas labore illo nulla! Harum
                voluptatem cum ipsa doloremque mollitia explicabo?</p>
        </div>

@endsection