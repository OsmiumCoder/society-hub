<?php

namespace Database\Factories;

use App\Models\University;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Society>
 */
class SocietyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'university_id' => University::factory(),
            'name' => $this->faker->company(),
            'description' => $this->faker->paragraphs(3, true),
            'email' => $this->faker->unique()->companyEmail(),

            'facebook_url' => $this->faker->optional()->url(),
            'instagram_handle' => $this->faker->optional()->userName(),
            'twitter_handle' => $this->faker->optional()->userName(),
            'discord_url' => $this->faker->optional()->url(),

            'meeting_schedule' => $this->faker->dayOfWeek() . ' at ' . $this->faker->time(),
            'meeting_location' => $this->faker->buildingNumber() . ' ' . $this->faker->streetName(),

            'founding_date' => $this->faker->dateTimeBetween('-10 years', 'now')->format('Y-m-d'),

            'is_active' => $this->faker->boolean(80),
            'is_official' => $this->faker->boolean(30),

            'category' => $this->faker->optional()->randomElement([
                'Academic', 'Arts', 'Cultural', 'Political',
                'Social', 'Sports', 'Technology', 'Volunteering'
            ]),

            'tags' => $this->faker->optional()->randomElements([
                'STEM', 'Debate', 'Music', 'Dance',
                'Theater', 'Programming', 'Engineering',
                'Leadership', 'Entrepreneurship'
            ], $this->faker->numberBetween(1, 5)),
        ];
    }

    public function university(University $university): static
    {
        return $this->state(fn (array $attributes) => [
            'university_id' => $university->id
        ]);
    }
}
