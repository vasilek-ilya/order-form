<?php

namespace Database\Factories;

use App\Models\Tariff;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TariffFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tariff::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->numberBetween(1, 100000),
            'day_mask' => $this->faker->regexify('[0-1]{7}'),
        ];
    }
}
