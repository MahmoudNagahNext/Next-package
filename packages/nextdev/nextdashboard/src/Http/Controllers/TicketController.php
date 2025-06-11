<?php

namespace nextdev\nextdashboard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use nextdev\nextdashboard\DTOs\AdminDTO;
use nextdev\nextdashboard\Traits\ApiResponseTrait;
use nextdev\nextdashboard\Http\Requests\Ticket\TicketStoreRequest;
use nextdev\nextdashboard\Http\Requests\Ticket\TicketUpdateRequest;
use nextdev\nextdashboard\Http\Resources\AdminResource;
use nextdev\nextdashboard\Services\TicketService;

class TicketController extends Controller
{
    use ApiResponseTrait;

    public function __construct(
        protected TicketService $ticketService
    ){}

    // public function index()
    // {
    //     $admins = $this->adminService->paginate();
    //     return $this->paginatedCollectionResponse($admins,'Admins Paginated', [], AdminResource::class);
    // }

    public function store(Request $request)
    {
        try{
            $admin = $this->ticketService->create($request->all());
            return $this->createdResponse(AdminResource::make($admin));
        } catch(\Exception $e){
            return $this->handleException($e);
        }
    }

    // public function show(int $id)
    // {
    //     return $this->successResponse(AdminResource::make($this->adminService->find($id)));
    // }

    // public function update(AdminUpdateRequest $request,int $id)
    // {
    //     try{
    //         $this->adminService->update($request->validated(), $id);
    //         return $this->updatedResponse();
    //     } catch(\Exception $e){
    //         return $this->handleException($e);
    //     }
    // }

    // public function destroy(int $id)
    // {
    //     try{
    //         $this->adminService->delete($id);
    //         return $this->deletedResponse();
    //     } catch(\Exception $e){
    //         return $this->handleException($e);
    //     }
    // }
}