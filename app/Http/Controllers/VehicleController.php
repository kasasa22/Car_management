<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('pages.view-vehicles', compact('vehicles'));
    }

    public function show($id)
{
    $vehicle = Vehicle::with('expenses')->find($id);

    if (!$vehicle) {
        return response()->json(['error' => 'Vehicle not found'], 404);
    }

    // Calculate total expenses
    $totalExpenses = $vehicle->expenses->sum('amount');

    // Calculate parking fee
    $parkingFee = 0;
    if ($vehicle->status === 'Available') {
        $dateBought = Carbon::parse($vehicle->date_bought);
        $currentDate = Carbon::now();
        $daysAvailable = $dateBought->diffInDays($currentDate);
        $parkingFee = floor($daysAvailable) * 20000; // Ensure using complete days only
    }

    // Add calculated values to the vehicle object
    $vehicle->total_expenses = $totalExpenses;
    $vehicle->parking_fee = number_format($parkingFee, 0, '.', ','); // Format to integer with comma separators

    return response()->json($vehicle);
}




    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'amount_paid' => 'required|numeric',
            'balance' => 'nullable|numeric',
            'date_bought' => 'required|date',
            'status' => 'required|string|max:255',
            'amount_credited' => 'nullable|numeric',
            'monthly_deposit' => 'nullable|numeric',
            'total_amount' => 'nullable|numeric',
            'customer_name' => 'nullable|string|max:255',
            'sale_date' => 'nullable|date',
            'payment_type' => 'nullable|string|max:255',
            'blocker_fee' => 'nullable|numeric', // New field
        ]);

        Vehicle::create($validated);

        return redirect()->route('view-vehicles')->with('success', 'Vehicle added successfully!');
    }

    public function viewInstallments()
    {
        $installmentPlans = Vehicle::where('balance', '>', 0)->get();
        return view('pages.view-installments', compact('installmentPlans'));
    }

    public function create()
    {
        $vehicles = Vehicle::all();
        return view('pages.record-expense', compact('vehicles'));
    }


    public function profitLossReport(Request $request)
    {
        $month = $request->get('month_of', date('Y-m'));
        $vehicles = Vehicle::where('status', 'sold')
            ->whereRaw("DATE_FORMAT(sale_date, '%Y-%m') = ?", [$month])
            ->with('expenses')
            ->get();

        return view('pages.profit-loss-report', compact('vehicles', 'month'));
    }
}
