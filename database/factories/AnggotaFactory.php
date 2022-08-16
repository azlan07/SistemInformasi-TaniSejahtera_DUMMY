<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\anggota>
 */
class AnggotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nik' =>$this->faker->bothify('################'),
            'nama' =>$this->faker->name(),
            'jenis_kelamin' =>$this->faker->randomElement(['L','P']),
            'sawah_id'=>mt_rand(1,2),
            'alamat' =>$this->faker->address()
        ];
    }
}
