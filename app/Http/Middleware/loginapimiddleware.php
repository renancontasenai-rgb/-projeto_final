<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\usuariotoken;
use Illuminate\Support\Facades\Hash;
use app\Models\usuario;
use carbon\Carbon;

class loginapimiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

    if(!$request->has('token')&& !$request->has('usuario_id')){
    $token = usuariotoken::where('usuario_id', $request->usuario_id)
    ->where('token', $request->token)
    ->where('valido_ate', '>', carbon::now())
    ->first();
    }  

        return $next($request);
        return response()->json(['message' => 'Token não fornecido!', 'erro' => 's'], 200);
    }
}
