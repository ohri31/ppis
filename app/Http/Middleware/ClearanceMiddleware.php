<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClearanceMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        //If user is creating a post
        if($request->is('equipment/create')) {
            if (!Auth::user()->hasPermissionTo('CanAddEquipment')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        // If the user is editing the equipment item
        if($request->is('equipment/*/edit')) {
            if(!Auth::user()->hasPermissionTo('CanAddEquipment')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        //If user is deleting an equioment item
        if($request->isMethod('Delete')) {
            if(!Auth::user()->hasPermissionTo('CanAddEquipment')) {
                abort('401');
            }
        } else {
            return $next($request);  
        }

        // default return the next request in queue    
        return $next($request);
    }

}
