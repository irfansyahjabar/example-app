<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request)
    {
        if (! $request->expectsJson()) {
            // Jika URL mengandung 'admin', redirect ke login admin
            if ($request->is('admin/*')) {
                return route('admin.login.form');
            }
            // Jika URL mengandung 'penjual', redirect ke login penjual
            if ($request->is('penjual/*')) {
                return route('penjual.login.form');
            }

            // Default (jaga-jaga)
            return route('penjual.login.form');
        }
    }
}
