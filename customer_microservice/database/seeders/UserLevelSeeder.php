<?php

namespace Database\Seeders;

use App\Models\UserLevel;
use Illuminate\Database\Seeder;

class UserLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_levels = [
          ['scope' => 'shop_admin'],
          ['scope' => 'customer']
        ];

        foreach ($user_levels as $user_level) {
            UserLevel::create($user_level);
        }

        $this->command->info("User Levels created");
    }
}
