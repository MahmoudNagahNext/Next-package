<?php 

namespace nextdev\nextdashboard\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use nextdev\nextdashboard\DTOs\AdminDTO;
use nextdev\nextdashboard\Models\Admin;

class AuthService
{
     public function login(array $credentials)
     {
          $admin = Admin::where('email', $credentials['email'])->first();
          
          // Verify password directly instead of using attempt
          if (!$admin || !Hash::check($credentials['password'], $admin->password)) {
              throw new \Exception("Invalid credentials");
          }

          // Generate token manually
          $token = hash('sha256', Str::random(60));

          // Save token in database
          $admin->api_token = $token;
          $admin->save();

          return $admin;
     }

     public function register(AdminDTO $adminDTO)
     {
          $admin = Admin::create([
               'name'=> $adminDTO->name,
               'email'=> $adminDTO->email,
               'password'=> Hash::make($adminDTO->password),
          ]);

          // Generate token manually
          $token = hash('sha256', Str::random(60));

          // Save token in database
          $admin->api_token = $token;
          $admin->save();
          
          return $admin;
     }
}