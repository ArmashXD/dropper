<?php

use App\Http\Controllers\{
    FileController,
    LinkController
};

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
    return view('welcome');
});

Route::get('/url', function(){

});

Route::post('files', [FileController::class, 'store'])->name('file.store');
Route::post('files/remove', [FileController::class, 'removeFile'])->name('file.remove');
Route::get('/{name}', LinkController::class)->name('url');

