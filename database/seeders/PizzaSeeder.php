<?php

namespace Database\Seeders;

use App\Models\Pizza;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pizza::create([
            'name' => 'margarita',
            'price' => 10.50
        ]);

        $pizza = new Pizza();
        $pizza->name = "Funghi";
        $pizza->price = 11.00;
        $pizza->save();

        $pizza = new Pizza();
        $pizza->name = "Pepperoni";
        $pizza->price = 10.50;
        $pizza->save();
    }
}
