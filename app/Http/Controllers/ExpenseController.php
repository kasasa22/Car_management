<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Vehicle;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::with('vehicle')->get();
        return view('pages.view-expenses', compact('expenses'));
    }

    public function show($id)
    {
        $expense = Expense::with('vehicle')->findOrFail($id);
        return response()->json($expense);
    }

    public function create()
    {
        $vehicles = Vehicle::all();
        return view('pages.record-expense', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'vehicle_id' => 'required|exists:vehicles,id',
        ]);

        Expense::create($validatedData);

        return redirect()->route('view-expenses')->with('success', 'Expense added successfully!');
    }
}
