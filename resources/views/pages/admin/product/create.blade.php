@extends('layouts.admin')

@section('title')
    Admin Catogory
@endsection

@section('content')
    <!-- Page Content -->
    <div id="page-content-wrapper">


        <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
                <div class="dashboard-heading">
                    <h2 class="dashboard-title">Product</h2>
                    <p class="dashboard-subtitle">
                        Create New Product
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
                                    <form action="{{ route('product.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Name of Product</label>
                                                    <input type="text" name="name" class="form-control" autofocus required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">User Product</label>
                                                    <select name="user_id" class="form-control">
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Category Product</label>
                                                    <select name="categories_id" class="form-control">
                                                        @foreach ($categories as $Category)
                                                            <option value="{{ $Category->id }}">{{ $Category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Price Product</label>
                                                    <input type="number" name="price" class="form-control" required
                                                        autocomplete="off">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Description Product</label>
                                                    <textarea name="description" id="editor"></textarea>
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
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');

    </script>

@endpush
