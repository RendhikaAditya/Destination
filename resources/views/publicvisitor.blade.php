@extends('layoutvisitor.main')
@section('content')
<div class="content-wrapper">
    <div class="container">
        <section class="content-header">
            <h1>
                Aplikasi SIO Wisata
                <small>Kelompok 1</small>
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="box box-solid">
                    <div class="box-header">
                        <h1>
                            <b>Hi,<?= $username ?></b>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="box-body">
                        <div class="row">
                            @foreach($destinations as $destination)
                            <div class="col-md-3 text-center text-blue">
                                <div class="box box-solid box-warning">
                                    <a class="card" href="{{ url("destinationvisitor/show/" . encrypt($destination->id)) }}">
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
            </div>
    </div>
    </section>
</div>
</div>

@endsection
