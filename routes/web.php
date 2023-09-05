<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LcrudControlle;
use App\Http\Controllers\LeaveController;

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

Route::get('/', function () {
    return redirect()->route('index');
});

Route::get('/index', [LcrudControlle::class, 'index'])->name('index');
Route::get('/show/{id}', [LcrudControlle::class, 'show'])->name('show');
Route::get('/create', [LcrudControlle::class, 'create'])->name('create');
Route::post('/store', [LcrudControlle::class, 'store'])->name('store');
Route::post('delete/{id}', [LcrudControlle::class, 'delete'])->name('delete');
Route::get('/edit/{id}', [LcrudControlle::class, 'edit'])->name('edit');
Route::patch('update/{id}', [LcrudControlle::class, 'update'])->name('update');
Route::get('/lindex/{id}', [LeaveController::class, 'index'])->name('lindex');
Route::get('/lcreate/{id}', [LeaveController::class, 'create'])->name('lcreate');
Route::post('/lstore', [LeaveController::class, 'store'])->name('lstore');
Route::post('ldelete/{id}', [LeaveController::class, 'delete'])->name('ldelete');
Route::get('/rcreate/{id}', [LeaveController::class, 'rcreate'])->name('rcreate');
Route::post('/rstore', [LeaveController::class, 'rstore'])->name('rstore');
Route::get('/search', [LcrudControlle::class, 'search'])->name('search');




Auth::routes();

Route::get('/home',function(){
    return redirect()->route('index');

} );
