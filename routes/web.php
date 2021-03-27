<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
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
    return view('producto');
})->name('producto');
//Route::get('/', [ProductoController::class, 'index'])->name('producto.home');
Route::get('productoList', [ProductoController::class, 'index'])->name('productolist.index');   
Route::post('productotList', [ProductoController::class, 'create'])->name('productolist.crear');
Route::get('editar/{id}', [ProductoController::class, 'editar'])->name('productolist.editar');
Route::put('editar/{id}', [ProductoController::class, 'update'])->name('productolist.update');
Route::get('productoList/{id}', [ProductoController::class, 'destroy'])->name('productolist.destroy');