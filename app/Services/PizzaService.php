<?php

namespace App\Services;

use App\Enums\OrderStatus;
use App\Exceptions\InvalidStatusException;
use App\Exceptions\NotFoundDeliveryException;
use App\Exceptions\NotFoundOrderException;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\Pizza;
use Illuminate\Http\Response;
use InvalidArgumentException;

class PizzaService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAllPizza(){
        return Pizza::orderBy('price','ASC')->get();
    }

    public function createOrder($values){
        //validacion
        $this->existDelivery($values['delivery_id']);

        //Inserto un nuevo pedido
        $order = new Order();
        
        //Lo relleno con los valores de la petición
        $order->fill($values);
        $order->status = OrderStatus::CREATED;
        
        //Insertamos el registro
        $order->save();
        return $order;
    }

    private function existDelivery($delivery_id){
        $delivery = Delivery::find($delivery_id);
        if(empty($delivery)){
            throw new NotFoundDeliveryException
                ("No existe un id delivery {$delivery_id}",Response::HTTP_NOT_FOUND);
        }
    }

    public function findOrder($id){
     
        //Recuperar el order.
        $order = Order::with('delivery')->find($id);

        if(empty($order)){
            throw new NotFoundOrderException("No existe pedido con id {$id}", Response::HTTP_NOT_FOUND);
        }

        return $order;
    }

    private function totalOrder($array){
        $total=0;
        foreach ($array as $id){
            $pizza= Pizza::find($id);
            $total+=$pizza->price;
        }
        return $total;
    }
    public function calcularImporte($order_id){
        $order= $this->findOrder($order_id);
        return $this->totalOrder(explode(',',$order->pizza_ids));
    }
    public function updateStatus($request) {
        $order = $this->findOrder($request->order_id);

        if ($order->status == OrderStatus::IN_PREPARATION || $order->status == OrderStatus::DELIVERED) {
            throw new InvalidStatusException("No se puede cambiar el estado del pedido {$order->id}", Response::HTTP_PRECONDITION_FAILED);
        }
        $order->status = $request->status;
        $order->save();
        return $order;
    }
}
