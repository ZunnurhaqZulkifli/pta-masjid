<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $methods = [
            'Debit Card',
            'Online Banking',
            'Online Mpbile Banking',
            'E - Wallet',
            'Cash',
            'Over The Counter',
        ];

        foreach ($methods as $method) {
            PaymentMethod::create([
                'name' => $method,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
