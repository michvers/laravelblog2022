<?php

use Illuminate\Support\Facades\Auth;
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
    return view('index');
});

/*Route::get('/contact', function (){
    return view('contactformulier');
});*/
Route::get('/contactformulier', 'App\Http\Controllers\ContactController@create');
Route::post('/contactformulier','App\Http\Controllers\ContactController@store');
Route::get('/post/{post:slug}', 'App\Http\Controllers\AdminPostsController@post')->name('home.post');
Route::get('/category/{category:slug}', 'App\Http\Controllers\AdminPostsCategoriesController@category')->name('category.category');
Route::get('/shop', 'App\Http\Controllers\FrontendController@index')->name('shop');
Route::get('/products/brand/{id}', 'App\Http\Controllers\FrontendController@productsPerBrand')->name('productsPerBrandf');
Route::get('/addtocart/{id}', 'App\Http\Controllers\FrontendController@addToCart')->name('addToCart');
Route::get('/checkout', 'App\Http\Controllers\FrontendController@cart')->name('checkout');
Route::post('/checkout', 'App\Http\Controllers\FrontendController@updateQuantity')->name('quantity');
Route::get('/removeitem/{id}', 'App\Http\Controllers\FrontendController@removeItem')->name('removeItem');

//verify zorgt ervoor dat enkel een geverifieerde user wordt toegelaten
//aan de geautentiseerde routes
Auth::routes(['verify'=>true]);



/**BACKEND ROUTES**/


/*Route::middleware(['auth'])->group(function(){
    Route::resource('admin/users', App\Http\Controllers\AdminUsersController::class);
});*/

Route::group(['prefix'=>'admin', 'middleware'=>'admin'], function () {
    Route::resource('users', App\Http\Controllers\AdminUsersController::class);
    Route::get('users/restore/{user}', 'App\Http\Controllers\AdminUsersController@restore')->name('users.restore');
    Route::resource('categories', App\Http\Controllers\AdminPostsCategoriesController::class);
    Route::resource('comments', App\Http\Controllers\AdminPostCommentsController::class);
    Route::resource('replies', App\Http\Controllers\AdminRepliesController::class);
    Route::get('tags', 'App\Http\Controllers\AdminPostsTagsController@index')->name('posttags');
});

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'verified']], function (){

    Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('homebackend');
    Route::resource('photos', App\Http\Controllers\AdminPhotosController::class);
    Route::resource('media', App\Http\Controllers\AdminMediasController::class);
    Route::resource('posts', App\Http\Controllers\AdminPostsController::class);
    Route::resource('categories', App\Http\Controllers\AdminPostsCategoriesController::class);
    Route::resource('products', App\Http\Controllers\AdminProductsController::class);
    Route::resource('brands', App\Http\Controllers\AdminBrandsController::class);
    Route::resource('product/categories',App\Http\Controllers\AdminProductCategoryController::class);
    Route::get('products/brands/{id}', '\App\Http\Controllers\AdminProductsController@productsPerBrand')->name('admin.productsPerBrand');
    Route::get('/livewireindex', [\App\Http\Controllers\AdminPostsController::class, 'livewireindex']);
});
