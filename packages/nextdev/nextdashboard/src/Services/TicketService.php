<?php 

namespace nextdev\nextdashboard\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use nextdev\nextdashboard\DTOs\AdminDTO;
use nextdev\nextdashboard\Models\Admin;

class TicketService
{
    // public function paginate()
    // {
    //     return Admin::query()->paginate(10);
    // }
 
    public function create(array $data)
    { 
        dd(Auth::id());
        // return Admin::create($data);
    }

    //  public function find(int $id)
    //  {
    //      return Admin::query()->find($id);
    //  }
 
    //  public function update(array $data, $id)
    //  {
    //      $user = Admin::query()->find($id);
    //      return $user->update($data);
    //  }
 
    //  public function delete(int $id)
    //  {
    //      $user = Admin::query()->find($id);
    //      return $user->delete();
    //  }
}