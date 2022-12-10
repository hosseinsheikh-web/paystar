<?php

namespace App\Repositories;

use App\Models\UserAccount;
use App\Models\UserOrder;

class OrderAccountRepository
{
    public function __construct(private UserOrder $userOrder, private UserAccount $userAccount) { }

    public function getOrderWithCardNumber()
    {
        return $this->userOrder->select('id', 'amount', 'details')
            ->addSelect([
                    'card_number' => $this->userAccount
                        ->select('card_number')
                        ->whereColumn('user_orders.user_id', 'user_accounts.user_id')
                        ->latest()
                        ->take(1)
                ]
            )->first();
    }
}
