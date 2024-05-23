<?php

namespace Database\Seeders;

use App\Models\SoulLinksRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoulLinksRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SoulLinksRequest::factory(10)->create();
    }
}
