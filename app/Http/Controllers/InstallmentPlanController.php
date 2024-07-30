<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class InstallmentPlanController extends Controller
{
    public function report(Request $request)
    {
        $month = $request->get('month_of', date('Y-m'));

        // Fetch sales with related vehicles for the specified month
        $installments = Sale::with('vehicle')
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

