<?php

namespace App\Http\Controllers;

use App\Repositories\OrderAccountRepository;

class CheckOutController extends Controller
{
    public function checkout()
    {
        try {
            $order = resolve(OrderAccountRepository::class)->getOrderWithCardNumber();

            return view('checkout', compact('order'));
        } catch (\Exception $e) {
            // ...
        }
    }

}
