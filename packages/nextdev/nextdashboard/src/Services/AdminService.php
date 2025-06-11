<?php 

namespace nextdev\nextdashboard\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use nextdev\nextdashboard\DTOs\AdminDTO;
use nextdev\nextdashboard\Models\Admin;

class AdminService
{
     public function paginate()
     {
         return Admin::query()->paginate(10);
     }
 
     public function create(AdminDTO $dto)
     { 
         return Admin::create([
          'name'=> $dto->name,
          'email'=> $dto->email,
          'password'=> Hash::make($dto->password),
         ]);
     }

     public function find(int $id)
     {
         return Admin::query()->find($id);
     }
 
     public function update(array $data, $id)
     {
         $user = Admin::query()->find($id);
         return $user->update($data);
     }
 
     public function delete(int $id)
     {
         $user = Admin::query()->find($id);
         return $user->delete();
     }
}