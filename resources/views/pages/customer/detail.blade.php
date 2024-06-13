@extends ('Layouts.Customer.app')

@section ('content')
<!-- Page Title --->
<div class="pagetitle">
    <h1>Customer (Detail)</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/reservasi">Customer</a></li>
            <li class="breadcrumb-item active">Detail</li>
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
                        <h5 class="card-title">Table data Customer</h5>

                        {{-- Table --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Address</th>
                                    <th>Phone Number</th>
                                    <th>Gender</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->address }}</td>
                                    <td>{{ $data->phone_number }}</td>
                                    <td>{{ $data->gender }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Table data Reservasi</h5>

                        {{-- Table --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Room image</th>
                                    <th>Room Number</th>
                                    <th>Arrival Date</th>
                                    <th>Departure Date</th>
                                    <th>Guests Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="{{ asset('/assets/img/room/' . $reservasi->room->picture) }}" target="_blank"><img src="{{ asset('/assets/img/room/' . $reservasi->room->picture) }}" width="100"></a></td>
                                    <td>{{ $reservasi->room->room_number }}</td>
                                    <td>{{ $reservasi->arrival_date }}</td>
                                    <td>{{ $reservasi->departure_date }}</td>
                                    <td>{{ $reservasi->guests_count }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection