<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        // if (! $request->expectsJson()) {
        //     if ($request->is('penjual/*')) {
        //         return route('penjual.login.form');
        //     }

        //     if ($request->is('admin/*')) {
        //         return route('admin.login.form');
        //     }

        //     return route('login');
        // }
        if (! $request->expectsJson()) {
            return route('penjual.login.form');
        }
    }
}
