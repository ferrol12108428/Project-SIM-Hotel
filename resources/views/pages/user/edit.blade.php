@extends('Layouts.User.app')

@section ('content')
<!-- Page Title -->
<div class="pagetitle">
    <h1>User (Create)</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/">User</a></li>
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
                        <h5 class="card-title">User's Form <a href="{{ route('user.index') }}" class="btn btn-secondary rounded-pill float-end">Back</a></h5>
                    </div>
                    <div class="card-body" style="margin: 0px;">
                        <form class="row g-3" action="{{ route('user.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="col-12">
                                <label for="name" class="form-label">Name <span style="color: red">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $data->name }}" required>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email <span style="color: red">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $data->email }}" required>
                            </div>

                            <div class="col-12">
                                <label for="password" class="form-label">Password <span style="color: red">*</span></label>
                                <input type="password" name="password" id="password" class="form-control" value="{{ $data->password }}" required>
                            </div>

                            <div class="col-12">
                                <label for="role" class="form-label">Role <span style="color: red">*</span></label>
                                <select name="role" id="role" class="form-select">
                                    <option value="Admin" {{ $data->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="Staff" {{ $data->role == 'Staff' ? 'selected' : '' }}>Staff</option>
                                </select>
                            </div>

                            <div class="text-center" style="margin-top: 20px;">
                                <button type="submit" class="btn btn-primary" style="width: 250px;"><i class="bi bi-send"></i> Kirim</button>
                                <button type="reset" class="btn btn-danger" style="width: 250px;"><i class="bi bi-arrow-clockwise"></i> Reset</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection