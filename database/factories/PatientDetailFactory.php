<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\PatientStatus;
use App\Models\SateliteHealthFacility;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PatientDetail>
 */
class PatientDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $patient = Patient::count();
        $satelite = SateliteHealthFacility::count();
        $worker = Worker::count();
        $status = PatientStatus::count();
        return [
            'patient_id' => fake()->unique()->numberBetween(1, $patient),
            'satelite_health_facility_id' => fake()->numberBetween(1, $satelite),
            'worker_id' => fake()->numberBetween(1, $worker),
            'no_regis' => fake()->unique()->numerify('##########'),
            'patient_status_id' => fake()->numberBetween(1, $status),
            'age' => fake()->numberBetween(3, 80),
            'weight' => fake()->numberBetween(10, 80),
            'height' => fake()->numberBetween(40, 200),
        ];
    }
}
