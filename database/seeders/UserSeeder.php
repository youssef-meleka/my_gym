<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\User\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(10)->create(); // Create 10 users
    }
}
