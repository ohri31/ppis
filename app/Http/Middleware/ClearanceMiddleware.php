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
// TEST REQUESTS
        if ($request->is('testrequests/create'))//kompanija
         {
            if (!Auth::user()->hasPermissionTo('CanSendRequestsForTesting'))
         {
                abort('401');
            }
         else {
                return $next($request);
            }
        }

        if ($request->is('testrequests'))//kompanija,tester,menadzment,testmngr
         {
            if (!Auth::user()->hasPermissionTo('CanManageRequestsForEquipmentAndTesting'))
         {
                abort('401');
            }
         else {
                return $next($request);
            }
        }


// EQUIPMENT
        if ($request->is('equipment/create'))//admin
         {
            if (!Auth::user()->hasPermissionTo('CanAddEquipment'))
         {
                abort('401');
            }
         else {
                return $next($request);
            }
        }


    if ($request->is('equipment/*/edit')) //admin
         {
            if (!Auth::user()->hasPermissionTo('CanAddEquipment')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) //admin
         {
            if (!Auth::user()->hasPermissionTo('CanAddEquipment')) {
                abort('401');
            }
         else
         {
                return $next($request);
            }
        }
//TEST REPORTS
        if ($request->is('testreports'))//If user is creating a post
        {
           if (!Auth::user()->hasPermissionTo('CanManageTestReports'))
        {
               abort('401');
           }
        else {
               return $next($request);
           }
       }

       if ($request->is('testreports/create'))//If user is creating a post
       {
          if (!Auth::user()->hasPermissionTo('CanCreateTestReports'))
       {
              abort('401');
          }
       else {
              return $next($request);
          }
      }

      if ($request->is('testreports/*/edit')) //If user is editing a post
         {
            if (!Auth::user()->hasPermissionTo('CanCreateTestReports')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('approvedreports')) //If user is editing a post
         {
            if (!Auth::user()->hasPermissionTo('CanApproveReports')) {
                abort('401');
            } else {
                return $next($request);
            }
        }


// TEST CASE
     if ($request->is('testcases')) //tester i testmngr
         {
            if (!Auth::user()->hasPermissionTo('CanManageTestCases')) {
                abort('401');
            } else {
                return $next($request);
            }
        }
        if ($request->is('testcases/create')) //tester i testmngr
        {
           if (!Auth::user()->hasPermissionTo('CanManageTestCases')) {
               abort('401');
           } else {
               return $next($request);
           }
       }
       if ($request->is('testcases/*/edit')) //tester i testmngr
       {
          if (!Auth::user()->hasPermissionTo('CanManageTestCases')) {
              abort('401');
          } else {
              return $next($request);
          }
      }


        return $next($request);
    }



}
