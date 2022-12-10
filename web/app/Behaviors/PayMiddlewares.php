<?php

namespace App\Behaviors;

use App\Http\Middleware\HashHmacMiddleware;
use App\Http\Middleware\HttpCreatePayMiddleware;
use App\Http\Middleware\HttpPayStatusMiddleware;

class PayMiddlewares
{
    const HASH_ALGORITHM = 'sha512';

    public function get()
    {
        return [
            HashHmacMiddleware::class . ":" . self::HASH_ALGORITHM,
            HttpCreatePayMiddleware::class,
            HttpPayStatusMiddleware::class . ":" . env('PAYSTAR_PAYMENT_URL')
        ];
    }
}
