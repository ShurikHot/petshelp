<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();
        $issetAdmin = User::query()->where('email', 'admin@admin.com')->exists();
        if (!$issetAdmin) {
            User::factory()->adminAccount()->create();
        }
    }
}
