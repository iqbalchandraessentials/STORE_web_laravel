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
    <h2 class="dashboard-title">Shirup Marzan</h2>
    <p class="dashboard-subtitle">Product Details</p>
  </div>
  <div class="dashboard-content">
    <div class="row">
      <div class="col-12">
        <form action="">
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
                      name="storeName"
                      value="Papel La Casa"
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
                      value="200"
                    />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea
                      name="descrioption"
                      id=""
                      cols="30"
                      rows="4"
                      class="form-control"
                    >
The Nike Air Max 720 SE goes bigger than ever before with Nike's tallest Air unit yet for unimaginable, all-day comfort. There's super breathable fabrics on the upper, while colours add a modern edge. Bring the past into the future with the Nike Air Max 2090, a bold look inspired by the DNA of the iconic Air Max 90. Brand-new Nike Air cushioning
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
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="gallery-container">
                  <img
                    src="{{url('images/product-card-1.png')}}"
                    alt=""
                    class="w-100"
                  />
                  <a class="delete-gallery" href="#">
                    <img src="{{url('images/icon-delete.svg')}}" alt="" />
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="gallery-container">
                  <img
                    src="{{url('images/product-card-2.png')}}"
                    alt=""
                    class="w-100"
                  />
                  <a class="delete-gallery" href="#">
                    <img src="{{url('images/icon-delete.svg')}}" alt="" />
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="gallery-container">
                  <img
                    src="{{url('images/product-card-3.png')}}"
                    alt=""
                    class="w-100"
                  />
                  <a class="delete-gallery" href="#">
                    <img src="{{url('images/icon-delete.svg')}}" alt="" />
                  </a>
                </div>
              </div>
              <div class="col mt-3">
                <input
                  type="file"
                  id="file"
                  style="display: none"
                  multiple
                />
                <button
                  class="btn btn-secondary btn-block"
                  onclick="thisFileUpload();"
                >
                  Add Photo
                </button>
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

<!-- /#page-content-wrapper -->
<!-- /#page-content-wrapper -->
</div>
@endsection

@push('addon-script')
<script>
  function thisFileUpload() {
    document.getElementById("file").click();
  }
</script>
@endpush