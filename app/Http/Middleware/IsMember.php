<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Contracts\Auth\Guard;

use Laracasts\Flash\Flash;

class IsMember
{
    /**
    * @var Guard
    */

    private $auth;


    public function __construct(Guard $auth){

        $this->auth = $auth;

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

        //dd($this->auth->user());

        if($this->auth->user()->type != 'admin')

        {

        $this->auth->logout();

        flash('Has sido desconectado por intentar acceder a un modulo solo para Administradores.','danger');

        return redirect()->to('/login');

        }

        return $next($request);
    }
}
