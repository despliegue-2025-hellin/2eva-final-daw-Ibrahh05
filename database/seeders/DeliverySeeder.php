<?php

namespace Database\Seeders;

use App\Models\Delivery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Delivery::create([
            'name' => 'Alex',
            'phone' => '+34651478965'
        ]);

        Delivery::create([
            'name' => 'Trump',
            'phone' => '+34651478445'
        ]);

        Delivery::create([
            'name' => 'Maduro',
            'phone' => '+34651478888'
        ]);

    }
}
