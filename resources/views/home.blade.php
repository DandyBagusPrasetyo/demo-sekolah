@extends('layouts.master')

@section('otherstyle')
	{{-- <link rel="stylesheet" href="/assets/css/home.css"> --}}
@stop

@section('content')
<br>

{{-- Top Image --}}
<div id="banner" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#banner" data-slide-to="0" class="active"></li>
        <li data-target="#banner" data-slide-to="1"></li>
        <li data-target="#banner" data-slide-to="2"></li>
        <li data-target="#banner" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <a href="#" data-toggle="lightbox">
                <img class="d-block img-fluid" src="{{ asset('assets/img/banner/1.jpeg') }}" alt="First slide" style="width: 640px; height: auto;">
            </a>
        </div>
        @foreach ($sliders as $slider)
            <div class="carousel-item">
                <a href="{{ $slider->link }}" data-toggle="lightbox">
                    <img class="d-block img-fluid" src="{{ $slider->image }}" alt="First slide" style="width: 640px; height: auto;">
                </a>
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#banner" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#banner" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<br>
<hr>
<br>

{{-- Server Description --}}
<div class="row" id="about">
    <div class="col-md-2">
    </div>

    <div class="col-md-8">
        <h2>>Profile</h2>
        <p>Laborum fugiat est reprehenderit fugiat do excepteur adipisicing incididunt incididunt. Consequat do non labore voluptate fugiat occaecat. Occaecat adipisicing quis aute aute est ad eu elit aute fugiat proident non ullamco. Reprehenderit sit nostrud aliquip eiusmod. Nostrud ullamco sint et elit proident sit Lorem enim non occaecat minim voluptate occaecat.</p>

        <h2>>About</h2>
        <p>Exercitation magna commodo fugiat do commodo ut eiusmod esse laboris labore dolore irure. Incididunt dolore culpa ipsum velit laborum consectetur cupidatat irure ea. Labore Lorem minim irure aliqua eu voluptate. Sunt ea non do fugiat consequat nostrud duis quis commodo eiusmod.</p>
    
        <h2>>Blogs</h2>
        <div class="row">
        @foreach ($blogs as $blog)
        <div class="col-sm-6">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ $blog->image }}" alt="{{ $blog->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $blog->title }}</h5>
                    <p class="card-text">{!! $blog->content !!}</p>
                    <a href="#" class="btn btn-primary">Read More.</a>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>

    <div class="col-md-2">

    </div>
</div>

<br>
<hr>
<br>
<br>
<br>
@stop

@section('otherscript')
	{{-- <script type="text/javascript" src="/assets/javascript/jscript.js"></script> --}}
@stop
<!-- © StorWize Developer 2020 -->
