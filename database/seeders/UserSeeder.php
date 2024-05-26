<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'John', 'email' => 'jhonmy@gmail.com'],
            ['name' => 'John2' , 'email' => 'jhonmy2@gmail.com'],
        ];

        foreach ($users as $user)
        {
            User::create($user);
        }

        User::factory(50)->create();
    }
}
