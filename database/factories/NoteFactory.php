<?php

namespace Database\Factories;

use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'user_id' => User::factory(),
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'recipient' => $this->faker->email,
            'send_date' => $this->faker->dateTimeBetween('now', '+10 days'),
            'is_published' => true,
            'heart_counter' => $this->faker->numberBetween(0, 20),
        ];
    }
}
