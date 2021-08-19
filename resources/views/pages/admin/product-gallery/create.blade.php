@extends('layouts.admin')

@section('title')
    Admin Product Gallery
@endsection

@section('content')
    <!-- Page Content -->
    <div id="page-content-wrapper">


        <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
                <div class="dashboard-heading">
                    <h2 class="dashboard-title">Product Gallery</h2>
                    <p class="dashboard-subtitle">
                        Create New Product Gallery
                    </p>
                </div>
                <div class="dashboard-content">
                    <div class="row">

                        <div class="col-md-12">
                            {{-- error handling --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('product-gallery.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="form-group">
                                                    <label for="">Name Product</label>
                                                    <select name="products_id" class="form-control">
                                                        @foreach ($products as $product)
                                                            <option value="{{ $product->id }}">{{ $product->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Image Product</label>
                                                    <input type="file" multiple name="photos" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5"> Save Now</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
    <!-- /#page-content-wrapper -->
@endsection

@push('addon-script')

@endpush
