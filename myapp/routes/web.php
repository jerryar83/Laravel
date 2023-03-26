<?php

use App\Http\Controllers\EmpleadosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; 
use App\Http\Controllers\LlamadaController; 
use App\Http\Controllers\OperacionesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ArchivosFotograficosController;

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

//Route::get('/contact', function(){  return view('contac'); });

Route::get('/prueba', function () {
    // return view('welcome');
    return "Ruta de prueba"; 
});

Route::get('/saludo/{nombre}', function($nombre){
    return "Hola " . $nombre; 
});


Route::get('/saludo/{nombre}/{edad}', function($nombre, $edad){
    return "Hola " . $nombre . " tienes " . $edad . " años.";
});

Route::get('admin/post/example', array('as' => 'admin.home' , function(){
    $url = route('admin.home'); 
    return 'this url is' . $url; 
}));

//Route::get('/post', 'PostController@index'); 
// Route::resource('port', PostController::class);

Route::resource('/post', PostController::class);
Route::resource('/post', PostController::class) ->names(
   ['create' => 'post.create'] 
);
Route::get('/llamada', [LlamadaController::class, 'index']);
Route::get('/llamada/edit/{id}', [LlamadaController::class, 'edit']);
Route::get('/llamada/show/{nombre}/{edad}', [LlamadaController::class, 'showData']);
Route::get('/llamada/blades', [LlamadaController::class, 'blades']);



//Route::resource('/post/{id}', PostController::class);
//Route::resource('/post/{id}/edit', PostController::class); 

Route::get('post/contactPost', 'PostController@contact');
Route::get('post/showData','PostController@showData');

Route::get('/suma/{numero1}/{numero2}', [OperacionesController::class, 'suma']);
Route::get('/resta/{numero1}/{numero2}', [OperacionesController::class, 'resta']);
Route::get('/division/{numero1}/{numero2}', [OperacionesController::class, 'division']);
Route::get('/multiplicacion/{numero1}/{numero2}', [OperacionesController::class, 'multiplicacion']);
Route::get('/show/{ok}', [OperacionesController::class, 'show']);

//products

Route::get('/IndexProducts',[ProductsController::class,'index']); 
Route::get('/editProduct/{id}',[ProductsController::class,'edit']); 
Route::put('/updateProduct',[ProductsController::class,'update']); 
Route::get('/deleteProduct/{id}',[ProductsController::class,'eliminarProducto']); 
//empleados

Route::get('/listaEmpleados',[EmpleadosController::class,'index']);
Route::get('/editEmployee/{id}',[EmpleadosController::class,'edit']); 
Route::put('/updateEmployee',[EmpleadosController::class,'update']);
Route::get('/deleteEmployee/{id}',[EmpleadosController::class,'deleteEmployee']);
// employees

route:: get('/IndexEmployees',[EmployeesController::class,'index']);
//Archivos Fotograficos
Route::get('/IndexArchivoFotograficos',[ArchivosFotograficosController::class,'index']);
Route::post('/guardaArchivoFotograficos','App\Http\Controllers\ArchivosFotograficosController@store');
