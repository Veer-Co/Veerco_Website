<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('user/address', [DashboardController::class, 'showAddressPage'])->name('user.address');
    Route::get('user/add-address', [DashboardController::class, 'showAddAddressPage'])->name('user.add-address');
    Route::get('user/user-details', [DashboardController::class, 'showUserDetails'])->name('user.user-details');

    Route::post('user/addAddress', [DashboardController::class, 'storeAddress'])->name('user.addAddress');
    Route::post('user/removeAddress', [DashboardController::class, 'removeAddress'])->name('user.removeAddress');
    Route::put('user/updateUser', [DashboardController::class, 'updateUserDetails'])->name('user.updateUser');
    Route::put('user/updatePassword', [DashboardController::class, 'updateOldPassword'])->name('user.updatePassword');
    Route::get('user/order', [DashboardController::class, 'orderIndex'])->name('user/order');
    Route::get('user/order-list/{orderid}', [DashboardController::class, 'orderList'])->name('user.order.{orderid}');
    // Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
    //             ->name('verification.notice');

    // Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    //             ->middleware(['signed', 'throttle:6,1'])
    //             ->name('verification.verify');

    // Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    //             ->middleware('throttle:6,1')
    //             ->name('verification.send');

    // Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
    //             ->name('password.confirm');

    // Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


    Route::post('addressMakeDefault', [CheckoutController::class, 'addressMakeDefault'])->name('addressMakeDefault');
    Route::post('completeOrder', [CheckoutController::class, 'completeOrder'])->name('completeOrder');
    Route::post('promocode-match', [MainController::class, 'promocodeMatch'])->name('promocode-match');
});
