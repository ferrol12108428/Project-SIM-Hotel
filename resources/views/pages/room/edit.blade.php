@extends('Layouts.Room.app')

@section ('content')
<!-- Page Title -->
<div class="pagetitle">
    <h1>Room (Create)</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/">Room</a></li>
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

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Room's Form <a href="{{ route('room.index') }}" class="btn btn-secondary rounded-pill float-end">Back</a></h5>
                        <form class="row g-3" action="{{ route('room.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="col-12">
                                <label for="picture" class="form-label">Room image <span style="color: red">*</span></label>
                                <br>
                                <img src="{{ asset('/assets/img/room/' . $data->picture) }}" style="width: 15%; margin-bottom: 15px;">
                                <input type="file" name="picture" class="form-control" required>
                            </div>

                            <div class="col-12">
                                <label for="room_number" class="form-label">Room number <span style="color: red">*</span></label>
                                <input type="number" name="room_number" value="{{ $data->room_number }}" class="form-control" required>
                            </div>

                            <div class="col-12">
                                <label for="type" class="form-label">Type Room <span style="color: red">*</span></label>
                                <input type="text" name="type" value="{{ $data->type }}" class="form-control" required>
                            </div>

                            <div class="col-12">
                                <label for="price" class="form-label">Room price <span style="color: red">*</span></label>
                                <input type="number" name="price" class="form-control" value="{{ $data->price }}" required>
                            </div>

                            <div class="col-12">
                                <label for="capacity" class="form-label">Capacity <span style="color: red">*</span></label>
                                <input type="number" name="capacity" class="form-control" value="{{ $data->capacity }}" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" style="width: 250px;"><i class="bi bi-send"></i> Kirim</button>
                                <button type="reset" class="btn btn-danger" style="width: 250px;"><i class="bi bi-arrow-clockwise"></i> Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection