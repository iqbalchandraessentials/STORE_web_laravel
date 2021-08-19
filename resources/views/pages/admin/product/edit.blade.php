@extends('layouts.admin')

@section('title')
    Edit Product
@endsection

@section('content')
    <!-- Page Content -->
    <div id="page-content-wrapper">


        <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
                <div class="dashboard-heading">
                    <h2 class="dashboard-title">Product</h2>
                    <p class="dashboard-subtitle">
                        Edit Product
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
                                    <form action="{{ route('product.update', $item->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Name of Product</label>
                                                <input type="text" name="name" value="{{ $item->name }}"
                                                    class="form-control" autofocus required>
                                            </div>

                                            <div class="form-group">
                                                <label for="">User Product</label>
                                                <select name="user_id" class="form-control">
                                                    <option value="{{ $item->user_id }}" selected>
                                                        {{ $item->user->name }}</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Category Product</label>
                                                <select name="categories_id" class="form-control">
                                                    <option value="{{ $item->categories_id }}" selected>
                                                        {{ $item->category->name }}</option>
                                                    @foreach ($categories as $Category)
                                                        <option value="{{ $Category->id }}">{{ $Category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Price Product</label>
                                                <input type="number" name="price" value="{{ $item->price }}"
                                                    class="form-control" required autocomplete="off">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Description Product</label>
                                                <textarea name="description" id="editor">{!! $item->description !!}</textarea>
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
