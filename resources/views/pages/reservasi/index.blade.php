@extends ('Layouts.Reservasi.app')

@section ('content')
<!-- Page Title --->
<div class="pagetitle">
    <h1>Reservasi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Reservasi</li>
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

        {{-- Columns --}}
        <div class="col-lg-12">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Table data Reservasi
                            <a href="{{ route('reservasi.create') }}" class="btn btn-primary rounded-pill float-end">Create</a>
                        </h5>

                        {{-- Table --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Room</th>
                                    <th>Room Number</th>
                                    <th>Customer Name</th>
                                    <th>Arrival Date</th>
                                    <th>Departure Date</th>
                                    <th>Guests Count</th>
                                    <th>Payment Stats</th>
                                    <th class="text-center" colspan="3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($data as $dt)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><a href="{{ asset('/assets/img/room/' . $dt->room->picture) }}" target="_blank"><img src="{{ asset('/assets/img/room/' . $dt->room->picture) }}" width="100"></a></td>
                                    <td>{{ $dt->room->room_number }}</td>
                                    <td>{{ $dt->customer->name }}</td>
                                    <td>{{ $dt->arrival_date }}</td>
                                    <td>{{ $dt->departure_date }}</td>
                                    <td>{{ $dt->guests_count }}</td>
                                    <td>{{ $dt->payment_status }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('reservasi.show', $dt->id) }}" class="btn btn-primary">Lihat</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('reservasi.edit', $dt->id) }}" class="btn btn-secondary">Bayar</a>
                                    </td>
                                    <td class="text-start">
                                        <form action="{{ route('reservasi.destroy', $dt->id) }}" method="POST">
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