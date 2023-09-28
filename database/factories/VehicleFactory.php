<?php

namespace Database\Factories;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "vehicle_no_plate"=>$this->faker->regexify('[A-Za-z0-9]{6}'),
            "capacity"=>$this->faker->numberBetween(1000,100000),
            "status"=>'Available',
            "model"=>'Isuzu'
        ];
    }
}
