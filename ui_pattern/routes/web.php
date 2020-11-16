<?php

use App\Http\Controllers\CreateRecipeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RecipeListController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/recipe/create', [CreateRecipeController::class, 'create'])->name('create_recipe');
Route::post('/recipe/create', [CreateRecipeController::class, 'store'])->name('store_recipe');

Route::get('/recipe', [RecipeListController::class, 'show'])->name('recipe_list');

Route::get('/recipe/{id}', [RecipeController::class, 'show'])->name('recipe_detail');
Route::get('/recipe/edit/{id}', [RecipeController::class, 'form'])->name('recipe_edit');
Route::post('/recipe/edit/{id}', [RecipeController::class, 'update'])->name('update_recipe');
