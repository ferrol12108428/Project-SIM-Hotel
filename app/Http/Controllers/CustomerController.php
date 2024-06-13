<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $data = Customer::all();
        $reservasi = Reservasi::all();
        return view('pages.customer.index', compact('data', 'reservasi'));
    }

    public function show($id)
    {
        $data = Customer::find($id);
        $reservasi = Reservasi::find($id);
        return view('pages.customer.detail', compact('data', 'reservasi'));
    }
}
