<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Concept;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::orderBy('id', 'desc')->get();

        return response()->json([
            'status' => true,
            'data'   => $reservations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hotel_id'        => 'required',
            'room_id'         => 'required',
            'concept_id'      => 'required',
            'total_nights'    => 'required',
            'price_per_night' => 'required',
            'total_price'     => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        $concept = Concept::find($request->concept_id);
        if($concept->open_for_sale == 0){
            return response()->json([
                'status' => false,
                'message' => 'Concept is not open for sale!'
            ]);
        }

        $store = Reservation::create([
            'customer_id'     => $request->customer_id,
            'hotel_id'        => $request->hotel_id,
            'room_id'         => $request->room_id,
            'concept_id'      => $request->concept_id,
            'total_nights'    => $request->total_nights,
            'price_per_night' => $request->price_per_night,
            'total_price'     => $request->total_price
        ]);

        if ($store) {
            return response()->json([
                'status'      => true,
                'reservation' => $store
            ]);
        }

        return response()->json([
            'status'  => false,
            'message' => 'An error has occured!'
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservationId)
    {
        $reservationId->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Deleted!'
        ]);
    }
}
