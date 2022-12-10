<?php

namespace App\Http\Controllers;

use App\Behaviors\PayMiddlewares;
use App\Http\Middleware\HashHmacMiddleware;
use App\Http\Middleware\HttpCreatePayMiddleware;
use App\Http\Middleware\HttpPayStatusMiddleware;
use App\Repositories\OrderAccountRepository;
use Illuminate\Pipeline\Pipeline;

class PayController extends Controller
{
    const HASH_ALGORITHM = 'sha512';

    public function pay()
    {
        try {
            $order = resolve(OrderAccountRepository::class)->getOrderWithCardNumber();
            // Chain of responsibility
            app(Pipeline::class)
                ->send([
                    'order' => $order,
                    'callback' => $this->getCallbackUrl(),
                    "key" => env('PAYSTAR_SEC_KEY')
                ])
                ->through(resolve(PayMiddlewares::class)->get())->then(
                    function () {
                        dd('');
                    }
                );
        } catch (\Exception $e) {
        }
    }

    /**
     * @return string
     */
    private function getCallbackUrl(): string
    {
        return env('APP_URL') . '/' . env('PAYSTAR_CALLBACK_URI');
    }
}
