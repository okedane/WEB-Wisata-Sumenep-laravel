@extends('frontend.layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card card-blog-single p-3 border-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('feTravel', $travel->kategori_id) }}">Destinasi</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $travel->title }}</li>
                        </ol>
                    </nav>

                    <!-- Carousel -->
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach ($image as $key => $img)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ Storage::url('uploads/travel/' . $img->image_path) }}"
                                        class="d-block w-100" alt="{{ $travel->title }}">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <!-- End Carousel -->

                    <h3 class="my-4">{{ $travel->title }}</h3>
                    <p>{{ $travel->descriotion }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
