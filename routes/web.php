<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ChecklistProgramController;
use App\Http\Controllers\DailyChecklistController;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\JumahFinancialController;
use App\Http\Controllers\MonthlyChecklistController;
use App\Http\Controllers\MonthlyFinancianReportController;
use App\Http\Controllers\MosqueAdministratorProfileController;
use App\Http\Controllers\MosqueCaretakerController;
use App\Http\Controllers\MosqueConditionController;
use App\Http\Controllers\MosqueProfileController;
use App\Http\Controllers\MosqueController;
use App\Http\Controllers\MosqueDocumentController;
use App\Http\Controllers\MosqueGalleryController;
use App\Http\Controllers\MosqueLandController;
use App\Http\Controllers\MosqueProgramController;
use App\Http\Controllers\MosqueStructureController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\WeeklyChecklistController;
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

Route::get('/masjid/{id}', [MosqueController::class, 'show'])->name('mosque.show');


Route::get('/test', [TestingController::class, 'index'])->name('test');

Route::get('/dashboard-profile', [MosqueProfileController::class, 'index'])->name('mosque-profile.index');
Route::post('/mosque-profile', [MosqueProfileController::class, 'store'])->name('mosque-profile.store');
Route::get('/mosque-profile', [MosqueProfileController::class, 'show'])->name('mosque-profile.show');
Route::put('/mosque-profile-update/{id}', [MosqueProfileController::class, 'update'])->name('mosque-profile.update');


Route::resource('/mosque-document', MosqueDocumentController::class);
Route::get('/dashboard-document', [MosqueDocumentController::class, 'edit'])->name('mosque-document-edit');
Route::post('/dashboard-document/${id}', [MosqueDocumentController::class, 'update'])->name('dashboard-document-update');

Route::get('/mosque-land', [MosqueLandController::class, 'index'])->name('mosque-land');
Route::post('/mosque-land', [MosqueLandController::class, 'store'])->name('mosque-land-store');
Route::get('/dashboard-land-edit', [MosqueLandController::class, 'edit'])->name('mosque-land-edit');
Route::post('/dashboard-land-update/{id}', [MosqueLandController::class, 'update'])->name('mosque-land-update');

Route::get('/mosque-program', [MosqueProgramController::class, 'index'])->name('mosque-program');
Route::post('/mosque-program', [MosqueProgramController::class, 'store'])->name('mosque-program-store');
Route::get('/dashboard-program-edit', [MosqueProgramController::class, 'edit'])->name('mosque-program-edit');
Route::post('/dashboard-program-update/{id}', [MosqueProgramController::class, 'update'])->name('mosque-program-update');

Route::get('/mosque-administrator', [MosqueAdministratorProfileController::class, 'index'])->name('mosque-administrator');
Route::post('/mosque-administrator', [MosqueAdministratorProfileController::class, 'store'])->name('mosque-administrator-store');
Route::get('/dashboard-administrator-edit', [MosqueAdministratorProfileController::class, 'edit'])->name('dashboard-administrator-edit');
Route::post('/dashboard-administrator-update/{id}', [MosqueAdministratorProfileController::class, 'update'])->name('dashboard-administrator-update');

Route::get('/dashboard-mosque-admin', [MosqueCaretakerController::class, 'index'])->name('caretaker.index');
Route::post('/pengurus-masjid', [MosqueCaretakerController::class, 'store'])->name('pengurus-masjid.store');
Route::delete('/pengurus-masjid/{id}', [MosqueCaretakerController::class, 'destroy'])->name('pengurus-masjid.destroy');
Route::put('/edit-pengurus-masjid/{id}', [MosqueCaretakerController::class, 'update'])->name('pengurus-masjid.update');

Route::get('/monthly-report', [MonthlyFinancianReportController::class, 'index'])->name('monthly-report.index');
Route::post('/monthly-report', [MonthlyFinancianReportController::class, 'store'])->name('monthly-report.store');
Route::put('/monthly-report-update/{id}', [MonthlyFinancianReportController::class, 'update'])->name('monthly-report.update');
Route::delete('monthly-report/{id}', [MonthlyFinancianReportController::class, 'destroy'])->name('monthly-report.destroy');


Route::get('/jumah-report', [JumahFinancialController::class, 'index'])->name('jumah-report.index');
Route::post('/jumah-report', [JumahFinancialController::class, 'store'])->name('jumah-report.store');
Route::put('/jumah-report-update/{id}', [JumahFinancialController::class, 'update'])->name('jumah-report.update');
Route::delete('/jumah-report/{id}', [JumahFinancialController::class, 'destroy'])->name('jumah-report.destroy');

Route::get('/mosque-gallery', [MosqueGalleryController::class, 'index'])->name('mosque-gallery.index');
Route::get('/mosque-gallery/{id}', [MosqueGalleryController::class, 'show'])->name('mosque-gallery.show');
Route::post('/mosque-gallery', [MosqueGalleryController::class, 'store'])->name('mosque-gallery.store');
Route::put('/mosque-gallery-update/{id}', [MosqueGalleryController::class, 'update'])->name('mosque-gallery.update');
Route::delete('/mosque-gallery/{id}', [MosqueGalleryController::class, 'destroy'])->name('mosque-gallery.destroy');

Route::get('/mosque-structure', [MosqueStructureController::class, 'index'])->name('mosque-structure.index');
Route::post('/mosque-structure', [MosqueStructureController::class, 'store'])->name('mosque-structure.store');
Route::put('/mosque-structure-update/{id}', [MosqueStructureController::class, 'update'])->name('mosque-structure.update');
Route::delete('/mosque-structure/{id}', [MosqueStructureController::class, 'destroy'])->name('mosque-structure.destroy');

Route::resource('daily-checklists', DailyChecklistController::class);
Route::resource('weekly-checklists', WeeklyChecklistController::class);
Route::resource('monthly-checklists', MonthlyChecklistController::class);

Route::get('/change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('change-password');
Route::post('/change-password', [ChangePasswordController::class, 'changePassword']);

Auth::routes();
