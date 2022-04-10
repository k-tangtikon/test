<?php

use App\Http\Controllers\checkController;
use Illuminate\Support\Facades\Route;
//================================================================
//login-----------------------------
Route::get('/login', [checkController::class,"loginView"]);
Route::get('/register', [checkController::class,"registerView"]);
Route::post('/do-login', [checkController::class,"checkLogin"]);
Route::post('/do-register', [checkController::class,"checkRegister"]);
Route::get('/index', [checkController::class,"index"]);
Route::get('/logout', [checkController::class,"logout"]);

//managetable-----------------------------------
use App\Http\Controllers\ProfileController;
Route::get('/index', [ProfileController::class, 'index']);
Route::post('/add-profile', [ProfileController::class, 'store']);
Route::post('/edit-profile', [ProfileController::class, 'edit']);
Route::post('/delete-profile', [ProfileController::class, 'destroy']);
//================================================================

//================================================================
//profile-------------------------------------------------------
use App\Http\Controllers\tikonController;
Route::get('/profile', [tikonController::class, 'select']);

Route::post('/edit-tikon', [tikonController::class, 'edit']);
Route::post('/add-tikon', [tikonController::class, 'insert']);

Route::post('/add-about', [tikonController::class, 'insert_about']);
Route::get('/about', [tikonController::class, 'select_about']);

Route::post('/add-edu', [tikonController::class, 'insert_edu']);
Route::get('/edu', [tikonController::class, 'select_edu']);

Route::post('/add-work', [tikonController::class, 'insert_work']);
Route::get('/work', [tikonController::class, 'select_work']);

Route::post('/add-skills', [tikonController::class, 'insert_skills']);
Route::get('/skills', [tikonController::class, 'select_skills']);

Route::post('/add-contact', [tikonController::class, 'insert_contact']);
Route::get('/contact', [tikonController::class, 'select_contact']);

//post=========================================================
use App\Http\Controllers\PostController;
Route::get('/post', [PostController::class, 'select']);
Route::post('/add-post', [PostController::class, 'insert']);
Route::post('/edit-post', [PostController::class, 'edit']);
Route::post('/delete-post', [PostController::class, 'delete']);

//login-----------------------------
Route::get('/pagelogin', [checkController::class,"loginProfile"]);
// Route::get('/register', [checkController::class,"registerView"]);
Route::post('/check-login-profile', [checkController::class,"checkLoginProfile"]);
// Route::post('/do-register', [checkController::class,"checkRegister"]);
// Route::get('/index', [checkController::class,"index"]);
Route::get('/logoutprofile', [checkController::class,"logoutProfile"]);
//================================================================

//myprofile-----------------------------
use App\Http\Controllers\MyprofileController;
Route::get('/myprofile', [MyprofileController::class, 'select']);
Route::get('/about_pub', [MyprofileController::class, 'select_about']);
Route::get('/edu_pub', [MyprofileController::class, 'select_edu']);
Route::get('/work_pub', [MyprofileController::class, 'select_work']);
Route::get('/skills_pub', [MyprofileController::class, 'select_skills']);
Route::get('/contact_pub', [MyprofileController::class, 'select_contact']);