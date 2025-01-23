<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'level_id' => 3,
            'kelas_id' => 12,
            'tanggal_lahir' => '1983-10-21',
            'agama' => 'Islam',
            'jenis_kelamin' => 'Laki Laki',
            'provinsi' => '070000',
            'kabupaten' => '070100',
            'kecamatan' => '070120',
            'nama_sekolah' => 'SMK SWASTA  NUR AZIZI TANJUNG MORAWA',
            'email_status' => 1,
            'user_image' => 'https://lh3.googleusercontent.com/a/ACg8ocJoGnlbjceCU4_oZuRu8vMLxDql7PlXsmdUhm3ryScqTq5WXw=s96-c',
            
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
