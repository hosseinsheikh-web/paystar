<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HashHmacMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($data, Closure $next, $algorithm)
    {
        hash_hmac(
            $algorithm,
            $this->makeHashData(
                [
                    'amount' => $data['order']->amount,
                    'order_id' => $data['order']->id,
                    'callback_url' => $data['callback']
                ]
            ),
            $data['key']
        );

        return $next($data);
    }

    /**
     * @return string
     */
    private function makeHashData($data): string
    {
        return implode('#', $data);
    }

}
