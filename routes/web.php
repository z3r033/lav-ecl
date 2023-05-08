<?php

use App\Http\Livewire\Articles;
use App\Http\Livewire\InterventionComponent;
use App\Http\Livewire\ReclamationComponent;
use App\Http\Livewire\Utilisateurs;
use App\Models\Article;
use App\Http\Livewire\TypeArticle;
use App\Models\Reclamation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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


Route::get('/articles', function () {
    //return Article::get();
    return Article::with("typeArticle")->paginate(5);

});
/*Route::get('/types', function () {
    //return Article::get();

    return TypeArticle::with("articles")->paginate(10);
});
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Utilisateurs', Utilisateurs::class)->name('users.index');



Route::get('/type-articles', TypeArticle::class)->name('type-articles');
Route::get('/articles', Articles::class)->name('articles');
Route::get('/reclamations', ReclamationComponent::class)->name('reclamations');
Route::get('/interventions', InterventionComponent::class)->name('interventions');
