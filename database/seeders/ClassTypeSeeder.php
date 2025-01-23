<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassType;

class ClassTypeSeeder extends Seeder
{
    public function run()
    {
        ClassType::factory()->count(5)->create(); // Create 5 class types
    }
}
