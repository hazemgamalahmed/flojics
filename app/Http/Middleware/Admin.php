<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if($user->role == 'admin'){
            return $next($request);
        }else
        {
            return response()->json([
                'message' => 'NOT AUTHOURIZED'
            ]);
        }
    }
}
