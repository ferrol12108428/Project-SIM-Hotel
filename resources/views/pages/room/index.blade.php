@extends ('Layouts.Room.app')

@section ('content')
<!-- Page Title --->
<div class="pagetitle">
    <h1>Room</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Room</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section produk">
    <div class="row">

        @if ($errors->any())
        <ul style="width: 100%; background: red; padding: 10px">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

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

        <!-- Columns -->
        <div class="col-lg-12">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Table data Room
                            <a href="{{ route('room.create') }}" class="btn btn-primary rounded-pill float-end">Create</a>
                        </h5>

                        <!-- Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Room</th>
                                    <th>Room Number</th>
                                    <th>Room Type</th>
                                    <th>Price</th>
                                    <th>Capacity</th>
                                    <th>stats</th>
                                    <th class="text-center" colspan="3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($data as $dt)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><a href="{{ asset('/assets/img/room/' . $dt->picture) }}" target="_blank"><img src="{{ asset('/assets/img/room/' . $dt->picture) }}" width="100"></a> {{ $dt->name }}</td>
                                    <td>{{ $dt->room_number }}</td>
                                    <td>{{ $dt->type }}</td>
                                    <td>Rp. {{ number_format($dt->price, 0, ',', '.') }}</td>
                                    <td>{{ $dt->capacity }}</td>
                                    <td>{{ $dt->stats }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('room.edit', $dt->id) }}" class="btn btn-primary"><i class="bi bi-pencil"></i> Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('room.destroy', $dt->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Delete</button>
                                        </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection