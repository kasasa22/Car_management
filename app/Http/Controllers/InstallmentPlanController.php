<?php

namespace App\Http\Controllers;

use App\Models\InstallmentPlan;
use App\Models\Vehicle;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $totalAmount = $installments->sum('amount');
        $totalBalance = $installments->sum('balance');

        return view('pages.installments-report', compact('installments', 'totalAmount', 'totalBalance', 'month'));
    }

    public function pay(Request $request)
    {
                $request->validate([
            'plan_id' => 'required|exists:installment_plans,id',
            'amount' => 'required|numeric|min:0',
        ]);

        try {
            $plan = InstallmentPlan::findOrFail($request->plan_id);
            $vehicle = $plan->vehicle;
            $sale = Sale::where('vehicle_id', $vehicle->id)->first();

            DB::transaction(function () use ($plan, $vehicle, $sale, $request) {
                $plan->balance -= $request->amount;
                $vehicle->balance -= $request->amount;
                if ($sale) {
                    $sale->balance -= $request->amount;
                    $sale->save();
                }
                $plan->save();
                $vehicle->save();
            });

            return response()->json(['success' => true, 'message' => 'Payment successfully processed']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
