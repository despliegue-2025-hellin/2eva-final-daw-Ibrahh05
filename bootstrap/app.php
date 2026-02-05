<?php

use App\Exceptions\InvalidStatusException;
use App\Exceptions\NotFoundDeliveryException;
use App\Exceptions\NotFoundOrderException;
use App\Helpers\ApiResponse;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
		 $exceptions->render(function (NotFoundDeliveryException $exception){
            return ApiResponse::error('',$exception->getMessage(), $exception->getCode());
        });
         $exceptions->render(function (NotFoundOrderException $exception){
            return ApiResponse::error('',$exception->getMessage(), $exception->getCode());
        });
        $exceptions->render(function (InvalidStatusException $exception){
            return ApiResponse::error('',$exception->getMessage(), $exception->getCode());
        });
    })->create();
