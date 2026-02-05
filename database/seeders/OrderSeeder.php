<?php

namespace Database\Seeders;

use App\Enums\OrderStatus;
use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'status'=> OrderStatus::CREATED,
            'order_date' => '2026-01-05',
            'pizza_ids' => '1,3',
            'delivery_id' => 1
            ]);

        Order::create([
            'status'=> OrderStatus::CREATED,
            'order_date' => '2026-01-07',
            'pizza_ids' => '1,2',
            'delivery_id' => 2
            ]);

        Order::create([
            'status'=> OrderStatus::CREATED,
            'order_date' => '2026-01-08',
            'pizza_ids' => '1',
            'delivery_id' => 2
            ]);
    }
}
