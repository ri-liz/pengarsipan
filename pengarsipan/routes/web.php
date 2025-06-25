<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SyLoginController;
use App\Http\Controllers\User\DashboardUser;
use App\Http\Controllers\User\Document\DocumentController;

Route::get('/',[LoginController::class,"loginPage"])->name("page.login");
Route::post('/LoginSy',[SyLoginController::class,"loginSy"])->name("page.login.sy");

//dashboard
Route::get('/User/Dashboard',[DashboardUser::class,"index"])->name("user.page.dashboard");

Route::get('/User/Document',[DocumentController::class,"index"])->name("user.page.document");