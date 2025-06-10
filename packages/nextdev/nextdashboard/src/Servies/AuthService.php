<?php 

namespace nextdev\nextdashboard\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthService
{
   public function login(array $credentials)
   {
        if (!Auth::attempt($credentials)) {
            throw new \Exception("Invalid credentials");
        }

        $user = Auth::user();

        // Generate token manually
        $token = hash('sha256', Str::random(60));

        // Save token in database
        $user->api_token = $token;
        $user->save();

        return ['user' => $user, 'token' => $token];
   }

   public function register(array $userData)
   {
        $userData['api_token'] = hash('sha256', Str::random(60));
        $user = User::create($userData);

        return $user;
   }
}