<?php

namespace App\Http\Middleware;

use App\Models\Seller\Seller;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class OnlineActiveSeller
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('seller')->check()) {
            $sellerId = Auth::guard('seller')->user()->id;
            $seller = Seller::find($sellerId);
            $LastSeen = Carbon::parse($seller->last_seen_at)->addMinutes(1)->format('Y-m-d H:i:s');
//            dd($LastSeen);
            if (!$seller->last_seen_at || Carbon::now() > $LastSeen){
                $now = Carbon::now();
                $seller->update(['last_seen_at' => $now]);
            }
        }
        return $next($request);
    }
}
