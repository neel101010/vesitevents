<?php


use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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



//Route for main pages and user
Route::get('/', [UserController::class,'mainPage']);

Route::get('society/{name}',[UserController::class,'societyPage']);

Route::get('reset', [UserController::class,'passwordResetPage']);

Route::post('reset/check', [UserController::class ,'passwordReset']);

Route::get('newpassword/{email}',[UserController::class,'newPasswordPage'])->name('new_password');

Route::post('newpassword/check/{id}',[UserController::class,'newPassword'])->name('new_password_check');

Route::get('personaldetails',[UserController::class,'personalDetailPage']);

Route::post('personaldetails/add',[UserController::class,'personalDetailAdd']);

Route::get('classdetails',[UserController::class,'classDetailPage']);

Route::post('classdetails/add',[UserController::class,'classDetailAdd']);

Route::get('user',[UserController::class,'userProfilePage']);


//Register

Route::get('register',[RegisterController::class,'registerPage'])->name('register');

Route::post('register',[RegisterController::class,'register'])->name('register_check');

Route::get('verify/{token}',[RegisterController::class,'verifyUser']);


//Login
Route::get('login', [LoginController::class,'loginPage'])->name('login');

Route::post("login",[LoginController::class ,"authenticate"])->name('login_check');

////Google Login
//Route::get('login',  [LoginController::class, 'redirectToProvider']);

Route::get('login/google', [LoginController::class, 'redirectToProvider']);

Route::get("login/google/done",[LoginController::class,'handleProviderCallback']);

Route::get('logout',[LoginController::class,'logout']);


//Events

Route::get('addevent/aboutevent',[EventController::class,'aboutEvent'])->middleware('auth','admin');

Route::post('addevent/aboutevent/add', [EventController::class,'aboutEventAdd'])->middleware('auth','admin');

Route::get('addevent/aboutguest',[EventController::class,'aboutGuest'])->middleware('auth','admin');

Route::post('addevent/aboutguest/add',[EventController::class, 'aboutGuestAdd'])->middleware('auth','admin');

Route::get('addevent/aboutguest/addexisting',[EventController::class, 'aboutGuestAddExisting'])->middleware('auth','admin');

Route::get("/addevent/aboutsponsor" , [EventController::class , 'aboutSponsor']);

Route::post("/addevent/addsponsor/add" , [EventController::class , 'aboutSponsorAdd']);

Route::get('addevent/add',[EventController::class,'addEventComplete'])->middleware('auth','admin');

Route::get('event/{id}',[EventController::class, 'eventPage'])->middleware('auth')->name('event_page');


Route::get('event/register/{id}',[EventController::class,'registerAdd'])->middleware('auth');


// User profile route

Route::get("user/profile" , [UserController::class , 'userProfilePage'])->middleware('auth');

Route::post('user/profile/personaldetails', [UserController::class , 'userPersonalEdit'])->middleware('auth');

Route::post("user/profile/classdetails" , [UserController::class , 'userClassEdit'])->middleware('auth');

Route::post("user/profile/societydetails" , [UserController::class , 'userSocietyEdit'])->middleware('auth');





// Update profile
// /user/{email}/profile/personalDetails
// /user/{email}/profile/classdetails
// /user/{email}/profile/societydetails



/*Ignore this route*/
Route::get('/insertsociety',[\App\Http\Controllers\SocietyInserter::class,'insert']);

Route::get('msg',[EventController::class,'aboutGuestAddExisting']);
