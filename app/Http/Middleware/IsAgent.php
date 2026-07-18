<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class IsAgent
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
        $idemp = auth()->user()->IDemploye;
        $emp_role = DB::table('employe')->where('IDemploye',$idemp)->value('Admin');
        if(!$emp_role){
            return $next($request);
        }

        return redirect('home')->with('error',"You don't have admin access.");
    }
}
