<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Schedule;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AbsensiMatkul>
 */
class AbsensiMatkulFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'schedule_id' => Schedule::factory(),
            'student_id' => User::factory(),
            'kode_absensi' => $this->faker->randomElement(['A1', 'A2','A3','A4','A5','A6']),
            'tahun_akademik' => $this->faker->randomElement(['2020/2021','2021/2022','2022/2023']),
            'semester' => $this->faker->randomElement(['Ganjil','Genap']),
            'pertemuan' => $this->faker->randomElement(['1','2','3','4','5','6']),
            'status' => $this->faker->randomElement(['Hadir','Tidak Hadir']),
            'keterangan' => $this->faker->randomElement(['Tanpa Keterangan','Izin','Sakit']),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'nilai' => $this->faker->randomElement(['A','B','C','D','E']),
            'created_by' => $this->faker->randomElement(['1','2','3']),
            'updated_by' => $this->faker->randomElement(['1','2','3']),
        ];
    }
}
