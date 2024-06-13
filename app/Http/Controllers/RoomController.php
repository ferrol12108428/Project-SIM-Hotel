<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Room::all();
        return view('pages.room.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.room.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif',
            'room_number' => 'required',
            'type' => 'required',
            'price' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
        ]);

        $image = $request->file('picture');
        $imgName = rand() . '.' . $image->extension();
        $path = public_path('assets/img/room/');
        $image->move($path, $imgName);

        Room::create([
            'picture' => $imgName,
            'room_number' => $request->room_number,
            'type' => $request->type,
            'price' => $request->price,
            'capacity' => $request->capacity,
        ]);
        return redirect()->route('room.index')->with('success', 'Kamar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Room::where('id', $id)->first();
        return view('pages.room.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif',
            'room_number' => 'required',
            'type' => 'required',
            'price' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
        ]);

        if (is_null($request->file('picture'))) {
            $imgName = $request->file('picture');
        } else {
            $image = $request->file('picture');
            $imgName = rand() . '.' . $image->extension();
            $path = public_path('assets/img/room/');
            $image->move($path, $imgName);
        }

        Room::where('id', '=', $id)->update([
            'picture' => $imgName,
            'room_number' => $request->room_number,
            'type' => $request->type,
            'price' => $request->price,
            'capacity' => $request->capacity,
        ]);
        return redirect()->route('room.index')->with('success', 'Kamar berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Room::where('id', $id)->delete();
        return redirect()->route('room.index')->with('Success', 'Room berhasil dihapus!');
    }
}
