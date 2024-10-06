<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::find(fake()->numberBetween(1, 200));
        $date = fake()->dateTimeBetween('-3 year', 'now');
        
        return [
            'payment_type_id'  => fake()->numberBetween(1, 5),
            'user_id'          => $user->id,
            'name'             => $user->name,
            'amount'           => fake()->randomFloat(2, 1, 10000),
            'reference_number' => 'REF-' . fake()->unique()->numerify('######') . '-PAY',
            'created_at'       => $date,
            'updated_at'       => $date,
        ];
    }
}
