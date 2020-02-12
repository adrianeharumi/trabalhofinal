<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class TeacherMiddleware
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
            return $next($request);
          }
          if($user->student){
            return response()->json(['Erro de Autorização']);
          }
     }
}
