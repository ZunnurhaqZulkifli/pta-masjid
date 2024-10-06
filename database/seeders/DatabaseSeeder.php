<?php

namespace Database\Seeders;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->call('db:wipe');
        $this->command->call('migrate:fresh');

        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
            PaymentStatusSeeder::class,
            PaymentTypeSeeder::class,
            PaymentMethodSeeder::class,
            ProjectSeeder::class,
            PaymentSeeder::class,
            TransactionSeeder::class, 
        ]);
    }
}
