<?php

namespace Database\Factories;

use DateInterval;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MeresAdat>
 */
class MeresAdatFactory extends Factory
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

        $veg = fake()->dateTime();
        $kezdes = fake()->dateTimeInInterval($veg, '-6 hours');

        return [
            'termeloberendezes' => $termelo,
            'meroberendezes' => $mero,
            'kezdes' => $kezdes,
            'veg' => $veg,
            'egyseg' => 'cm',
            'ertek' => fake()->randomFloat(3, 1, 2000)
        ];
    }
}
