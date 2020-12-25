<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! \Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $this->formatUser($user, $user->createToken($request->device_name));
    }

    public function register(Request $request)
    {
        $validated = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'phone' => 'required|unique:users',
            'device_name' => 'required',
        ])->validate();

        $user = User::create([
            'name' => $validated['name'],
            'username' => User::makeSlug($validated['name']),
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'phone' => $validated['phone'],
        ]);

        return $this->formatUser($user, $user->createToken($validated['device_name']));
    }

    private function formatUser(User $user, $token)
    {
        return [
            'name' => $user->name,
            'api_token' => $token->plainTextToken,
            'email' => $user->email,
            'username' => $user->username,
            'picture' => $user->picture,
        ];
    }
}
