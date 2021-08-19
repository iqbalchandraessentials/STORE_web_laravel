@extends('layouts.admin')

@section('title')
    Edit User
@endsection

@section('content')
    <!-- Page Content -->
    <div id="page-content-wrapper">


        <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
                <div class="dashboard-heading">
                    <h2 class="dashboard-title">User</h2>
                    <p class="dashboard-subtitle">
                        Edit User
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
                                    <form action="{{ route('user.update', $item->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Name of User</label>
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ $item->name }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Email User</label>
                                                    <input type="email" name="email" class="form-control"
                                                        value="{{ $item->email }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Password User</label>
                                                    <input type="password" name="password" class="form-control">
                                                    <small>Please empty if you don't want to change Password</small>
                                                </div>
                                                <label for="roles">Roles</label>
                                                <select name="roles" id="roles" class="form-control" required>
                                                    <option value="{{ $item->roles }}"> {{ $item->roles }} </option>
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
    <!-- /#page-content-wrapper -->
@endsection
