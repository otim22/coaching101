<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    private $auth;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if session exists and if user has admin role
        $this->auth = auth()->user() ? (auth()->user()->role == 3) : false;

        // Pass request if auth is valid
        if($this->auth === true)
            return $next($request);

        // Redirect to login route with flash message
        return redirect()->route('login')->with('error', 'Access denied. Login to continue');
    }
}
