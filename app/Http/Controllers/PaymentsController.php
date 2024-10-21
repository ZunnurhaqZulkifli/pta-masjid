<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\PaymentType;
use App\Models\Project;
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
            orderBy('id', 'desc')
            ->with(
                'user',
                'paymentType',
                // 'status',
                // 'method'
            )->paginate(20);

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

        if(isset($user)) {
            $userPaymet = $user->payments()->with('transactions', 'transactions.project', 'transactions.paymentType', 'transactions.paymentMethod', 'transactions.paymentStatus', 'transactions.userPayment')->get()->toArray();
        }

        return Inertia::render('payments/create', [
            'users'       => User::all(),
            'user'        => $user ?? null,
            'userPayment' => $userPaymet ?? null,
            'paymentData' => [
                'projects'       => Project::all(),
                'paymentTypes'   => PaymentType::all(),
                'paymentMethods' => PaymentMethod::all(),
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'           => 'required',
            'amount'            => 'required|min:1',
            'name'              => 'required|string',
            'payment_type_id'   => 'required|string',
            'payment_method_id' => 'required|string',
        ]);

        $model = Payment::create([
            'user_id'           => $request->user_id,
            'amount'            => $request->amount,
            'name'              => $request->name,
            'payment_type_id'   => $request->payment_type_id,
            'payment_method_id' => $request->payment_method_id,
            'reference_number'  => 'REF-' . fake()->unique()->numerify('######') . '-PAY',
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        if($model->payment_type_id == 5) {
            return redirect()->route('dashboard');
        }

        // simpan payment method user
        $user = User::find($model->user_id);

        $paymentInfo = $user->userPayment()->create([
            'user_id'             => $model->user_id,
            'reference_number'    => $model->reference_number,
            'card_number'         => $request->input('card_number' ?? null),
            'card_user'           => User::find($model->user_id)->name,
            'card_expiry'         => $request->input('card_expiry' ?? null),
            'card_cvv'            => $request->input('card_cvv' ?? null),
            'bank_name'           => $request->input('bank_name' ?? null),
            'bank_account_number' => $request->input('bank_account_number' ?? null),
            'phone_number'        => $request->input('phone_number' ?? null),
            'created_at'          => now(),
            'updated_at'          => now(),
        ]);

        $transaction = $model->transactions()->create([
            'name'              => $model->name,
            'project_id'        => $request->input('project_id' ?? null),
            'reason'            => Project::find($request->input('project_id'))->name ?? null,
            'amount'            => $model->amount,
            'user_id'           => $model->user_id,
            'payment_id'        => $model->id,
            'payment_type_id'   => $request->input('payment_type_id' ?? null),
            'payment_method_id' => $request->input('payment_method_id' ?? null),
            'user_payment_id'   => $paymentInfo->id,
            'payment_status_id' => 2,
            'reference_number'  => $model->reference_number,
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        return response()->json([
            'message' => 'Payment success',
            'data'    => [
                'payment' => $model,
                'paymentInfo' => $paymentInfo,
                'transaction' => $transaction,
            ],
        ]);
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
