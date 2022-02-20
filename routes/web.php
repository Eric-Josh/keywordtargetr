<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KeywordController;
use App\Http\Controllers\InstallerController;
use App\Models\Languages;
use App\Models\Country;
use App\Models\TwitterLanguage;

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
    $languages = Languages::all();
    $countries = Country::all();
    $twitLangs = TwitterLanguage::all();
    
    return view('home', compact('languages','countries','twitLangs'));
});

Route::get('/search', [KeywordController::class, 'index'])->name('search');
Route::post('/search/post', [KeywordController::class, 'search'])->name('keyword.search');
Route::get('/search/csv-export', [KeywordController::class, 'csvExport']);
Route::get('/search/xls-export', [KeywordController::class, 'excelExport']);
Route::get('lists', [KeywordController::class, 'showList'])->name('list.show');
Route::get('/search/list/store', [KeywordController::class, 'saveKeyword']);
Route::get('/list/store', [KeywordController::class, 'newList'])->name('list.store');
Route::post('/list/post', [KeywordController::class, 'newListPost'])->name('list.post');
Route::put('/list/put/{id}', [KeywordController::class, 'updateList'])->name('list.update');
Route::delete('/list/delete/{id}', [KeywordController::class, 'destroyList'])->name('list.delete');
Route::get('/list/keywords/{id}', [KeywordController::class, 'listKeyword'])->name('list.keyword');
Route::get('/install', [InstallerController::class, 'install'])->name('installer');
