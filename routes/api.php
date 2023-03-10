<?php

use App\Http\Controllers\APIAuthKontroler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProizvodjacKontroler;
use App\Http\Controllers\ProizvodKontroler;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('proizvodjac', [ProizvodjacKontroler::class, 'store']);
    Route::delete('proizvodjac/{id}', [ProizvodjacKontroler::class, 'destroy']);
    Route::delete('proizvod/{id}', [ProizvodKontroler::class, 'destroy']);
    Route::post('logout_korisnika', [APIAuthKontroler::class, 'logoutKorisnika']);
});

Route::get('proizvodjac', [ProizvodjacKontroler::class, 'index']);
Route::get('proizvod', [ProizvodKontroler::class, 'index']);
Route::get('proizvod/{id}', [ProizvodKontroler::class, 'show']);
Route::post('registracija_korisnika', [APIAuthKontroler::class, 'registracijaKorisnika']);
Route::post('login_korisnika', [APIAuthKontroler::class, 'loginKorisnika']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
