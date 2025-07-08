<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SyLoginController;
use App\Http\Controllers\User\DashboardUser;
use App\Http\Controllers\User\Document\DocumentController;
use App\Http\Controllers\User\Document\SyDocumentController;
use App\Http\Controllers\User\Berkas\BerkasController;
use App\Http\Controllers\User\Berkas\SyBerkasController;


//Login
Route::get('/', [LoginController::class, 'loginPage'])->name('page.login');
Route::post('/', [SyLoginController::class, 'loginSy'])->name('page.login.sy');
Route::post('/User/Logout', [SyLoginController::class, 'logout'])->name('page.logout.sy');
// end login

//dashboard
Route::get('/User/Dashboard',[DashboardUser::class,"index"])->name("user.page.dashboard");
// end dashboard

// Document
Route::get('/User/Document',[DocumentController::class,"index"])->name("user.page.document");
//sy
Route::post("/User/Document/",[SyDocumentController::class,"tambahData"])->name("user.page.document.tambah");
Route::get('/User/Document/{parameter}',[DocumentController::class,"dataDocument"])->name("user.page.document.param");
Route::post('/User/Document/POST/Document',[SyDocumentController::class,"document"])->name("user.page.document.post.document");
Route::post('/User/Document/POST/DetailDocument',[SyDocumentController::class,"detail"])->name("user.page.document.post.detail");
// end sy
// end Document



// Berkas
Route::get('/User/Berkas',[BerkasController::class,"index"])->name("user.page.berkas");
//sy
Route::get('/User/Berkas/{parameter}',[BerkasController::class,"dataBerkas"])->name("user.page.berkas.param");
Route::post('/User/Berkas/POST/Berkas',[SyBerkasController::class,"Berkas"])->name("user.page.berkas.post.berkas");
Route::post('/User/Berkas/POST/DetailBerkas',[SyBerkasController::class,"detail"])->name("user.page.berkas.post.detail");
// end sy
// end Berkas