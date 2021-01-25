<?php

namespace App\Http\Middleware;

use App\Models\CouncilMember;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class Admin
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
        $is_admin = CouncilMember::where('email',session()->get('email'))->first();
        if($is_admin){
            return $next($request);
        }
        else{
            return redirect('/');
        }
    }
}
