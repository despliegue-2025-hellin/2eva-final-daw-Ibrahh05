<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['delivery_id','order_date','pizza_ids'];
    protected $hidden = ['updated_at', 'created_at'];
    protected $casts = ['status' => OrderStatus::class];

    public function delivery(){
        return $this->belongsTo(Delivery::class);
    }

}
