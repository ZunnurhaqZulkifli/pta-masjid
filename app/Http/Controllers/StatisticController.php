<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StatisticController extends Controller
{
    public function index()
    {
        $payments = new Payment();
        
        $payments = $payments->groupBy('payment_type_id')
            ->selectRaw('sum(amount) as amount, payment_type_id')
            ->orderBy('amount', 'desc')
            ->get();

        dd($payments);

        $totalPayments = $payments->sum('amount');

        return Inertia::render('statistics/index', [
            'payments' => $payments,
            'totalPayments' => $totalPayments,
        ]);
    }
}
