<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SoulLink>
 */
class SoulLinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_id = fake()->numberBetween(1, 50);
        $friend_id = null;

        while (true)
        {
            $tempFriendID = fake()->numberBetween(1, 50); 
            if($tempFriendID != $user_id)
            {
                $friend_id = $tempFriendID;
                break;
            }
        }

        return [
            'current_user_id' => $user_id,
            'friend_user_id' => $friend_id
        ];
    }
}
