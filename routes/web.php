<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;

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
    return view('auth.login');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/



Route::middleware(['auth', 'user-access:buyer'])->group(function () {

    Route::get('/buyer/home', [HomeController::class, 'buyerHome'])->name('home');
    Route::get('/buyer/profile', [BuyerController::class, 'edit_profile'])->name('buyer.profile');
    Route::post('/buyer/profile/post', [BuyerController::class, 'Update_profile'])->name('buyer.profile.update');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware('auth')->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    Route::get('/admin/buyer-list', [HomeController::class, 'buyer'])->name('admin.buyer-list');
    Route::get('/admin/seller-list', [HomeController::class, 'seller'])->name('admin.seller-list');
    //Category CRUD
    Route::get('/admin/category-list', [HomeController::class, 'categoryIndex'])->name('admin.category-list');
    Route::get('/admin/category-create', [HomeController::class, 'categoryCreate'])->name('admin.category-create');
    Route::post('/admin/category-store', [HomeController::class, 'categoryStore'])->name('admin.category-store');
    
    //SubCategory CRUD
    Route::get('/admin/subcategory-list', [SubCategoryController::class, 'index'])->name('admin.subcategory-list');
    Route::get('/admin/subcategory-create', [SubCategoryController::class, 'create'])->name('admin.subcategory-create');
    Route::post('/admin/subcategory-store', [SubCategoryController::class, 'store'])->name('admin.subcategory-store');
    
    //Brand CRUD
    Route::get('/admin/brand-list', [HomeController::class, 'brandIndex'])->name('admin.brand-list');
    Route::get('/admin/brand-create', [HomeController::class, 'brandCreate'])->name('admin.brand-create');
    Route::post('/admin/brand-store', [HomeController::class, 'brandStore'])->name('admin.brand-store');
    
    //Product CRUD
    Route::get('/admin/product-list', [HomeController::class, 'productIndex'])->name('admin.product-list');
    Route::get('/admin/product-create', [HomeController::class, 'productCreate'])->name('admin.product-create');
    Route::post('/admin/product-store', [HomeController::class, 'productStore'])->name('admin.product-store');
    Route::get('/admin/product-detail/{id}', [HomeController::class, 'productDetails'])->name('admin.product-details');
    
    Route::get('/admin/product/reject/{id}', [HomeController::class, 'productReject'])->name('admin.product-reject');
    Route::get('/admin/product/accept/{id}', [HomeController::class, 'productAccept'])->name('admin.product-accept');
    Route::get('/admin/product/pending/{id}', [HomeController::class, 'productPending'])->name('admin.product-pending');
    
    // Start Product Conditon CRUD
    Route::get('/admin/condition-list', [ProductController::class, 'condIndex'])->name('admin.condition-list');
    Route::get('/admin/condition-create', [ProductController::class, 'condCreate'])->name('admin.condition-create');
    Route::post('/admin/condition-store', [ProductController::class, 'condStore'])->name('admin.condition-store');
    Route::get('/admin/condition-edit/{id}', [ProductController::class, 'condEdit'])->name('admin.condition-edit');
    Route::post('/admin/condition-update/{id}', [ProductController::class, 'condUpdate'])->name('admin.condition-update');
    Route::get('/admin/condition/destroy/{id}', [ProductController::class, 'condDestroy'])->name('admin.condition-destroy');
    
    // Start Product Region CRUD
    Route::get('/admin/region-list', [ProductController::class, 'regionIndex'])->name('admin.region-list');
    Route::get('/admin/region-create', [ProductController::class, 'regionCreate'])->name('admin.region-create');
    Route::post('/admin/region-store', [ProductController::class, 'regionStore'])->name('admin.region-store');
    Route::get('/admin/region-edit/{id}', [ProductController::class, 'regionEdit'])->name('admin.region-edit');
    Route::post('/admin/region-update/{id}', [ProductController::class, 'regionUpdate'])->name('admin.region-update');
    Route::get('/admin/region/destroy/{id}', [ProductController::class, 'regionDestroy'])->name('admin.region-destroy');
    
    // Start Product Capacity CRUD
    Route::get('/admin/capacity-list', [ProductController::class, 'capacityIndex'])->name('admin.capacity-list');
    Route::get('/admin/capacity-create', [ProductController::class, 'capacityCreate'])->name('admin.capacity-create');
    Route::post('/admin/capacity-store', [ProductController::class, 'capacityStore'])->name('admin.capacity-store');
    Route::get('/admin/capacity-edit/{id}', [ProductController::class, 'capacityEdit'])->name('admin.capacity-edit');
    Route::post('/admin/capacity-update/{id}', [ProductController::class, 'capacityUpdate'])->name('admin.capacity-update');
    Route::get('/admin/capacity/destroy/{id}', [ProductController::class, 'capacityDestroy'])->name('admin.capacity-destroy');
    
    
     // Start Product Color CRUD
    Route::get('/admin/color-list', [ProductController::class, 'colorIndex'])->name('admin.color-list');
    Route::get('/admin/color-create', [ProductController::class, 'colorCreate'])->name('admin.color-create');
    Route::post('/admin/color-store', [ProductController::class, 'colorStore'])->name('admin.color-store');
    Route::get('/admin/color-edit/{id}', [ProductController::class, 'colorEdit'])->name('admin.color-edit');
    Route::post('/admin/color-update/{id}', [ProductController::class, 'colorUpdate'])->name('admin.color-update');
    Route::get('/admin/color/destroy/{id}', [ProductController::class, 'colorDestroy'])->name('admin.color-destroy');
    
    
    // Start Stock CRUD
    Route::get('/admin/stock-list', [ProductController::class, 'stockIndex'])->name('admin.stock-list');
    Route::get('/admin/stock-create', [ProductController::class, 'stockCreate'])->name('admin.stock-create');
    Route::post('/admin/stock-store', [ProductController::class, 'stockStore'])->name('admin.stock-store');
    Route::get('/admin/stock-edit/{id}', [ProductController::class, 'stockEdit'])->name('admin.stock-edit');
    Route::post('/admin/stock-update/{id}', [ProductController::class, 'stockUpdate'])->name('admin.stock-update');
    Route::get('/admin/stock/destroy/{id}', [ProductController::class, 'stockDestroy'])->name('admin.stock-destroy');
    
    
    // Start Currency CRUD
    Route::get('/admin/currency-list', [ProductController::class, 'currencyIndex'])->name('admin.currency-list');
    Route::get('/admin/currency-create', [ProductController::class, 'currencyCreate'])->name('admin.currency-create');
    Route::post('/admin/currency-store', [ProductController::class, 'currencyStore'])->name('admin.currency-store');
    Route::get('/admin/currency-edit/{id}', [ProductController::class, 'currencyEdit'])->name('admin.currency-edit');
    Route::post('/admin/currency-update/{id}', [ProductController::class, 'currencyUpdate'])->name('admin.currency-update');
    Route::get('/admin/currency/destroy/{id}', [ProductController::class, 'currencyDestroy'])->name('admin.currency-destroy');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:seller'])->group(function () {

    Route::get('/seller/home', [HomeController::class, 'sellerHome'])->name('seller.home');
    Route::get('/seller/profile', [SellerController::class, 'edit_profile'])->name('seller.profile');
    Route::post('/seller/profile/post', [SellerController::class, 'Update_profile'])->name('seller.profile.update');
});


