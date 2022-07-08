<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\DashboardController;
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
    
  
     
    Route::get('/journal', function () {
        return view('journal');
    })->name('journal');
});

// Journal Categories Controller
Route::post('/category/add', [CategoryController::class, 'store'])->name('store.category');

Route::get('/category', [CategoryController::class, 'index'])->name('index.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'update']);
Route::get('/softdelete/category/{id}', [CategoryController::class, 'destroy']);
 
// Journal Issues Controller
Route::post('/issues/add', [IssueController::class, 'store'])->name('store.issue');
Route::get('/issues', [IssueController::class, 'index'])->name('index.issue');
Route::get('/issue/edit/{id}', [IssueController::class, 'edit']);
Route::post('/issue/update/{id}', [IssueController::class, 'update']);
Route::get('/softdelete/issue/{id}', [IssueController::class, 'destroy']);

// Journal Submission Controller
Route::post('/submission/add', [SubmissionController::class, 'store'])->name('store.submission');
Route::get('/submission', [SubmissionController::class, 'index'])->name('index.submission');
Route::get('/submission/edit/{id}', [SubmissionController::class, 'edit']);
Route::post('/submission/update/{id}', [SubmissionController::class, 'update']);
Route::get('/softdelete/submission/{id}', [SubmissionController::class, 'destroy']);

// Dashboard Controller routes
Route::get('/dashboard', [DashboardController::class, 'showCount'])->name('dashboard');

// Homepage  Controller routes
Route::get('/', [HomePageController::class, 'create']);