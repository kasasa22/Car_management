<?php
namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function create()
    {
        return view('pages.record-sale');
    }

    public function index()
    {
        // Fetch all sales records from the database
        $sales = Sale::all();

        // Return the view with the sales data
        return view('pages.view-sales', compact('sales'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_name' => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'amount_paid' => 'required|numeric',
            'payment_type' => 'required|string',
            'sale_date' => 'required|date',
        ]);

        Sale::create([
            'vehicle_name' => $request->vehicle_name,
            'customer_name' => $request->customer_name,
            'amount_paid' => $request->amount_paid,
            'payment_type' => $request->payment_type,
            'balance' => $request->payment_type == 'installment' ? $request->balance : 0,
            'sale_date' => $request->sale_date,
        ]);

        return redirect()->route('record-sale')->with('success', 'Sale recorded successfully.');
    }
}
