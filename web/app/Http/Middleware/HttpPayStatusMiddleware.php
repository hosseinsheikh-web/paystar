<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HttpPayStatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($response, Closure $next, $payUrl)
    {
        if ($response->successful()) {
            $resp = Http::acceptJson()->withToken($response['data']['token'])
                ->post($payUrl)->json();

            return $next($resp);
        }

        return "...";
    }
}
