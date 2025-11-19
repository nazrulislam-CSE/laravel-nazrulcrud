<?php

use Illuminate\Support\Facades\Route;
use NazrulCrud\Crud\Http\Controllers\CrudController;

Route::group([
    'prefix' => config('crud.route_prefix', 'admin'),
    'middleware' => config('crud.middleware', ['web'])
], function () {
    Route::resource('items', CrudController::class)->names('crud');
});