<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userId = rand(1, 50);
        $folderName = User::where('id', $userId)->value('folder_name');

        return [
            'name' => 'MyFile',
            'folder_name' => $folderName,
            'description' => fake()->paragraph(3),
            'content' => fake()->paragraph(6),
            'views' => rand(150, 250),
            'likes' => rand(0, 150),
            'user_id' => $userId,
        ];
    }
}
