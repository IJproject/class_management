<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if(!$request->expectsJson()) {
            if($request->is('owner/*')) return route('owner.login');
            if($request->is('teacher/*')) return route('teacher.login');
            if($request->is('student/*')) return route('student.login');
        }
        else return route('home');      
    }
}
