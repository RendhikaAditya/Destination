@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <div class="container">
        @if(session('success'))
        <div class="box box-solid">
            <div class="alert" role="alert"> 
                {{session('success')}} <a style="text-transform: capitalize; color:black;">{{Auth::guard('visitor')->user()->name}}</a>
            </div>
        </div>
        @endif 
        <section class="content-header">
            <h1>
                Aplikasi SIO Wisata
                <small>Kelompok 1</small>
            </h1>
        </section>

        <div class="row">
            <br>
            <div class="col-md-12">
                <div class="box box-solid box-warning">
                    <div class="box-body">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="{{asset('slider/default.png')}}">
                                </div>
                                <div class="item">
                                    <img src="{{asset('slider/default.png')}}">
                                </div>
                                <div class="item">
                                    <img src="{{asset('slider/default.png')}}">
                                </div>

                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="fa fa-angle-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="fa fa-angle-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <section class="content-header">
            <h1>
                <b>Objek Wisata</b>
            </h1>
        </section> --}}

        <section class="content">
            <div class="row">
                <div class="box box-solid">
                    <div class="box-header">
                        <h1>
                            <b>Objek Wisata</b>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="box-body">
                    <div class="row">
                        @foreach($destinations as $destination)
                        <div class="col-md-3 text-center text-blue">
                            <div class="box box-solid box-warning">
                                <a class="card" href="{{ url("destination/show/" . encrypt($destination->id)) }}">
                                    @if($destination->pictures->count() > 0)
                                    <div class="card-img-container">
                                        <img src="{{ asset('storage/' . $destination->pictures[0]->picture) }}"
                                            class="img-responsive">
                                    </div>
                                    @else
                                    <img src="{{ asset('path/to/default/image.jpg') }}" class="img-responsive">
                                    @endif
    
                                    <b>{{ $destination->name }}</b>
                                </a>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>

@endsection
