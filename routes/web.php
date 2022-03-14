<?php

use App\Http\Controllers\CompanyGen;
use App\Http\Controllers\MembershipGen;
use App\Http\Controllers\MembershipModuleGen;
use App\Http\Controllers\ModuleGen;
use App\Http\Controllers\UserModuleGen;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::group(['middleware' => ['auth']], function (){

    Route::get('/', 'HomeController@index');

    //GENISA
    Route::get('/maketemplate', 'MakeTemplateController@index')->name('maketemplate');
    Route::post('/maketemplatecontroller/toFile/', 'MakeTemplateController@toFile')->name('maketemplatecontroller.toFile');
    Route::post('/maketemplatecontroller/inicializar/', 'MakeTemplateController@inicializar')->name('maketemplatecontroller.inicializar');
    //------

    //sys_facturacion controllers
    Route::get('/membershipgen', [MembershipGen::class, 'index'])->name('membershipgen');
    Route::get('/modulegen', [ModuleGen::class, 'index'] )->name('modulegen');
    Route::get('/user_modulegen', [UserModuleGen::class, 'index' ] )->name('user_modulegen');
    Route::get('/membership_modulegen', [MembershipModuleGen::class, 'index' ] )->name('membership_modulegen');
    Route::get('/companygen', [CompanyGen::class, 'index'] )->name('companygen');

    //Validaciones request
  //  Route::resource('localidad', 'LocalidadController');

});

