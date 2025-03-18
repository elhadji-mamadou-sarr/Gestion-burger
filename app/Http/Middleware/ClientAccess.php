<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class ClientAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifier que l'utilisateur est connecté et a le rôle "client"
        if (Auth::check() && Auth::user()->role === 'client') {
            return $next($request);
        }
        
        // Sinon, on renvoie une erreur 403 (accès interdit) ou on redirige
        abort(403, 'Accès refusé.');
    }
}
