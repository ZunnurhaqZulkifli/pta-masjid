<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'             => $this->faker->name,
            'reason'           => $this->faker->sentence,
            'amount'           => $this->faker->randomFloat(2, 1, 10000),
            'reference_number' => 'REF-' . $this->faker->unique()->numerify('######') . '-PAY',
            'user_id'          => $this->faker->numberBetween(1, 200),
            'payment_id'       => $this->faker->numberBetween(1, 200),
            'payment_type_id'  => $this->faker->numberBetween(1, 5),
            'payment_status_id'=> $this->faker->numberBetween(1, 5),
            'project_id'       => $this->faker->numberBetween(1, 200),
            'created_at'       => $this->faker->dateTimeBetween('-3 year', 'now'),
            'updated_at'       => $this->faker->dateTimeBetween('-3 year', 'now'),
        ];
    }
}
