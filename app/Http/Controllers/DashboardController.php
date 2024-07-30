<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Vehicle;
use App\Models\Sale;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch data from the database
        $vehiclesAvailable = Vehicle::where('status', 'available')->count();
        $vehiclesWithBalance = Vehicle::where('balance', '>', 0)->count();
        $pendingPayments = Vehicle::sum('balance');
        $membersCount = User::count();
        $vehiclesOwned = Vehicle::count();
        $expenses = Expense::sum('amount');

        // Fetch recent activities
        $recentActivities = Notification::orderBy('created_at', 'desc')->take(10)->get();

        // Pass the data to the view
        return view('pages.dashboard', compact(
            'vehiclesAvailable',
            'vehiclesWithBalance',
            'pendingPayments',
            'membersCount',
            'vehiclesOwned',
            'expenses',
            'recentActivities'
        ));
    }
}
