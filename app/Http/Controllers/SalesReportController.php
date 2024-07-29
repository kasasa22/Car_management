<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function salesReport(Request $request)
    {
        $month_of = $request->get('month_of', date('Y-m'));
        $sales = Sale::with('vehicle')
            ->whereRaw("DATE_FORMAT(sale_date, '%Y-%m') = ?", [$month_of])
            ->orderBy('sale_date', 'asc')
            ->get();

        $totalAmount = $sales->sum('amount_paid');

        return view('pages.sales-report', compact('sales', 'month_of', 'totalAmount'));
    }

    // Other methods...
}

