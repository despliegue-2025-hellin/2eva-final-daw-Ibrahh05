<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Services\PizzaService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PizzaController extends Controller
{
    protected $pizzaService;

    public function __construct(PizzaService $pizzaService)
    {
        $this->pizzaService =  $pizzaService;
    }

    public function getAllPizza(){
      return ApiResponse::success($this->pizzaService->getAllPizza(),"Operación finalizada");
    }

    public function createOrder(CreateOrderRequest $request){
        $values = $request->all();
        $order = $this->pizzaService->createOrder($values);
        return ApiResponse::success($order,'Order created',Response::HTTP_CREATED);
    }

    public function findOrder($id){
        //Llamar al service
        $order = $this->pizzaService->findOrder($id);
        //Responder la petición HTTP
        return ApiResponse::success($order, "Success");
    }

    public function calcularImporte($id){
        $total= $this->pizzaService->calcularImporte($id);
        
        return ApiResponse::success($total, "Success");
    }
    public function updateStatus(UpdateStatusRequest $request) {
        $updateOrder = $this->pizzaService->updateStatus($request);
        return ApiResponse::success($updateOrder, "Success");
    }


}
