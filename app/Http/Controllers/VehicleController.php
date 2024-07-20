<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('pages.view-vehicles', compact('vehicles'));
    }

    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return response()->json($vehicle);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'amount_paid' => 'required|numeric',
            'balance' => 'required|numeric',
            'date_bought' => 'required|date',
            'status' => 'required|string|max:255',
            'amount_credited' => 'required|numeric'
        ]);

        Vehicle::create($validatedData);

        return redirect()->route('add-vehicle')->with('success', 'Vehicle added successfully!');
    }
}
