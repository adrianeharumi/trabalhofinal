<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class StudentMiddleware
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
         $user = Auth::user();
         if($user->teacher){
           return response()->json(['Erro de Autorização']);
         }
         if($user->student){
             return $next($request);
         }
      }
    }
