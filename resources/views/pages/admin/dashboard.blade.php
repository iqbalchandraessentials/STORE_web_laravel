@extends('layouts.admin')

@section('title')
    Admin Dashboard
@endsection

@section('content')
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-store navbar-expand-lg navbar-light fixed-top" data-aos="fade-down">
            <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
                &laquo; Menu
            </button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto d-none d-lg-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="/images/icon-user.png" alt="" class="rounded-circle mr-2 profile-picture" />
                            Hi, Angga
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/">Logout</a>
                        </div>
                    </li>

                </ul>
                <!-- Mobile Menu -->
                <ul class="navbar-nav d-block d-lg-none mt-3">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Hi, Angga
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
                <div class="dashboard-heading">
                    <h2 class="dashboard-title">Admin Dashboard</h2>
                    <p class="dashboard-subtitle">
                        Look what you in Admin dashboard today!
                    </p>
                </div>
                <div class="dashboard-content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="dashboard-card-title">
                                        Customer
                                    </div>
                                    <div class="dashboard-card-subtitle">
                                        {{ $Customer }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="dashboard-card-title">
                                        Revenue
                                    </div>
                                    <div class="dashboard-card-subtitle">
                                        Rp.{{ $Revenue }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="dashboard-card-title">
                                        Transaction
                                    </div>
                                    <div class="dashboard-card-subtitle">
                                        {{ $Transaction }}
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
@endsection
