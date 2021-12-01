<?php
use App\Http\Controllers\Firebase\ContactController;
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
Route::get('/contacts',[ContactController::class,'index']);
Route::get('/add-contact',[ContactController::class,'create']);
Route::post('/add-contact',[ContactController::class,'store']);
Route::get('/contact/Edit-fields/{id}',[ContactController::class,'update_fields']);
Route::put('contact/update/{id}',[ContactController::class,'update']);
// Route::get('contact/delete/{id}',[ContactController::class,'delete']);//this is delete using get method 
Route::delete('contact/delete/{id}',[ContactController::class,'delete']);//this is delete using delete method 

Route::get('/', function () {
    return view('welcome');
});
