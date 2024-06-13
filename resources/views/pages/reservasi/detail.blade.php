@extends('layouts.Reservasi.app')

@section('content')
<!-- Basic Modal -->
<div class="card">
    <div class="card-body">
        <h6 class="card-title">Detail Reservasi</h6>
        <hr>
        <h4 class="text-center" style="color: darkblue;"> <strong>InHouse Hotel</strong></h4>
        <div class="row">
            <p>
                Customer Name : <strong>{{ $reservasi->customer->name }}</strong>
                <br>
                Customer Address : <strong>{{ $reservasi->customer->address }}</strong>
                <br>
                Customer Phone Number : <strong>{{ $reservasi->customer->phone_number }}</strong>
                <br>
                Customer Gender : <strong>{{ $reservasi->customer->gender }}</strong>
                <br>
                Tanggal Transaksi : <strong>{{ \Carbon\Carbon::parse($date)->setTimezone('Asia/Jakarta')->format('Y-m-d,H:i:s')}}</strong>
                <br>
            </p>
        </div>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>Room</th>
                    <th>Arrival Date</th>
                    <th>Departure Date</th>
                    <th class="text-center">Night Stay</th>
                    <th class="text-end">harga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $reservasi->room->room_number }}</td>
                    <td>{{ $reservasi->arrival_date}}</td>
                    <td>{{ $reservasi->departure_date }}</td>
                    <td class="text-center">{{ $reservasi->night_stay }}</td>
                    <td class="text-end">Rp. {{ number_format($reservasi->room->price, 0, ',', '.') }}</td>
                </tr>
                <br>
            </tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <th class="text-center">Total :</th>
                <th class="text-end">Rp. {{ number_format($reservasi->total_price, 0, ',', '.') }}</th>
            </tr>
        </table>

        <div class="">
            <h5>Total : Rp{{ number_format($reservasi->total_price, 0, ',' . '.') }}</h5>
            <h5>Pembayaran : Rp{{ number_format($reservasi->payment, 0, ',' . '.') }}</h5>
            <h5>Kembalian : Rp{{ number_format($reservasi->total_return, 0, ',' . '.') }}</h5>
        </div>
    </div>
    <div class="card-footer">
        <div class="text-center">
            <a href="/reservasi" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
<!-- End Basic Modal-->
@endsection