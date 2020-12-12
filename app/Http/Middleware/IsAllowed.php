<?php

namespace App\Http\Middleware;

use Closure;

class IsAllowed
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
        if (env('APP_ENV') != 'local') {
            $user = auth()->user();
            $permission = $request->path();
            if ($request->route()) {
                $permission = $request->route()->getName();
            }
            abort_if(!$user->can($permission), 403, 'No Permission');
        }
        return $next($request);
    }
}
