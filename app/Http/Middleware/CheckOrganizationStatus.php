<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckOrganizationStatus
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
        if(auth('seller')->user()->organization->status == 'inactive' or auth('seller')->user()->organization->status == 'expired'){
//           abort(404);
            return redirect()->route('seller.home');
        }
        return $next($request);
    }
}
