@extends('frontend.layout')

@section('content')
    <div class="container mt-5">
        <div class="card card-hero-primary">
            <img src="{{ asset('frontend/assets/images/g.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body text-white card-hero position-absolute text-center">
                <h1 class="card-title card-title-hero">Sumenep</h1>
                <p class="card-text">Nikmati keindahan seluruh Sumenep hanya dengan satu sentuhan.</p>
                {{-- <a href="#" class="btn btn-primary">Liburan Sekarang</a> --}}
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row mt-5">
            <h3 class="text-center mb-4">Destinasi Pilihan</h3>

            @foreach ($category as $item)
                <div class="col-lg-4 mb-5">
                    <div class="card" style="border: none">
                        <img src="{{ Storage::url('uploads/category/' . $item->image) }}"class="card-img-top"
                            style="height: 400px;object-fit: cover;" height="100" alt="...">
                        <div class="card-body">
                            <h4 class="card-title text-center">{{ $item->title }}</h4>
                        </div>
                        <div class="card-body d-block p-0 mx-auto w-75">
                            <a href="{{ route('feTravel', $item->id) }}"
                                class="d-block mb-3 card-link btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- <div class="col-lg-4 mb-5">
                <div class="card" style="border: none">
                    <img src="{{ asset('frontend/assets/images/p1.jpg') }}" style="height: 400px;object-fit: cover;"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title text-center">Paket Tour Harian Lombok</h4>
                    </div>
                    <div class="card-body d-block p-0 mx-auto w-75">
                        <a href="single-travel.html" class="d-block mb-3 card-link btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <div class="card" style="border: none">
                    <img src="{{ asset('frontend/assets/images/p2.jpg') }}" style="height: 400px;object-fit: cover;"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title text-center">Paket Tour Harian Lombok</h4>
                    </div>
                    <div class="card-body d-block p-0 mx-auto w-75">
                        <a href="single-travel.html" class="d-block mb-3 card-link btn btn-primary">Detail</a>
                    </div>
                </div>
            </div> --}}
        </div>
        {{-- <div class="row mt-5">
            <h3 class="text-center mb-4">Artikel Terbaru</h3>
            <div class="col-lg-4">
                <div class="card border-0 mb-3">
                    <a href="single-blog.html" style="color: #111;text-decoration: none">
                        <img src="{{ asset('frontend/assets/images/b1.jpg') }}" style="height: 500px;object-fit: cover;"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Wisata Populer Indonesia</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 mb-3">
                    <a href="single-blog.html" style="color: #111;text-decoration: none">
                        <img src="{{ asset('frontend/assets/images/b2.jpg') }}" style="height: 500px;object-fit: cover;"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Wisata Populer Indonesia</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 mb-3">
                    <a href="single-blog.html" style="color: #111;text-decoration: none">
                        <img src="{{ asset('frontend/assets/images/b3.jpg') }}" style="height: 500px;object-fit: cover;"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Wisata Populer Indonesia</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
