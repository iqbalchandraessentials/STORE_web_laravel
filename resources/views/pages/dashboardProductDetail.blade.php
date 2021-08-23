@extends('layouts.dashboard')

@section('title')
  Dashboard Product Detail
@endsection

@section('content')
<!-- Page Content -->

<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
  <div class="dashboard-heading">
    <h2 class="dashboard-title">Product Detail</h2>
    @foreach ($products as $product)
    <p class="dashboard-subtitle">{{$product->name}}</p>
  </div>
      

  <div class="dashboard-content">
    <div class="row">
      <div class="col-12">
        @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                    @endif
        <form action="{{route('dashboard-product-update', $product->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="text" class="d-none" value="{{Auth::user()->id}}">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Product Name</label>
                    <input
                      type="text"
                      class="form-control"
                      id="name"
                      aria-describedby="name"
                      name="name"
                      value="{{$product->name}}"
                    />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input
                      type="number"
                      class="form-control"
                      id="price"
                      aria-describedby="price"
                      name="price"
                      value="{{$product->price}}"
                    />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Kategori</label>
                    <select name="categories_id" class="form-control">
                      <option value="{{$product->categories_id}}">( {{$product->category->name}} )</option>
                      @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea
                      name="description"
                      cols="30"
                      rows="4"
                      id="editor"
                      class="form-control"
                    >
                    {!! $product->description !!}
                    </textarea>
                  </div>
                </div>
                <div class="col">
                  <button
                    type="submit"
                    class="btn btn-success btn-block px-5"
                  >
                    Update Product
                  </button>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">

              @foreach ($product->galleries as $gallery)
              <div class="col-md-4">
                <div class="gallery-container">
                  <img
                  src="{{Storage::url($gallery->photos ?? '')}}"
                  alt=""
                  class="w-100"
                  />
                  <a class="delete-gallery" href="{{route('dashboard-product-gallery-delete', $gallery->id)}}">
                    <img src="{{url('images/icon-delete.svg')}}" alt="" />
                  </a>
                </div>
              </div>
              @endforeach

              
              <div class="col-12 mt-3">
                <form action="{{ route('dashboard-product-gallery-upload') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="products_id" value="{{ $product->id }}">
                  <input
                    type="file"
                    name="photos"
                    id="file"
                    style="display: none"
                    onchange="form.submit()"
                  />
                    <button
                      type="button"
                      class="btn btn-secondary btn-block mt-3"
                      onclick="thisFileUpload()"
                    >
                    Add Photo
                    </button>
                </form>
              </div>  

            </div>
          </div>
        </div>
      </div>
    </div>
  
  </div>
</div>
</div>
<!-- /#page-content-wrapper -->
</div>
@endforeach
<!-- /#page-content-wrapper -->
<!-- /#page-content-wrapper -->
</div>
@endsection

@push('addon-script')
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace('editor');

</script>
<script>
  function thisFileUpload() {
    document.getElementById("file").click();
  }
</script>
@endpush