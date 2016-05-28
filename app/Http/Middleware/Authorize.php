<?php

namespace App\Http\Middleware;

use App\Permission;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class Authorize
{
    public function __construct(Guard $auth, Permission $permission)
    {
        $this->auth = $auth;
        $this->permission = $permission;
    }

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

        $permissions = $this->permission->all();

        $uri = $request->path();

        foreach($permissions as $permission)
        {
            if( ! $user->can($permission->name) && $permission->route == $uri)
            {
                abort(403);
            }
        }

        return $next($request);
    }
}
