<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Sumbangan',
            'Bayaran Zakat',
            'Bayaran Wakaf',
            'Khairat',
            'Kutipan Jumaat',
        ];

        foreach ($types as $type) {
            PaymentMethod::create([
                'name' => $type,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}