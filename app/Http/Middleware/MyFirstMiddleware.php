<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class MyFirstMiddleware
{
    private $users;

    public function __construct(User $users)
    {
        $this->users = $users;
    }

    public function handle(Request $request, Closure $next, $role)
    {
        $response = $next($request); // resposta da requisição

        if ($this->users->count() > 5) {
            return $response;
        }

        dd("Há 9 usuários ou menos");
    }
}
