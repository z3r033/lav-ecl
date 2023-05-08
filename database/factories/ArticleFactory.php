<?php

namespace Database\Factories;

use App\Models\TypeArticle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
     
    
      /*  return [
            'nom' => $this->faker->name,
            'description' => $this->faker->sentence,
            'quantite' => $this->faker->randomNumber(2),
            'prix' => $this->faker->randomFloat(2, 10, 100),
            'date_ajout' => $this->faker->dateTimeThisMonth(),
            'type_article_id' => \App\Models\TypeArticle::factory()->create()->id,
            'estDisponible' => $this->faker->boolean,
            'imageUrl' => $this->faker->imageUrl()
        ];*/
        $typeArticles = TypeArticle::all();
        $randomTypeArticle = $typeArticles->random();

        return [
            'nom' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'quantite' => $this->faker->numberBetween(0, 100),
            'prix' => $this->faker->randomFloat(2, 10, 500),
            'date_ajout' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'date_mise_a_jour' => now(),
            'type_article_id' => $randomTypeArticle->id,
            'estDisponible' => $this->faker->boolean(80),
            'imageUrl' => $this->faker->imageUrl(),
        ];
    }
}
