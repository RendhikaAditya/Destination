@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <br>
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-body">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="{{ asset('slider/span1.png') }}" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="row">
                <div class="box box-solid">
                    <div class="box-header">
                        <h1>
                            <b>Objek Wisata {{ $city->city_name }}</b>
                        </h1>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            @foreach($destinations as $destination)
                                <div class="col-md-3 text-center text-blue">
                                    <div class="box box-solid box-warning">
                                        <a class="card" href="{{ url("destination/show/" . encrypt($destination->id)) }}">
                                            @if($destination->pictures->count() > 0)
                                                <div class="card-img-container">
                                                    <img src="{{ asset('storage/' . $destination->pictures[0]->picture) }}" class="img-responsive">
                                                </div>
                                            @else
                                                <!-- Gambar default jika tidak ada gambar -->
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
            </div>
        </section>
    </div>
</div>

@endsection
