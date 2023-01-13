<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookDiaryController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [BookDiaryController::class, 'index'])->name('index');
Route::get('/lastmonth/{year}/{month}', [BookDiaryController::class, 'lastMonth']);
Route::get('/nextmonth/{year}/{month}', [BookDiaryController::class, 'nextMonth']);

Route::group(['middleware' => 'auth'], function(){
    Route::post('/registbook', [BookDiaryController::class, 'registBook']);
    Route::get('/showbook/{book_id}', [BookDiaryController::class, 'showBook']);
    Route::get('/updatebook/{book_id}', [BookDiaryController::class, 'goToUpdateBook']);
    Route::post('/updatebook/{book_id}', [BookDiaryController::class, 'updateBook']);
    Route::get('/deletebook/{book_id}', [BookDiaryController::class, 'deleteBook']);
    Route::get('/search', [BookDiaryController::class, 'search']);
    Route::get('/unreadlist', [BookDiaryController::class, 'showUnreadList']);
    Route::get('/deleteunreadbook/{unread_book_id}', [BookDiaryController::class, 'deleteUnreadBook']);
    Route::post('/createunreadbook', [BookDiaryController::class, 'createUnreadBook']);
    Route::get('/setting', [BookDiaryController::class, 'setting']);
    Route::post('/changesetting', [BookDiaryController::class, 'changeSetting']);
});

Route::get('/regist', [AuthController::class, 'goToRegist']);
Route::post('/regist', [AuthController::class, 'regist']);
Route::get('/thanks', [AuthController::class, 'thanks']);
Route::get('/userlogin', [AuthController::class, 'goToLogin']);
Route::post('/userlogin', [AuthController::class, 'login']);
Route::get('/userlogout', [AuthController::class, 'userLogout']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
