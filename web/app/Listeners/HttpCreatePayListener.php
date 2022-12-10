<?php

namespace App\Listeners;

use App\Behaviors\HomeRoleMiddlewares;

use Illuminate\Support\Facades\Http;

class HttpCreatePayListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->request->url() == env('PAYSTAR_CREATE_URL')) {
            if ($event->response->successful()) {
                // ...
            }
        }
    }
}
