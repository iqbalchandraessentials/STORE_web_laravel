@extends('layouts.admin')

@section('title')
    Home Store
@endsection

@section('content')
      <!-- Page Content -->
      

        <div
          class="section-content section-dashboard-home"
          data-aos="fade-up"
        >
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">Create New Category</h2>
              <p class="dashboard-subtitle">Look what you have made today!</p>
            </div>
            <div class="dashboard-content">
              <div class="row">
                <div class="col-md-12">
                  @if ($errors->any())
                      <ul>
                        @foreach ($errors as $error)
                            <li>{{$error}}</li>
                        @endforeach
                      </ul>
                  @endif
                  <div class="card">
                    <div class="card-body">
                      <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" name="name" autofocus class="form-control" required>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="photo">Photo</label>
                              <input type="file" name="photo" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col text-right">
                            <button type="submit" class="btn btn-danger px-5">Save</button>
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
    <script>

      var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}'
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'photo',
                    name: 'photo'
                },
                {
                    data: 'slug',
                    name: 'slug'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searcable: false,
                    width: '15%'
                },
            ]
        })
    </script>
@endpush