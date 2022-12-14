<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Illuminate\Auth\Middleware\CekLevel as Middleware;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        // if(in_array($request->user()->ceklevel, $levels)){
        // return $next($request);
        // }
        
        if(!auth()->check() || auth()->user()->email == 'admin@school.id'){
            return $next($request);
        }else if(!auth()->check() || auth()->user()->email == 'kepalasekolah@gmail.com'){
            return $next($request);
        } else {
            // abort(403);
            $request->session()->flash('error', 'Anda Tidak memiliki hak akses kehalaman ini');
        }
        
        

        return redirect('admin');
    }
    
}
