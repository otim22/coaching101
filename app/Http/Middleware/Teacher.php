<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Teacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if session exists and if user has teacher role
        $this->auth = auth()->user() ? (auth()->user()->role == 1 || auth()->user()->role == 2) : false;

        // Pass request if auth is valid
        if($this->auth === true)
            return $next($request);

        // Redirect to login route with flash message
        return redirect()->route('login')->with('error', 'Access denied. Login to continue');
    }
}
