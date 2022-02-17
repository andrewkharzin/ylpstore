<?php

use Illuminate\Support\Facades\Route;

use Andrewkharzin\Http\Controllers\AddressController;
use Andrewkharzin\Http\Controllers\AttributeController;
use Andrewkharzin\Http\Controllers\AttributeValueController;
use Andrewkharzin\Http\Controllers\ProductController;
use Andrewkharzin\Http\Controllers\SettingsController;
use Andrewkharzin\Http\Controllers\UserController;
use Andrewkharzin\Http\Controllers\TypeController;
use Andrewkharzin\Http\Controllers\OrderController;
use Andrewkharzin\Http\Controllers\OrderStatusController;
use Andrewkharzin\Http\Controllers\CategoryController;
use Andrewkharzin\Http\Controllers\CouponController;
use Andrewkharzin\Http\Controllers\AttachmentController;
use Andrewkharzin\Http\Controllers\ShippingController;
use Andrewkharzin\Http\Controllers\TaxController;
use Andrewkharzin\Enums\Permission;
use Andrewkharzin\Http\Controllers\ShopController;
use Andrewkharzin\Http\Controllers\TagController;
use Andrewkharzin\Http\Controllers\WithdrawController;

Route::post('/register', 'Andrewkharzin\Http\Controllers\UserController@register');
Route::post('/token', 'Andrewkharzin\Http\Controllers\UserController@token');
Route::post('/forget-password', 'Andrewkharzin\Http\Controllers\UserController@forgetPassword');
Route::post('/verify-forget-password-token', 'Andrewkharzin\Http\Controllers\UserController@verifyForgetPasswordToken');
Route::post('/reset-password', 'Andrewkharzin\Http\Controllers\UserController@resetPassword');
Route::post('/contact', 'Andrewkharzin\Http\Controllers\UserController@contactAdmin');
Route::post('/social-login-token', 'Andrewkharzin\Http\Controllers\UserController@socialLogin');

Route::apiResource('products', ProductController::class, [
    'only' => ['index', 'show']
]);
Route::apiResource('types', TypeController::class, [
    'only' => ['index', 'show']
]);
Route::apiResource('attachments', AttachmentController::class, [
    'only' => ['index', 'show']
]);
Route::apiResource('categories', CategoryController::class, [
    'only' => ['index', 'show']
]);
Route::apiResource('tags', TagController::class, [
    'only' => ['index', 'show']
]);

Route::get('fetch-parent-category', 'Andrewkharzin\Http\Controllers\CategoryController@fetchOnlyParent');

Route::apiResource('coupons', CouponController::class, [
    'only' => ['index', 'show']
]);

Route::post('coupons/verify', 'Andrewkharzin\Http\Controllers\CouponController@verify');


Route::apiResource('order_status', OrderStatusController::class, [
    'only' => ['index', 'show']
]);

Route::apiResource('attributes', AttributeController::class, [
    'only' => ['index', 'show']
]);

Route::apiResource('all-shop', ShopController::class, [
    'only' => ['index', 'show']
]);

Route::apiResource('attribute-values', AttributeValueController::class, [
    'only' => ['index', 'show']
]);

Route::apiResource('settings', SettingsController::class, [
    'only' => ['index']
]);


Route::group(['middleware' => ['can:' . Permission::CUSTOMER, 'auth:sanctum']], function () {
    Route::post('/logout', 'Andrewkharzin\Http\Controllers\UserController@logout');
    Route::apiResource('orders', OrderController::class, [
        'only' => ['index', 'show', 'store']
    ]);
    Route::get('orders/tracking_number/{tracking_number}', 'Andrewkharzin\Http\Controllers\OrderController@findByTrackingNumber');
    Route::apiResource('attachments', AttachmentController::class, [
        'only' => ['store', 'update', 'destroy']
    ]);
    Route::post('checkout/verify', 'Andrewkharzin\Http\Controllers\CheckoutController@verify');
    Route::get('me', 'Andrewkharzin\Http\Controllers\UserController@me');
    Route::put('users/{id}', 'Andrewkharzin\Http\Controllers\UserController@update');
    Route::post('/change-password', 'Andrewkharzin\Http\Controllers\UserController@changePassword');
    Route::apiResource('address', AddressController::class, [
        'only' => ['destroy']
    ]);
});

Route::group(
    ['middleware' => ['permission:' . Permission::STAFF . '|' . Permission::STORE_OWNER, 'auth:sanctum']],
    function () {
        Route::get('analytics', 'Andrewkharzin\Http\Controllers\AnalyticsController@analytics');
        Route::apiResource('products', ProductController::class, [
            'only' => ['store', 'update', 'destroy']
        ]);
        Route::apiResource('attributes', AttributeController::class, [
            'only' => ['store', 'update', 'destroy']
        ]);
        Route::apiResource('attribute-values', AttributeValueController::class, [
            'only' => ['store', 'update', 'destroy']
        ]);
        Route::apiResource('orders', OrderController::class, [
            'only' => ['update', 'destroy']
        ]);
        Route::get('popular-products', 'Andrewkharzin\Http\Controllers\AnalyticsController@popularProducts');
    }
);
Route::group(
    ['middleware' => ['permission:' . Permission::STORE_OWNER, 'auth:sanctum']],
    function () {
        Route::apiResource('all-shop', ShopController::class, [
            'only' => ['store', 'update', 'destroy']
        ]);
        Route::apiResource('withdraws', WithdrawController::class, [
            'only' => ['store', 'index', 'show']
        ]);
        Route::post('users/add-staff', 'Andrewkharzin\Http\Controllers\ShopController@addStaff');
        Route::post('users/remove-staff', 'Andrewkharzin\Http\Controllers\ShopController@removeStaff');
        Route::get('staffs', 'Andrewkharzin\Http\Controllers\UserController@staffs');
        Route::get('my-shops', 'Andrewkharzin\Http\Controllers\ShopController@myShops');
    }
);


Route::group(['middleware' => ['permission:' . Permission::SUPER_ADMIN, 'auth:sanctum']], function () {
    Route::apiResource('types', TypeController::class, [
        'only' => ['store', 'update', 'destroy']
    ]);
    Route::apiResource('withdraws', WithdrawController::class, [
        'only' => ['update', 'destroy']
    ]);
    Route::apiResource('categories', CategoryController::class, [
        'only' => ['store', 'update', 'destroy']
    ]);
    Route::apiResource('tags', TagController::class, [
        'only' => ['store', 'update', 'destroy']
    ]);
    Route::apiResource('coupons', CouponController::class, [
        'only' => ['store', 'update', 'destroy']
    ]);
    Route::apiResource('order_status', OrderStatusController::class, [
        'only' => ['store', 'update', 'destroy']
    ]);

    Route::apiResource('settings', SettingsController::class, [
        'only' => ['store']
    ]);
    Route::apiResource('users', UserController::class);
    Route::post('users/ban-user', 'Andrewkharzin\Http\Controllers\UserController@banUser');
    Route::post('users/active-user', 'Andrewkharzin\Http\Controllers\UserController@activeUser');
    Route::apiResource('taxes', TaxController::class);
    Route::apiResource('shipping', ShippingController::class);
    Route::post('approve-shop', 'Andrewkharzin\Http\Controllers\ShopController@approveShop');
    Route::post('disapprove-shop', 'Andrewkharzin\Http\Controllers\ShopController@disApproveShop');
    Route::post('approve-withdraw', 'Andrewkharzin\Http\Controllers\WithdrawController@approveWithdraw');
});
