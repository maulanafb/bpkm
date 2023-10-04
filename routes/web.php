<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\MosqueAdministratorProfileController;
use App\Http\Controllers\MosqueConditionController;
use App\Http\Controllers\MosqueProfileController;
use App\Http\Controllers\MosqueController;
use App\Http\Controllers\MosqueDocumentController;
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
Route::get('/test', [TestingController::class, 'index'])->name('test');

Route::get('/dashboard-profile', [MosqueProfileController::class, 'index'])->name('mosque-profile.index');
Route::post('/mosque-profile', [MosqueProfileController::class, 'store'])->name('mosque-profile-store');
Route::get('/mosque-profile', [MosqueProfileController::class, 'show'])->name('mosque-profile.show');
Route::post('/mosque-profile-update/{id}', [MosqueProfileController::class, 'update'])->name('mosque-profile.update');


Route::resource('/mosque-document', MosqueDocumentController::class);
Route::get('/dashboard-document', [MosqueDocumentController::class, 'edit'])->name('mosque-document-edit');
Route::post('/dashboard-document/${id}', [MosqueDocumentController::class, 'update'])->name('dashboard-document-update');

Route::get('/mosque-land', [MosqueLandController::class, 'index'])->name('mosque-land');
Route::post('/mosque-land', [MosqueLandController::class, 'store'])->name('mosque-land-store');
Route::get('/dashboard-land-edit', [MosqueLandController::class, 'edit'])->name('mosque-land-edit');
Route::post('/dashboard-land-update/{id}', [MosqueLandController::class, 'update'])->name('mosque-land-update');

Route::get('/mosque-condition', [MosqueConditionController::class, 'index'])->name('mosque-condition');
Route::post('/mosque-condition', [MosqueConditionController::class, 'store'])->name('mosque-condition-store');
Route::get('/dashboard-condition-edit', [MosqueConditionController::class, 'edit'])->name('mosque-condition-edit');
Route::post('/dashboard-condition-update/{id}', [MosqueConditionController::class, 'update'])->name('dashboard-condition-update');

Route::get('/mosque-administrator', [MosqueAdministratorProfileController::class, 'index'])->name('mosque-administrator');
Route::post('/mosque-administrator', [MosqueAdministratorProfileController::class, 'store'])->name('mosque-administrator-store');
Route::get('/dashboard-administrator-edit', [MosqueAdministratorProfileController::class, 'edit'])->name('dashboard-administrator-edit');
Route::post('/dashboard-administrator-update/{id}', [MosqueAdministratorProfileController::class, 'update'])->name('dashboard-administrator-update');

Route::get('/change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('change-password');
Route::post('/change-password', [ChangePasswordController::class, 'changePassword']);


// Route::get('/mosque-document',[MosqueDocumentController::class,'index'])->name('mosque-document');
// Route::post('/mosque-document',[MosqueDocumentController::class,'store'])->name('mosque-document-store');

// Route::get('/mosque-document',[MosqueDocumentController::class,'index'])->name('mosque-document');




// Route::get('provinces', 'DependentDropdownController@provinces')->name('provinces');
// Route::get('cities', 'DependentDropdownController@cities')->name('cities');
// Route::get('districts', 'DependentDropdownController@districts')->name('districts');
// Route::get('villages', 'DependentDropdownController@villages')->name('villages');

Auth::routes();
