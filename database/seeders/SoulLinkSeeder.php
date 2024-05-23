<?php

namespace Database\Seeders;

use App\Models\SoulLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoulLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SoulLink::factory(10)->create();
    }
}
