<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\prestam;

class PrestamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        prestam::factory(500)->create();
    }
}
