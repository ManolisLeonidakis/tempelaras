<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rateTypes = ['fixed', 'per_hour', 'per_square_meter'];
        $rateType = fake()->randomElement($rateTypes);

        return [
            'name' => fake()->randomElement([
                'Ταπετσαρίες',
                'Βαψίματα τοίχων',
                'Εγκατάσταση πλακιδίων',
                'Ηλεκτρικές εργασίες',
                'Υδραυλικές εργασίες',
                'Επισκευές σπιτιού',
                'Ανακαινίσεις μπάνιου',
                'Τοποθέτηση παρκέ',
                'Μονώσεις',
                'Εγκατάσταση κουφωμάτων',
            ]),
            'description' => fake()->optional(0.8)->paragraph(),
            'rate_type' => $rateType,
            'rate_amount' => $rateType === 'fixed' ? null : fake()->randomFloat(2, 10, 500),
            'rate_currency' => 'EUR',
        ];
    }
}
