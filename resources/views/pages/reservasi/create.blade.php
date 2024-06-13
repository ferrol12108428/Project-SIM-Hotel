@extends('Layouts.Reservasi.app')

@section ('content')
<!-- Page Title -->
<div class="pagetitle">
    <h1>Reservasi (Create)</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/">Reservasi</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section produk">
    <div class="row">

        {{-- columns --}}
        <div class="col-lg-12">
            <div class="row">

                @if ($errors->any())
                <ul style="width: 100%; background: red; padding: 10px">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                @if ($message = Session::get('Error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-octagon me-1"></i>
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form class="row g-3" action="{{ route('reservasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body">
                                <h5 class="card-title">User's Form <a href="{{ route('user.index') }}" class="btn btn-secondary rounded-pill float-end">Back</a></h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-12">
                                <label for="name" class="form-label">Customer Name <span style="color: red">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Masukan name Anda" required>
                            </div>

                            <div class="col-12" style="margin-top: 25px;">
                                <label for="phone_number" class="form-label">Customer Name <span style="color: red">*</span></label>
                                <input type="number" name="phone_number" id="phone_number" placeholder="Masukan phone number Anda" class="form-control" required>
                            </div>

                            <div class="col-12" style="margin-top: 25px;">
                                <label for="name" class="form-label">Customer Name <span style="color: red">*</span></label>
                                <textarea name="address" id="address" class="form-control" placeholder="Masukan address Anda" required></textarea>
                            </div>

                            <div class="col-12" style="margin-top: 25px; margin-bottom: 25px;">
                                <label for="name" class="form-label">Customer Name <span style="color: red">*</span></label>
                                <select name="gender" id="gender" class="form-select" required>
                                    <option selected hidden disabled>Pilih Gender Anda</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <hr>

                            <div class="col-12">
                                <label for="price" class="form-label">Room <span style="color: red">*</span></label>
                                <select name="room_id" class="form-select">
                                    <option selected hidden disabled>Pilih Kamar</option>
                                    @foreach($rooms as $room)
                                    @if ($room->stats == 'Available')
                                    <option value="{{ $room->id }}">{{ $room->room_number }} - {{ $room->type }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12" style="margin-top: 25px;">
                                <label for="stock" class="form-label">Arrival Date <span style="color: red">*</span></label>
                                <input type="date" name="arrival_date" id="arrival_date" class="form-control" required>
                            </div>

                            <div class="col-12" style="margin-top: 25px;">
                                <label for="stock" class="form-label">Departure Date <span style="color: red">*</span></label>
                                <input type="date" name="departure_date" id="departure_date" class="form-control" required>
                            </div>

                            <div class="col-12" style="margin-top: 25px;">
                                <label for="stock" class="form-label">Number of Guests <span style="color: red">*</span></label>
                                <input type="number" name="guests_count" id="guests_count" class="form-control" placeholder="0" required>
                            </div>

                            <div class="text-center" style="margin-top: 25px;">
                                <button type="submit" class="btn btn-primary" style="width: 250px;"><i class="bi bi-send"></i> Kirim</button>
                                <button type="reset" class="btn btn-danger" style="width: 250px;"><i class="bi bi-arrow-clockwise"></i> Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection