<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\PaymentStatus;
use App\Models\Project;
use App\Models\User;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payments = Payment::all();
        foreach ($payments as $payment) {

            $rand = rand(1, 5);
            $payment->transactions()->create([
                'name' => User::find($payment->user_id)->name,
                'reason' => Project::find($rand)->name,
                'amount' => $payment->amount,
                'reference_number' => $payment->reference_number,
                'user_id' => $payment->user_id,
                'payment_id' => $payment->id,
                'payment_type_id' => $payment->payment_type_id,
                'payment_status_id' => PaymentStatus::find($rand)->id, 
                'project_id' => Project::find($rand)->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
