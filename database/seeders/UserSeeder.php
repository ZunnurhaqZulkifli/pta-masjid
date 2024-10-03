<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "name"                  => 'Administrator',
                "username"              => 'admin',
                "phone_number"          => '0134065517',
                "email"                 => 'zunnurhaq123@gmail.com',
                "identification_number" => '010614010959',
                "email_verified_at"     => now(),
                "password"              => Hash::make('a'),
                'remember_token'        => Str::random(10),
                "created_at"            => now(),
            ],
        ];

        foreach($users as $user) {
            $user = User::create($user);
            $user->assignRole('admin');
        }
    }
}
