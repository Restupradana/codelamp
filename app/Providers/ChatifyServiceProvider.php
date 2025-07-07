<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class ChatifyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (class_exists(\Chatify\Facades\ChatifyMessenger::class)) {
            Route::middleware(['web', 'auth'])
                ->group(function () {
                    \Chatify\Chatify::routes();
                });
        }
    }

    public function register()
    {
        //
    }
}
