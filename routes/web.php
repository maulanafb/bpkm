<?php

use App\Http\Controllers\MosqueAdministratorProfileController;
use App\Http\Controllers\MosqueConditionController;
use App\Http\Controllers\MosqueProfileController;
use App\Http\Controllers\MosqueController;
use App\Http\Controllers\MosqueLandController;
use App\Http\Controllers\TestingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test',[TestingController::class,'index'])->name('test');

Route::get('/mosque-profile',[MosqueProfileController::class,'index'])->name('mosque-profile');
Route::post('/mosque-profile',[MosqueProfileController::class,'store'])->name('mosque-profile-store');


Route::get('/mosque-land',[MosqueLandController::class,'index'])->name('mosque-land');
Route::post('/mosque-land',[MosqueLandController::class,'store'])->name('mosque-land-store');

Route::get('/mosque-condition',[MosqueConditionController::class,'index'])->name('mosque-condition');
Route::post('/mosque-condition',[MosqueConditionController::class,'store'])->name('mosque-condition-store');

Route::get('/mosque-administrator',[MosqueAdministratorProfileController::class,'index'])->name('mosque-administrator');
Route::post('/mosque-administrator',[MosqueAdministratorProfileController::class,'store'])->name('mosque-administrator-store');



Route::get('provinces', 'DependentDropdownController@provinces')->name('provinces');
Route::get('cities', 'DependentDropdownController@cities')->name('cities');
Route::get('districts', 'DependentDropdownController@districts')->name('districts');
Route::get('villages', 'DependentDropdownController@villages')->name('villages');


Auth::routes();