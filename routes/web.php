<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KeywordController;
use App\Models\Languages;

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
    return view('home', compact('languages'));
});

Route::get('/search', [KeywordController::class, 'index'])->name('search');
Route::post('/search/post', [KeywordController::class, 'search'])->name('keyword.search');
Route::get('/search/csv-export', [KeywordController::class, 'csvExport']);
Route::get('/search/xls-export', [KeywordController::class, 'excelExport']);
Route::get('/search/list', [KeywordController::class, 'showList']);
Route::post('/search/list/store', [KeywordController::class, 'saveList']);
Route::get('/list/store', [KeywordController::class, 'newList']);
