<?php

namespace Database\Seeders;

use App\Models\UserOrder;
use Illuminate\Database\Seeder;

class UserOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('user_orders')->delete();

        UserOrder::create([
            'user_id' => 1,
            'details' => [
                'product_name' => 'پاورگرین 530 وات',
                'number' => 3,
                'price' => '1180000',
            ],
            'amount' => "2540000",
        ]);
    }
}
