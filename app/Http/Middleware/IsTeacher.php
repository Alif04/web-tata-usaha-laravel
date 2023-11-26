<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isUser
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, \Closure $next)
    {
        if (Auth::check()) {
            return $next($request);
        }

        // kalau ganda history login bakal diarahin lagi ke login dengan pesanx`x`
        return redirect('/')->with('notAllowed', 'Silahkan login terlebih dahulu!');
    }
}
