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
                {{-- <div class="box box-solid box-widget">
                    <div class="box-header">
                        <span>
                            <a href="/" style="color: black;">
                                Home
                            </a>
                        </span>
                        <div class="ionicons ion-chevron-right"></div>
                        <span>
                            <a href="/lokasi">
                                Lokasi
                            </a>
                        </span>
                    </div>
                </div> --}}
                <div class="box box-solid">
                    <div class="box-header">
                        <h1>
                            <b>Objek Wisata {{ $city->city_name }}</b>
                        </h1>
                    </div>

                    <div class="box-body">
                        <div class="row">

                            {{-- @foreach ($city as $city)
                                @if ($destinations->city_id == $id) --}}
                                    {{-- @foreach($destinations as $destinations) --}}
                                    <div class="col-md-3 text-center text-blue">
                                        <div class="box box-solid box-warning">
                                            <a class="card" href="{{ url("destination/show/{$destinations->id}") }}">
                                                @if($destinations->pictures->count() > 0)
                                                <div class="card-img-container">
                                                    <img src="{{ asset('storage/' . $destinations->pictures[0]->picture) }}"
                                                        class="img-responsive">
                                                </div>
                                                @else
                                                <!-- Gambar default jika tidak ada gambar -->
                                                <img src="{{ asset('path/to/default/image.jpg') }}" class="img-responsive">
                                                @endif
                
                                                <b>{{ $destinations->name }}</b>
                                            </a>
                                        </div>
                                    </div>
                                    {{-- @endforeach --}}
                                {{-- @endif
                            @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection
