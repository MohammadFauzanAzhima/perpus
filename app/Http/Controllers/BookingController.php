<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.booking', [
            'bookings' => Booking::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);

        $validate = $request->validate([
            'nameuser' => 'required',
            'judul' =>'required',
            'book_id' => 'required',
            'status' => 'required',
            'alasan' => 'required',
            'expired_at' => 'required',
            'is_denda' => 'required',
            //'kode' => 'required',
        ]);

        Booking::create($validate);

        $newBooking = Booking::latest()->first();

        Booking::where('id', $newBooking->id)->update([
            'kode' => $newBooking->id .$newBooking->book_id . $newBooking->created_at->format('dmy'),
        ]);

        return redirect('/booking')->with('success','Peminjaman berhasil diajukan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return view('pages.bookingDetail', [
            'booking' => $booking
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
