@extends('layout.main')

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
                        <h1>
                            {{ $destinations->name }}
                            @if($destinations->ratings->count() > 0)
                            @php
                            $totalRating = 0;
                            @endphp
                            @foreach($destinations->ratings as $rating)
                            @php
                            $totalRating += $rating->rating;
                            @endphp
                            @endforeach
                            @php
                            $averageRating = $totalRating / $destinations->ratings->count();
                            @endphp
                            - Rating : {{ number_format($averageRating, 2) }}
                            @for ($i = 1; $i <= 5; $i++) @if ($i <=floor($averageRating)) <span class="star"
                                style="color: gold;">&#9733;</span>
                                @elseif ($i == ceil($averageRating) && $averageRating - floor($averageRating) >= 0.5)
                                <span class="star" style="color: gold; position: relative;">&#9733;<span
                                        style="position: absolute; top: 0; right: 0; overflow: hidden; width: 50%; color: rgb(255, 255, 255);">&#9733;</span></span>
                                @else
                                <span class="star">&#9734;</span>
                                @endif
                                @endfor
                        </h1>
                        @else
                        <p>Belum ada ulasan untuk destinasi ini.</p>
                        @endif
                        Lokasi: <b>{{ $destinations->address }}</b>
                    </div>


                    <div class="box-body">
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
                        <br>&nbsp;
                        <div class="box-body">
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

                            <h3>Ulasan Pengguna:</h3>
                            @if($destinations->ratings->count() > 0)
                            <div class="box-footer box-comments">
                                @foreach($destinations->ratings as $rating)
                                <div class="box-comment">
                                    <img class="img-circle img-sm" src="{{asset('lte/dist/img/logo.png')}}"
                                        alt="User Image">
                                    <div class="comment-text">
                                        <span class="username">
                                            {{ substr($rating->visitor->name, 0, 4) . str_repeat('*', max(0, strlen($rating->visitor->name) - 4)) }}
                                            <span
                                                class="text-muted pull-right">{{ $rating->created_at->format('j F Y') }}</span>
                                        </span>

                                        @for ($i = 1; $i <= 5; $i++) @if ($i <=$rating->rating)
                                            <span class="star">&#9733;</span>
                                            @else
                                            <span class="star">&#9734;</span>
                                            @endif
                                            @endfor
                                            <br>
                                            {{ $rating->coment }}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <p>Belum ada ulasan untuk destinasi ini.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<style>
    .star {
        color: gold;
        font-size: 30px;
        direction: rtl;
    }

</style>
@endsection
