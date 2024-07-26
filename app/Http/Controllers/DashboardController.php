<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Sale;
use Illuminate\Http\Request;
use App\Models\User; // Add this if you have a User model for members count

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch data from the database
        $vehiclesAvailable = Vehicle::where('status', 'available')->count();
        $vehiclesWithBalance = Vehicle::where('balance', '>', 0)->count();
        $pendingPayments = Sale::sum('balance'); // Assuming 'balance' represents pending payments
        $membersCount = User::count(); // Assuming you have a User model for members
        $vehiclesOwned = Vehicle::count();
        $expenses = 45000; // Replace this with actual expense data if available

        // Pass the data to the view
        return view('pages.dashboard', compact('vehiclesAvailable', 'vehiclesWithBalance', 'pendingPayments', 'membersCount', 'vehiclesOwned', 'expenses'));
    }
}
