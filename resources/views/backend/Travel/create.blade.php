@extends('layouts.app')

@section('title', 'Create Wisata')

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
                <h1>Forms Tambah Wisata</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href=""">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('beTravel.index', $kategori->id) }}">wisata</a></div>
                    <div class="breadcrumb-item"><a>create</a></div>
                </div>
            </div>

            <div class="section-body">

                <div class="card">
                    <form action="{{ route('beTravel.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name = "kategori_id" value="{{ $kategori->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="name"
                                    class="form-control @error('title')
                                is-invalid
                            @enderror"
                                    name="title">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control @error('descriotion') is-invalid @enderror" name="descriotion" rows="5"></textarea>
                                @error('descriotion')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
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
