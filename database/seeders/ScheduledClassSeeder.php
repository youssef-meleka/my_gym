<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ScheduledClass;

class ScheduledClassSeeder extends Seeder
{
    public function run()
    {
        ScheduledClass::factory()->count(20)->create(); // Create 20 scheduled classes
    }
}
