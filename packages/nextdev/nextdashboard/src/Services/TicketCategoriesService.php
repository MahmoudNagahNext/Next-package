<?php 

namespace nextdev\nextdashboard\Services;

use nextdev\nextdashboard\Models\TicketCategory;

class TicketCategoriesService
{
     public function paginate()
     {
         return TicketCategory::query()->paginate(10);
     }
 
     public function create(array $data)
     { 
        return TicketCategory::create($data);
     }

     public function find(int $id)
     {
         return TicketCategory::query()->find($id);
     }
 
     public function update(array $data, $id)
     {
         $item = TicketCategory::query()->find($id);
         return $item->update($data);
     }
 
     public function delete(int $id)
     {
         $item = TicketCategory::query()->find($id);
         return $item->delete();
     }
}