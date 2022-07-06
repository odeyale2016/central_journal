<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\SubmissionController;
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
 


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
    
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/category/add', function () {
        return view('cat_all');
    })->name('cat_all');
     
    Route::get('/journal', function () {
        return view('journal');
    })->name('journal');
});

// Journal Categories Controller
Route::post('/category/add', [CategoryController::class, 'store'])->name('store.category');

Route::get('/category', [CategoryController::class, 'index'])->name('index.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'update']);
// Journal Issues Controller
Route::post('/issue/add', [IssueController::class, 'store'])->name('issue.add');

Route::get('/issue', [IssueController::class, 'index'])->name('index.issue');

// Journal Submission Controller
Route::post('/submission/add', [SubmissionController::class, 'store'])->name('store.submission');

Route::get('/submission', [SubmissionController::class, 'index'])->name('index.submission');