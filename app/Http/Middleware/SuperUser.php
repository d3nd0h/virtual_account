<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SuperUser
{
    protected $user;

    public function __construct()
    {
        if (\Auth::check()) {
            $this->user = \Auth::user();
        } else {
            $this->user = NULL;
        }
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
        if ($this->user !== NULL and $this->user->username != 'admin') {
            return response('Unauthorized.', 401);
        }
        return $next($request);
    }
}
