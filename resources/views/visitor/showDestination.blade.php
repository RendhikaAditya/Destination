@extends('layoutvisitor.main')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
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
                        <?php if (Auth::guard('visitor')->check()) { ?>
                        <h1>
                            <b>Hi,<?= $username ?></b>
                        </h1>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('submit_rating', ['destination_id' => $destinations->id]) }}"
                                    method="post">
                                    @csrf
                                    <label for="rating">Rating:</label>
                                    <div class="star-rating">
                                        <input type="radio" name="rating" id="star1" value="1"><label for="star1"
                                            title="1 star"></label>
                                        <input type="radio" name="rating" id="star2" value="2"><label for="star2"
                                            title="2 stars"></label>
                                        <input type="radio" name="rating" id="star3" value="3"><label for="star3"
                                            title="3 stars"></label>
                                        <input type="radio" name="rating" id="star4" value="4"><label for="star4"
                                            title="4 stars"></label>
                                        <input type="radio" name="rating" id="star5" value="5"><label for="star5"
                                            title="5 stars"></label>
                                    </div>
                                    <button type="submit">Beri Rating</button>
                                </form>
                            </div>
                        </div>
                        <?php } ?>

                        <h1>{{ $destinations->name }}</h1>
                        <div class="mb-12">
                            <p class="fs-6 border-top font-weight-light"></p>
                            {!! $destinations->description !!}
                            <p>
                                @if($destinations->pictures->count() > 0)
                                <div class="col-md-12">
                                    @foreach($destinations->pictures as $picture)
                                    <div class="col-md-4">
                                        <img src="{{ asset('storage/' . $picture->picture) }}" class="img-responsive">
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <img src="{{ asset('path/to/default/image.jpg') }}" class="img-responsive">
                                @endif
                            </p>
                        </div>

                        <div class="box-body">
                            Lokasi: <b>{{ $destinations->address }}</b>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-solid">
                                        {!! $embed_map !!}
                                    </div>
                                </div>
                            </div>

                            @if($destinations->destination_facilities->count() > 0)
                            <h3>Fasilitas:</h3>
                            <ul>
                                @foreach($destinations->destination_facilities as $facility)
                                <li>{{ $facility->facility->facility_name }}</li>
                                @endforeach
                            </ul>
                            @else
                            <p>Tidak ada fasilitas tersedia.</p>
                            @endif

                           
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
