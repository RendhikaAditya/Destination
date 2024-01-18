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
                        <h1>{{ $destinations->name }}</h1>
                        <div class="mb-12">
                            <p class="fs-6 border-top font-weight-light"></p>
                            <?= $destinations->description ?>
                            <p>
                                @if($destinations->pictures->count() > 0)
                                <div class="col-md-12">
                                    @foreach($destinations->pictures as $picture)
                                    <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $picture->picture) }}" class="img-responsive">
                                    </div>
                                    @endforeach
                                    @else
                                    <img src="{{ asset('path/to/default/image.jpg') }}" class="img-responsive">
                                    @endif
                                </div>
                            </p>
                        </div>

                        <div class="box-body">
                            Lokasi : <b>{{ $destinations->address }}</b>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-solid">
                                        <?= $embed_map ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </section>


    </div>
</div>

@endsection
