<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        User::factory()->create([
            'id' => 1,
            'name' => 'Hossein Sheikh',
            'password' => bcrypt('12345678'),
            'email' => 'hosseinsheikh.web@gmail.com',
            'email_verified_at' => now(),
        ]);
    }
}
