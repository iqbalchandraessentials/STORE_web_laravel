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
                    <h2 class="dashboard-title">User</h2>
                    <p class="dashboard-subtitle">
                        Create New User
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
                                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Name of User</label>
                                                    <input type="text" name="name" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Email User</label>
                                                    <input type="email" name="email" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Password User</label>
                                                    <input type="password" name="password" class="form-control" required
                                                        autocomplete="off">
                                                </div>
                                                <label for="roles">Roles</label>
                                                <select name="roles" id="roles" class="form-control" required>
                                                    <option value="USER">USER</option>
                                                    <option value="ADMIN">ADMIN</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col text-right">
                                                <button type="submit" class="btn btn-success px-5 mt-3"> Save Now</button>
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
