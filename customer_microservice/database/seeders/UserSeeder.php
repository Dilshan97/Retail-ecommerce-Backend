<?php

namespace Database\Seeders;

use App\Models\UserLevel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Shop',
            'last_name' => 'Admin',
            'email' => 'shop_admin@gmail.com',
            'username' => 'staff',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('shop_admin'),
            'user_level_id' => UserLevel::where('scope', 'shop_admin')->first()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $this->command->info("Shp Admin User created");
    }
}
