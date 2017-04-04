<?php

/**
* File: student.blade.php
* Path: App/Http/Middleware/EvaluatorMiddleWare.php
* Purpose: The middleware to authenticate the evaluators only to access the page
* Created On: 04-04-2017
* Last Modified On: 04-04-2017
* Author: R S DEVI PRASAD
*/

namespace App\Http\Middleware;

use Closure;

class EvaluatorMiddleWare
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
        if (!$request->session()->has('users')) {
            return redirect('evaluatorlogin');
        }
        return $next($request);
    }
}
