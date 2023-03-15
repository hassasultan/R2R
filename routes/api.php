<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerAuthController;
use App\Http\Controllers\BuyerAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SellerProductController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('admin')->controller(AdminAuthController::class)->group(function () {

    Route::post('login', 'login');
    // Route::post('register', 'register');
    Route::middleware(['auth', 'user-access:admin'])->group(function () {
        Route::post('logout', 'logout');
        Route::post('me', 'me');
    });
});

Route::prefix('seller')->controller(SellerAuthController::class)->group(function () {

    Route::post('login', 'login');
    Route::post('register', 'register');
    // Route::group(function () {
        Route::post('logout', 'logout');
        Route::post('me', 'me');

    // });
});
Route::prefix('seller')->group(function () {
    Route::get('get-profile',[SellerController::class,'view_profile']);
Route::get('brands-listing',[SellerController::class,'brandIndexApi']);
Route::get('category-listing',[SellerController::class,'categoryIndexApi']);
Route::get('subcategory-listing',[SubCategoryController::class,'ApiIndex']);
Route::get('condition-listing',[ProductController::class,'condApiIndex']);
Route::get('region-listing',[ProductController::class,'regionApiIndex']);
Route::get('capacity-listing',[ProductController::class,'capacityApiIndex']);
Route::get('product-listing',[SellerController::class,'productIndexSellerApi']);
Route::get('single-product',[ProductController::class,'singleProduct']);
Route::post('category-create',[SellerController::class,'categoryStoreApi']);
Route::post('product-create',[SellerController::class,'productStoreApi']);
Route::get('get-admin-products',[SellerProductController::class,'index']);
Route::post('seller-product-store',[SellerProductController::class,'store']);
Route::get('color-listing',[SellerProductController::class,'colorListing']);
Route::post('profile',[SellerController::class,'Update_profile']);

});
Route::prefix('buyer')->group(function () {
    Route::get('get-profile',[BuyerController::class,'view_profile']);
    //wishlist start
    Route::get('wish-list',[ProductController::class,'wishList']);
    Route::get('add-to/wish-list',[ProductController::class,'addTowishList']);
    Route::get('remove/wish-list',[ProductController::class,'deleteFromwishList']);
    //wishlist ednd

    //Cart start
    Route::get('cart-list',[ProductController::class,'cart']);
    Route::post('add-to-cart',[ProductController::class,'addToCart']);
    Route::post('update/cart',[ProductController::class,'updateCart']);
    Route::get('remove/product/cart',[ProductController::class,'deleteProductFromCart']);
    //Cart ednd
    Route::post('order/store',[OrderController::class,'store']);

});

Route::prefix('buyer')->controller(BuyerAuthController::class)->group(function () {

    Route::post('login', 'login');
    Route::post('register', 'register');
        Route::post('logout', 'logout');
        Route::post('me', 'me');
    // Route::middleware(['auth', 'user-access:buyer'])->group(function () {
    // });

});
Route::post('login',[BuyerAuthController::class,'login']);

Route::prefix('/buyer')->group(function () {
    Route::post('profile',[BuyerController::class,'Update_profile']);
    Route::get('islogin',[BuyerAuthController::class,'check_login']);
});
Route::get('all-products',[ProductController::class,'productIndexApi']);
Route::get('featured-products',[ProductController::class,'featuredProductIndexApi']);
Route::get('all/category-listing',[ProductController::class,'allCategories']);
Route::get('category-wise-products',[ProductController::class,'categoryWiseProductIndexApi']);
