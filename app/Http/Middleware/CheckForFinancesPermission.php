<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CheckForFinancesPermission
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
        if (Gate::denies('manageFinances')) {
            return redirect()->route('dashboard.start')->with('error', 'Você não está autorizado a utilizar este recurso.');
        }
        return $next($request);
    }
}
