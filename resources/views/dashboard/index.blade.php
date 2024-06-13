@extends ('Layouts.app')

@section('content')
<!-- Page Title -->
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<!-- Main content -->
<section class="section dashboard">
    <div class="row">

        @if ($message = Session::get('Success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if ($message = Session::get('Error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-octagon me-1"></i>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- columns -->
        <div class="col-lg-12">
            <div class="row">
                <div class="card">
                    <div style="margin: 20px">
                        <h3>Hello, {{ Auth::user()->name }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- End columns -->


        <!-- Card Data Produk -->
        <div class="col-lg-6">
            <div class="card">
                <div style="height: 350px; overflow: hidden; display: flex; justify-content: center; align-items: center;">
                    <img src="{{ asset('assets/img/room.jpeg') }}" alt="Data Room" style="width: 100%">
                </div>
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center;">Data Room</h5>
                    <h5 class="card-text" style="text-align: center;"><a href="/room" class="btn btn-primary rounded-pill">Lihat</a></h5>
                </div>
            </div>
        </div>
        <!-- End Card Data Produk -->

        <!-- Card Data Penjualan -->
        <div class="col-lg-6">
            <div class="card">
                <div style="height: 350px; overflow: hidden; display: flex; justify-content: center; align-items: center;">
                    <img src="{{ asset('assets/img/hotel-data.jpeg') }}" alt="Data Reservasi" style="width: 100%">
                </div>
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center;">Data Reservasi</h5>
                    <h5 class="card-text" style="text-align: center;"><a href="/reservasi" class="btn btn-primary rounded-pill">Lihat</a></h5>
                </div>
            </div>
        </div>
        <!-- End Card Data Penjualan -->

        <!-- Card Data User -->
        <div class="col-lg-6">
            <div class="card">
                <div style="height: 350px; overflow: hidden; display: flex; justify-content: center; align-items: center;">
                    <img src="{{ asset('assets/img/customer.jpeg') }}" alt="Data Customer" style="width: 100%">
                </div>
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center;">Data Customer</h5>
                    <h5 class="card-text" style="text-align: center;"><a href="/customer" class="btn btn-primary rounded-pill">Lihat</a></h5>
                </div>
            </div>
        </div>
        <!-- End Card Data User -->

        <!-- Card Data User -->
        <div class="col-lg-6">
            <div class="card">
                <div style="height: 350px; overflow: hidden; display: flex; justify-content: center; align-items: center;">
                    <img src="{{ asset('assets/img/hotel-data.jpeg') }}" alt="Data User" style="width: 100%">
                </div>
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center;">Data User</h5>
                    <h5 class="card-text" style="text-align: center;"><a href="/user" class="btn btn-primary rounded-pill">Lihat</a></h5>
                </div>
            </div>
        </div>
        <!-- End Card Data User -->

    </div>
</section>
<!-- /.content -->
@endsection