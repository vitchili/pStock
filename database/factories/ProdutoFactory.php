<?php

namespace Database\Factories;

use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'cod_barras' => $this->faker->ean8(),
            'nome' => $this->faker->unique()->word(),
            'descricao' => $this->faker->text($maxNbChars = 20),
            'foto' => 'exemplo.jpeg',
            'quantidade' => $this->faker->randomDigit(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
