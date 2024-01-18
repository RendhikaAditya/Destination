@extends('layout.main')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <section class="content-header">
                <h1>
                    <b>{{ $destination->name }}</b>
                </h1>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-solid box-warning">
                            <div class="box-body">
                                {!! $destination->description !!}
                                
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
                                <br>
                                <b>Lokasi : {{ $destination->address }}</b>
                                <div class="box-body">
                              <?= $destination->embed_map ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
