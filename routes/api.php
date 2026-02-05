<?php

use App\Http\Controllers\PizzaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hello', function () {
    return 'Bienvenid@ al examen de recuperación de laravel ;)';
});

Route::get('/pizza',[PizzaController::class, "getAllPizza"]);
Route::post('/createOrder',[PizzaController::class, "createOrder"]);
Route::get('/find/{id}', [PizzaController::class, "findOrder"]);
Route::get('/calcular-importe/{id}',[PizzaController::class, "calcularImporte"]);
Route::put('/update',[PizzaController::class, "updateStatus"]);

