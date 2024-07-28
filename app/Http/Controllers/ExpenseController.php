<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();
        return view('pages.view-expenses', compact('expenses'));
    }

    public function create()
    {
        $availableVehicles = Vehicle::where('status', 'Available')->get();
        return view('pages.record-expense', compact('availableVehicles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'vehicle_id' => 'required|exists:vehicles,id',
        ]);

        try {
            DB::transaction(function () use ($request) {
                $vehicle = Vehicle::find($request->vehicle_id);

                if (!$vehicle) {
                    throw new Exception('Vehicle not found');
                }

                Expense::create([
                    'name' => $request->name,
                    'amount' => $request->amount,
                    'description' => $request->description,
                    'vehicle_id' => $request->vehicle_id,
                ]);
            });

            return redirect()->route('view-expenses')->with('success', 'Expense recorded successfully.');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
