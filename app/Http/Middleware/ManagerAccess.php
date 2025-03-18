<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;
// use Illuminate\Support\Facades\Auth;

// class ManagerAccess
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Closure  $next
//      * @return mixed
//      */
//     public function handle(Request $request, Closure $next): Response
//     {
//          // Vérifier que l'utilisateur est connecté et a le rôle "manager"
//          if (Auth::check() && Auth::user()->role == 'manager') {
//             return $next($request);
//         }
        
//         // Sinon, on renvoie une erreur 403 (accès interdit) ou on redirige
//         abort(403, 'Accès refusé.');
//     }
// }
// <?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'manager') {
            return $next($request);
        }
        
        // Sinon, on renvoie une erreur 403 (accès interdit) ou on redirige
        abort(403, 'Accès refusé.');
}
}
