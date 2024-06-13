@extends('layouts.Reservasi.app')

@section('content')
<!-- Page Title --->
<div class="pagetitle">
    <h1>Reservasi (Invoice)</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/penjualan">Reservasi</a></li>
            <li class="breadcrumb-item active">Invoice</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section produk">
    <div class="row">

        @if ($message = Session::get('Error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-octagon me-1"></i>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if ($message = Session::get('Success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if ($errors->any())
        <ul style="width: 100%; background: red; padding: 10px">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <div class="col-lg-12">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create reservasi invoice data <a href="{{ route('reservasi.index') }}" class="btn btn-secondary float-end">Kembali</a></h5>
                        <div id="mid">
                            <h5 class="text-danger">Customer Data</h5>
                            Nama Pelanggan : {{ $reservasi->customer->name }}
                            <br>
                            Alamat Pelanggan : {{ $reservasi->customer->address }}
                            <br>
                            No HP Pelanggan : {{ $reservasi->customer->phone_number }}
                            <br>
                            Tanggal Transaksi :{{ \Carbon\Carbon::parse($date)->setTimezone('Asia/Jakarta')->format('Y-m-d,H:i:s')}}
                            <br>
                            <hr>
                            <br>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Room</th>
                                    <th>Arrival Date</th>
                                    <th>Departure Date</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $reservasi->room->room_number }}</td>
                                    <td>{{ $reservasi->arrival_date }}</td>
                                    <td>{{ $reservasi->departure_date }}</td>
                                    <td>Rp. {{ number_format($reservasi->price, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($reservasi->total_price, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <form class="row g-3" action="{{ route('reservasi.update', $reservasi->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="col-6">
                                <label class="form-label">Total Harga</label>
                                <input type="text" class="form-control" name="total_price" id="total_price" value="{{ $reservasi->total_price }}" required hidden>
                                <p>
                                    <strong>Rp. {{ number_format($reservasi->total_price, 0, ',', '.') }}</strong>
                                </p>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Pembayaran <span style="color: red;">*</span></label>
                                <input type="numbert" class="form-control" name="payment" id="payment" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Bayar</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <div id="kembalian">Kembalian: Rp {{ $reservasi->total_return}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<script>
    document.getElementById('payment').addEventListener('input', function() {
        var total_price = parseFloat(document.getElementById('total_price').value);
        var payment = parseFloat(this.value);
        var kembalian = payment - total_price;
        document.getElementById('kembalian').innerText = 'Kembalian: Rp ' + kembalian.toFixed(2);
    });
</script>
@endsection