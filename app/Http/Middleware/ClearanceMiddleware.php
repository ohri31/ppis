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
  /*      if (Auth::user()->hasPermissionTo('CanManageUsers')) //If user has this //permission
    {
            return $next($request);
        } */

        if ($request->is('testrequests/create'))//If user is creating a post
         {
            if (!Auth::user()->hasPermissionTo('CanSendRequestsForTesting'))
         {
                abort('401');
            }
         else {
                return $next($request);
            }
        }



        if ($request->is('equipment/create'))//If user is creating a post
         {
            if (!Auth::user()->hasPermissionTo('CanAddEquipment'))
         {
                abort('401');
            }
         else {
                return $next($request);
            }
        }


    if ($request->is('equipment/*/edit')) //If user is editing a post
         {
            if (!Auth::user()->hasPermissionTo('CanAddEquipment')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) //If user is deleting a post
         {
            if (!Auth::user()->hasPermissionTo('CanAddEquipment')) {
                abort('401');
            }
         else
         {
                return $next($request);
            }
        }

        return $next($request);
    }



}
