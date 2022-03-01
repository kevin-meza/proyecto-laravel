<?php

use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProductosController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/crear', function () {
//     return view('personas.create');
// });
// Route::get('/editar', function () {
//     return view('personas.edit');
// });
// Route::get('/persona', function () {
//     return view('personas.index');
// });
// Route::get('/persona', function () {
//     return view('personas.index');
// });
//acceder por clases
//accede al metodo create del persona controller
// Route::get('persona/create',[PersonaController::class,'create']);

//accede al controllador de persona para enviar a cada ruta/link

Route::get('/', function () {
        return view('auth.login');
    });

Route::resource('persona',PersonaController::class)->middleware("auth");
Route::resource('productos',ProductosController::class);

Auth::routes();

Route::get('/home',[Auth::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'],function(){

    Route::get('/',[PersonaController::class,'index'])->name('home');
});
