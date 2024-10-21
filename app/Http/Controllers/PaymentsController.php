<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\PaymentType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::
        orderBy('id', 'asc')
        ->with(
            'user',
            'paymentType',
            // 'status',
            // 'method'
        )->paginate(15);

        return view('payments.index', [
            'payments' => $payments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        return Inertia::render('payments/create', [
            'users' => User::all(),
            'user' => $user ?? null,
            'paymentData' => [
                'paymentTypes' => PaymentType::all(),
                'paymentMethods' => PaymentMethod::all(),
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'user_id' => 'required',
        //     'amount' => 'required',
        //     'description' => 'required',
        // ]);

        dd($request->all());
    }   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
