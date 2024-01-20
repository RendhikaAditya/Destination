@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <div class="container">
        {{-- <section class="content-header">
            <h1>
                Aplikasi SIO Wisata
                <small>Kelompok 1</small>
            </h1>
        </section> --}}

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
                            <b>Telusuri Lokasi Objek Wisata</b>
                        </h1>
                    </div>

                    <div class="box-body">
    <div class="row">
        @foreach($cities as $city)
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box progress-bar-light-blue">
                    <div class="inner">
                        <h2 style="color: white; text-align: center">{{ $city->city_name }}</h2>
                    </div>
                    <div class="icon">
                        <i class="fa fa-map-signs"></i>
                    </div>
                    <a  href="{{ url("location/show/" . encrypt($city->id)) }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                
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
