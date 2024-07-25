<?php

namespace App\Http\Controllers;

use App\Models\InstallmentPlan;
use Illuminate\Http\Request;

class InstallmentPlanController extends Controller
{
    public function index()
    {
        $installmentPlans = InstallmentPlan::with('vehicle')->get();
        return view('pages.view-installments', compact('installmentPlans'));
    }

    public function show($id)
    {
        $plan = InstallmentPlan::with('vehicle')->find($id);
        return response()->json($plan);
    }
}

