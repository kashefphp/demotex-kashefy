<?php


use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\ProductCategory;
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

Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
    //    get list of product
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::post('/', [ProductController::class, 'store'])->name('store');

    //    add relation to model binding
    Route::bind('product', function ($id) {
        return Product::with(['detailss', 'category.details'])->findOrFail($id);
    });
    //    get details of product
    Route::get('/details/{product}', [DetailController::class, 'getByProduct'])->name('getByProduct');

});


//polymorphic details table
Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
//    get list of category
    Route::get('/', [ProductCategoryController::class, 'index'])->name('index');

//    add relation to model binding
    Route::bind('productCategory', function ($id) {
        return ProductCategory::with('details')->findOrFail($id);
    });
//    get details of productCategory
    Route::get('/details/{productCategory}', [DetailController::class, 'getByCategory'])->name('getByCategory');

});

// make details for products and categories
Route::post('detail/getKind', [DetailController::class, 'getKind'])->name('detail.getKind');
Route::resource('detail', DetailController::class);
