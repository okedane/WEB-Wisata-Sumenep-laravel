@extends('layouts.app')

@section('title', 'edit Category')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Forms edit Category</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href=""">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="">Kategori</a></div>
                    <div class="breadcrumb-item"><a>edit</a></div>
                </div>
            </div>

            <div class="section-body">

                <div class="card">
                    <form action="{{ route('beCategory.update', $kategori->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="name"
                                    class="form-control @error('title')
                                is-invalid
                            @enderror"
                                    name="title" value="{{ $kategori->title }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <input type="text"
                                    class="form-control @error('descriotion')
                                is-invalid
                            @enderror"
                                    name="descriotion" value="{{ $kategori->descriotion }}">
                                @error('descriotion')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file"
                                    class="form-control
                                    @error('image')
                                        is-invalid
                                    @enderror"
                                    name="image" value="{{ $kategori->image }}">
                                @error('image')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>


                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
