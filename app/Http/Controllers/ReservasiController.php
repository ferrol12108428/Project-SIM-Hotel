<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Reservasi;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Reservasi::all();
        return view('pages.reservasi.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = Room::all();
        return view('pages.reservasi.create', compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pelanggan = new Customer();
        $pelanggan->name = $request->input('name');
        $pelanggan->address = $request->input('address');
        $pelanggan->phone_number = $request->input('phone_number');
        $pelanggan->gender = $request->input('gender');
        $pelanggan->save();

        $reservasi = new Reservasi();
        $reservasi->room_id = $request->input('room_id');
        $reservasi->customer_id = $pelanggan->id;
        $reservasi->arrival_date = $request->input('arrival_date');
        $reservasi->departure_date = $request->input('departure_date');
        $reservasi->guests_count = $request->input('guests_count');

        $arrivalDate = Carbon::parse($reservasi->arrival_date);
        $departureDate = Carbon::parse($reservasi->departure_date);
        $nighStay = $arrivalDate->diffInDays($departureDate);
        $reservasi->night_stay = $nighStay;

        $room = Room::find($reservasi->room_id);
        $price = $room->price;
        $totalPrice = $price * $reservasi->night_stay;
        $reservasi->total_price = $totalPrice;

        $reservasi->payment = 0;
        $reservasi->total_return = 0;
        $reservasi->payment_status = 'Not paid';
        
        $room = Room::findOrFail($request->input('room_id'));
        $roomCapacity = $room->capacity;

        if ($request->input('guests_count') <= $roomCapacity) {
            $updateResult = $room->update(['stats' => 'Not available']);
            if (!$updateResult) {
                return redirect()->back()->with('Error', 'Gagal memperbarui status kamar.');
            }
            $reservasi->save();
            return redirect()->route('reservasi.index')->with('Success', 'Reservasi berhasil dibuat.');
        } else {
            return redirect()->back()->with('Error', 'Kapasitas ruangan tidak mencukupi.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $date = Carbon::now();
        $reservasi = Reservasi::find($id);
        return view('pages.reservasi.detail', compact('date', 'reservasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $date = Carbon::now();
        $reservasi = Reservasi::find($id);
        return view('pages.reservasi.payment.index', compact('date', 'reservasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'payment' => 'required',
            'total_price' => 'required',
        ]);

        $reservasi = Reservasi::find($id);

        if ($request->payment >= $request->total_price) {
            $return = $request->payment - $request->total_price;
        } else {
             return redirect()->back()->with('Error', 'Saldo Anda Kurang!');
        }
        $reservasi->update([
        'payment' => $request->payment,
        'total_return' => $return,
        'total_price' => $request->total_price,
        'payment_status' => "Already paid",
        ]);
        return redirect()->route('reservasi.index')->with('Success', "Pembayaran Telah Berhasil!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Reservasi::where('id', $id)->delete();
        return redirect()->route('reservasi.index')->with('Success', 'Reservasi berhasil dihapus');
    }
}
