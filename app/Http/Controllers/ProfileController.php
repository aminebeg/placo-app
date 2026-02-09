<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', \Illuminate\Validation\Rule::unique('users')->ignore($request->user()->id)],
            'password' => ['nullable', 'confirmed', \Illuminate\Validation\Rules\Password::defaults()],
        ], [
            'phone.required' => __('Votre numéro de téléphone est obligatoire pour que notre équipe puisse vous appeler.'),
        ]);

        $user = $request->user();

        $user->fill([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'company' => $validated['company'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
        ]);

        if ($request->filled('password')) {
            $user->password = \Illuminate\Support\Facades\Hash::make($validated['password']);
        }

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', __('Profil mis à jour avec succès.'));
    }
}
