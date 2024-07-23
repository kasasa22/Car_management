<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();
        return view('pages.view-expenses', compact('expenses'));
    }

    public function show($id)
    {
        $expense = Expense::findOrFail($id);
        return response()->json($expense);
    }

    public function create()
    {
        return view('pages.record-expense');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'vehicle_name' => 'nullable|string|max:255',
        ]);

        Expense::create($validatedData);

        return redirect()->route('view-expenses')->with('success', 'Expense added successfully!');
    }
}
