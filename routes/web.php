<?php

use App\Http\Controllers\YourAwesomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $faker = app(Faker\Factory::class)->create();
    return view('home')->with('faker', $faker);
});

Route::post('/your-awesome-project/post-request', YourAwesomeController::class . '@postRequest');
Route::get('/your-awesome-project/get/{slug}', YourAwesomeController::class . '@getRequest');

