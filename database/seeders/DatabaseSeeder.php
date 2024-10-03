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
            UserTypeSeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            // PaymentStatusSeeder::class,
            // PaymentTypeSeeder::class,
            // PaymentSeeder::class,
            // ProjectSeeder::class,
            // TransactionSeeder::class, 
        ]);

        User::factory(5)->create();
    }
}
