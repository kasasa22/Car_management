<?php

namespace App\Http\Controllers;

use App\Models\InstallmentPlan;
use App\Models\Vehicle;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstallmentPlanController extends Controller
{
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
