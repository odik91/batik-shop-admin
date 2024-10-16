<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            if ($request->route()->named('admin.*')) {
                return route('admin.login');
            } else {
                return route('login');
            }
        }
        return null;
        // return $request->expectsJson() ? null : route('login');
    }
}