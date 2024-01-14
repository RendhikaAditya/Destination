@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <div class="container">
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

        <section class="content-header">
            <h1>
                <b>Objek Wisata</b>
            </h1>
        </section>

        <section class="content">
            <div class="box box-solid">
                <div class="box-body">
                    <div class="row">
                        @foreach($destinations as $destination)
                        <div class="col-md-3 text-center text-blue">
                            <div class="box box-solid box-warning">
                                @if($destination->pictures->count() > 0)
                                <img src="{{ asset('storage/' . $destination->pictures[0]->picture) }}"
                                    class="img-responsive" data-toggle="modal"
                                    data-target="#destinationModal{{ $destination->id }}">
                                @else
                                <!-- Gambar default jika tidak ada gambar -->
                                <img src="{{ asset('path/to/default/image.jpg') }}" class="img-responsive">
                                @endif

                                <b>{{ $destination->name }}</b>

                                <!-- Modal -->
                                <div class="modal fade" id="destinationModal{{ $destination->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="destinationModalLabel{{ $destination->id }}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title"
                                                    id="destinationModalLabel{{ $destination->id }}">
                                                    {{ $destination->name }}</h4>
                                            </div>
                                            <div class="modal-body">
                                                {!! strip_tags($destination->description) !!}

                                                @if($destination->pictures->count() > 0)
                                                <div class="row">
                                                    @foreach($destination->pictures as $picture)
                                                    <div class="col-md-3">
                                                        <img src="{{ asset('storage/' . $picture->picture) }}"
                                                            class="img-responsive" alt="Picture">
                                                    </div>
                                                    @endforeach
                                                </div>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
