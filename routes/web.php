<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactFormController;

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

Route::get('tests/test', [ TestController::class, 'index']);
// Route::resource('contacts', ContactFormController::class);

Route::prefix('contacts') //prefixをつけると以降のグループ内の各ルートに特定のURIをプレフィックスとして付けることができる。
->middleware(['auth']) //ログイン状態でしか表示されない
->controller(ContactFormController::Class)
->name('contacts.')//nameをつけると、グループ化されたすべてのルートの名前の前に’contacts’をつけられる。末尾に「.」が必要
->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');

});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
