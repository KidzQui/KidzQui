<?php

/**
* File: StudentMiddleWare.php
* Path: App/Http/Middleware/StudentMiddleWare.php
* Purpose: The middleware to authenticate the Student(s) only to access the page
* Created On: 17-04-2017
* Last Modified On: 17-04-2017
* Author: MOHIT DADU
*/

namespace App\Http\Middleware;

use Closure;

class StudentMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->session()->has('users') || !($request->session()->get('type') == 3)) {
            return redirect('studentlogin');
        }

        return $next($request);
    }
}
