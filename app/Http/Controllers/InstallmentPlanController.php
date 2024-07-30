<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InstallmentPlanController extends Controller
{
    public function report(Request $request)
    {
        $month = $request->get('month_of', date('Y-m'));

        // Fetch sales with related vehicles for the specified month, excluding full payment types
        $installments = Sale::whereHas('vehicle', function ($query) {
            $query->where('payment_type', '!=', 'full');
        })
        ->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$month])
        ->orderBy('created_at', 'asc')
        ->get();

        // Calculate totals
        $totalAmount = $installments->sum(function($installment) {
            return $installment->vehicle->total_amount;
        });
        $totalBalance = $installments->sum('balance');

        return view('pages.installments-report', compact('installments', 'totalAmount', 'totalBalance', 'month'));
    }
}
