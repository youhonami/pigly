<?php

namespace Database\Factories;

use App\Models\WeightLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogFactory extends Factory
{
    protected $model = WeightLog::class;

    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'weight' => $this->faker->randomFloat(1, 40, 100), // 小数1桁、40.0〜100.0kg
            'calories' => $this->faker->numberBetween(1500, 3000),
            'exercise_time' => $this->faker->time(),
            'exercise_content' => $this->faker->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
