<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Schedule;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentSchedule>
 */
class StudentScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => User::factory(),
            'schedule_id' => Schedule::factory(),
        ];
    }
}
