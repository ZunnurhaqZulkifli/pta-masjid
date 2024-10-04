<?php

namespace Database\Seeders;

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
            PaymentSeeder::class,
            // ProjectSeeder::class,
            // TransactionSeeder::class, 
        ]);

        User::factory(5)->create();
    }
}
