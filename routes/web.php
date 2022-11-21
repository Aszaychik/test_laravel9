<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;

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

Route::get('/asz', function () {
    return "AsZaychik";
});

Route::redirect('/github', '/asz');

Route::fallback(function(){
    return '404';
});



Route::view('hello', 'hello', ['name' => 'AsZaychik']);

Route::get('/hello-again', function ()
{
    return view('hello', ['name' => 'AsZaychik']);
});
Route::get('/hello-world', function ()
{
    return view('hello.world', ['name' => 'AsZaychik']);
});

Route::get('/products/{id}', function ($productId)
{
    return "Product $productId";
});

Route::get('/products/{id}/items/{item}', function ($productId, $itemId)
{
    return "Product $productId, Item $itemId";
});

Route::get('/categories/{id}', function ($categoryId)
{
    return "Category $categoryId";
})->where('id', '[0-9]');

Route::get('/users/{id?}', function ($userId = "404")
{
    return "User $userId";
});

Route::get("/conflict/as", function ()
{
    return "Conflict aszaychik";
});

Route::get("/conflict/{name}", function (string $name)
{
    return "Conflict $name";
});

