<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAccount;
use Illuminate\Database\Seeder;

class UserAccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('user_accounts')->delete();

        UserAccount::create([
            'user_id' => 1,
            'bank_name' => 'ملت',
            'card_number' => "6104-3375-2695-6618",
            'account_number' => '4739727213',
            'status' => true,
        ]);
    }
}
