<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\RegistIncomeController;

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

Auth::routes();

Route::group(['middleware' => 'auth'], function() {

Route::get('/', [DisplayController::class, 'index']);

Route::get('/fillter/{yearMonth}', [DisplayController::class, 'fillter'])->name('date.fillter');

Route::group(['middleware' => 'can:view,spending'], function() {
    
Route::get('/spend/{spending}/detail',[DisplayController::class, 'spendDetail'])->name('spend.detail');

Route::get('/edit_s_form/{spending}', [RegistrationController::class, 'editSpendForm'])->name('edit.spend');
Route::post('/edit_s_form/{spending}', [RegistrationController::class, 'editSpend']);

Route::post('/delete_s/{spending}', [RegistrationController::class, 'deleteSpend'])->name('delete.spend');

Route::post('/softdelete_s/{spending}', [RegistrationController::class, 'softdeleteSpend'])->name('softdelete.spend');

});


Route::group(['middleware' => 'can:view,income'], function() {

Route::get('/income/{income}/detail',[DisplayController::class, 'incomeDetail'])->name('income.detail');


Route::get('/edit_i_form/{income}', [RegistrationController::class, 'editIncomeForm'])->name('edit.income');
Route::post('/edit_i_form/{income}', [RegistrationController::class, 'editIncome']);

Route::post('/delete_i/{income}', [RegistrationController::class, 'deleteIncome'])->name('delete.income');

Route::post('/softdelete_i/{income}', [RegistrationController::class, 'softdeleteIncome'])->name('softdelete.income');

});

Route::get('/create_spend', [RegistrationController::class, 'createSpendForm'])->name('create.spend');
Route::post('/create_spend', [RegistrationController::class, 'createSpend']);

Route::get('/create_income', [RegistrationController::class, 'createIncomeForm'])->name('create.income');
Route::post('/create_income', [RegistrationController::class, 'createIncome']);

Route::get('/create_type_s', function(){ 
    return view('type_form');
})->name('create.type_s');
Route::post('/create_type_s', [RegistrationController::class, 'createType']);

Route::get('/create_type_i', function(){ 
    return view('type_i_form');
})->name('create.type_i');
Route::post('/create_type_i', [RegistIncomeController::class, 'createType']);

});