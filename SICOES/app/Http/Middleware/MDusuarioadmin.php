<?php

namespace siap\Http\Middleware;

use siap\User;
use siap\TipoUsuario;
use Closure;
use Illuminate\Support\Facades\Auth;

class MDusuarioadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle( $request, Closure $next)
    {
        
        $usuarioactual=\Auth::user();

        if ( ! Auth::check()) {
            abort(403, 'Acción no autorizada.');
        }

        
        if ($usuarioactual->idtipousuario!=1) {
            abort(403, 'No tiene suficientes privilegios para acceder a esta seccion');
        }
      
        return $next($request);
    
    }
}
