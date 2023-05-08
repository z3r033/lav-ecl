<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProprietesArticle>
 */
class ProprietesArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $article = Article::inRandomOrder()->first();

        return [
            'article_id' => $article->id,
            'nom_propriete' => $this->faker->word(),
            'valeur_propriete' => $this->faker->word(),
            'estObligatoire' => $this->faker->boolean()
        ];
    }
}
