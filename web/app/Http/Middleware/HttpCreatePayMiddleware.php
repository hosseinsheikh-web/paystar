<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HttpCreatePayMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($data, Closure $next)
    {
        $resp = Http::acceptJson()->withToken(env('PAYSTAR_TOKEN'))
            ->post(env('PAYSTAR_CREATE_URL'), [
                'amount' => $data['order']->amount,
                'order_id' => $data['order']->id,
                'callback_url' => $data['callback'],
                'sign' => $data['key']
            ])->json();

        return $next($resp);
    }
}
