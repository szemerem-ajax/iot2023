<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\BerendezesFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EloMeresAdat>
 */
class EloMeresAdatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $factory = BerendezesFactory::new();
        $termelo = $factory->newModel($factory->definition());
        $mero = $factory->newModel($factory->definition());
        $mero->szulo = $termelo->id;

        return [
            'termeloberendezes' => $termelo,
            'meroberendezes' => $mero,
            'egyseg' => 'cm',
            'ertek' => fake()->randomFloat(3, 1, 2000)
        ];
    }
}
