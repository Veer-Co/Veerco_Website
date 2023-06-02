<?php

use App\Http\Controllers\Adminauth\AuthenticatedSessionController;
use App\Http\Controllers\Adminauth\ConfirmablePasswordController;
use App\Http\Controllers\Adminauth\EmailVerificationNotificationController;
use App\Http\Controllers\Adminauth\EmailVerificationPromptController;
use App\Http\Controllers\Adminauth\NewPasswordController;
use App\Http\Controllers\Adminauth\PasswordResetLinkController;
use App\Http\Controllers\Adminauth\RegisteredUserController;
use App\Http\Controllers\Adminauth\VerifyEmailController;
use App\Http\Controllers\AdminCategory;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BulkProduct;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

Route::group(['middleware' => ['adminauth:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::post('category', [CategoryController::class, 'categoryStore'])->name('category');
    Route::post('category-delete', [CategoryController::class, 'categoryDelete'])->name('category-delete');
    Route::get('add-category', [CategoryController::class, 'addCategory'])->name('add-category');
    Route::get('category-list', [CategoryController::class, 'categoryList'])->name('category-list');
    Route::get('add-subcategory', [SubCategoryController::class, 'addSubCategory'])->name('add-subcategory');
    Route::post('post-subcategory', [SubCategoryController::class, 'postSubcategory'])->name('post-subcategory');
    Route::get('subcategory-list', [SubCategoryController::class, 'subCategoryList'])->name('subcategory-list');
    Route::post('subcategory-delete', [SubCategoryController::class, 'subCategoryDelete'])->name('subcategory-delete');
    Route::get('add-brand', [BrandController::class, 'addBrand'])->name('add-brand');
    Route::post('brand-add', [BrandController::class, 'brandAdd'])->name('brand-add');
    Route::get('brand-list', [BrandController::class, 'brandList'])->name('brand-list');
    Route::post('brand-delete', [BrandController::class, 'brandDelete'])->name('brand-delete');
    Route::get('add-product', [ProductController::class, 'addProduct'])->name('add-product');
    Route::post('add-products', [ProductController::class, 'addProducts'])->name('add-products');
    Route::post('update-products', [ProductController::class, 'updateProduct'])->name('update-products');
    Route::get('product-list', [ProductController::class, 'productList'])->name('product-list');
    Route::get('product/edit/{id}', [ProductController::class, 'productEdit'])->name('product.edit.{id}');
    Route::post('gallery/image/delete', [ProductController::class, 'galleryImageDelete'])->name('gallery.image.delete');
    Route::post('thumbnail/image/delete', [ProductController::class, 'thumbnailImageDelete'])->name('thumbnail.image.delete');
    Route::post('boughttogether/destroy', [ProductController::class, 'boughtTogetherDestroy'])->name('boughttogether.destroy');
    Route::post('relatedproduct/destroy', [ProductController::class, 'relatedProductDestroy'])->name('relatedproduct.destroy');
    Route::post('getSubcategory', [ProductController::class, 'getSubcategory'])->name('getSubcategory');
    Route::get('related-product', [ProductController::class, 'relatedProduct'])->name('related-product');
    Route::get('new-order', [OrderController::class, 'newOrder'])->name('new-order');
    Route::get('order-details/{order_id}', [OrderController::class, 'orderDetails'])->name('order-details.{order_id}');
    Route::post('placeOrder', [OrderController::class, 'placeOrder'])->name('placeOrder');
    Route::get('shipped-order', [OrderController::class, 'shippedOrder'])->name('shipped-order');
    Route::post('delivered', [OrderController::class, 'delivered'])->name('delivered');
    Route::get('delivered-order', [OrderController::class, 'deliveredOrder'])->name('delivered-order');
    Route::post('track-order', [OrderController::class, 'trackOrder'])->name('track.shipment');
    Route::get('product-tax', [ProductController::class, 'productTax'])->name('product-tax');
    Route::post('taxSetup', [ProductController::class, 'taxSetup'])->name('taxSetup');
    Route::post('taxCrush', [ProductController::class, 'taxCrush'])->name('taxCrush');
    Route::get('promocode', [ProductController::class, 'promocode'])->name('promocode');
    Route::post('related_products', [ProductController::class, 'related_products'])->name('related_products');
    Route::post('check_coupon', [ProductController::class, 'checkCoupon'])->name('check_coupon');
    Route::post('promocode/store', [ProductController::class, 'promocodeStore'])->name('promocode.store');
    Route::post('promocode/destroy', [ProductController::class, 'promocodeDestroy'])->name('promocode.destroy');

    //Bulk Product
    Route::get('bulk/product', [BulkProduct::class, 'create'])->name('bulk.product');
    Route::post('bulk/import/product', [BulkProduct::class, 'fileImport'])->name('bulk.import.product');
    Route::get('bulk/export/product', [BulkProduct::class, 'fileExport'])->name('bulk.export.product');
});





Route::get('auth/login', [AdminDashboard::class, 'login'])->name('auth/login');
Route::get('dashboard', [AdminDashboard::class, 'dashboard'])->name('dashboard');

