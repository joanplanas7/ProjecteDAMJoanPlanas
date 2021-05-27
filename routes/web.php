<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppPropiaController;
use App\Http\Controllers\ValoracioController;
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

//pàgina inici
Route::get('/', function () {
    return view('welcome');
});

//login
Route::middleware(['auth:sanctum', 'verified'])->get('/menu', function () {
    return view('menu.menu');
})->name('menu');


//admnistrar usuaris
Route::resource('administrarUsuaris', 'App\Http\Controllers\UserController')->middleware('can:usuaris')->except(['show']);

//gestionar aplicacions externes
Route::resource('gestionarAppsExternes', 'App\Http\Controllers\GestioAplicacionsExternesController')->middleware('can:administrarApps')->except(['show']);

//apps externes
Route::resource('appsExternes', 'App\Http\Controllers\AppExternaController')->only(['index', 'show']);

//gestionar aplicacions propies
Route::resource('gestionarAppsPropies', 'App\Http\Controllers\GestioAppsPropiesController')->middleware('can:administrarApps')->except(['show']);

//apps pròpies
Route::resource('appsPropies', 'App\Http\Controllers\AppPropiaController')->only(['index', 'show']);
Route::get('apps/{id}/descarregar', [AppPropiaController::class, 'descarregar'])->name('app.descarregar');

//apps exclusives
Route::resource('appsExclusives', 'App\Http\Controllers\AppsExclusivesController')->only(['index', 'show'])->middleware('can:appsExclusives');

//valorar
Route::post('apps/{idApp}/valorar', [ValoracioController::class, 'guardar'])->name('valorar.guardar');