<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureProfileComplete
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user) {
            return $next($request);
        }

        if (blank($user->phone)) {
            if (! $request->routeIs('profile.edit', 'profile.update')) {
                return redirect()->route('profile.edit')
                    ->with('error', __('Veuillez completer votre profil avec un numero de telephone avant de continuer.'));
            }
        }

        return $next($request);
    }
}
