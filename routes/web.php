<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

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


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['referral']], function() {


    Route::get('/', \App\Livewire\App\Main\Index::class)->name('home');
    Route::get('/article/index', \App\Livewire\App\Article\Index::class)->name('article.index');
    Route::get('/article/view/{article}', \App\Livewire\App\Article\View::class)->name('article.view');

    if(config('modules.shop')) {
        Route::get('/shop/product/index', \App\Livewire\App\Shop\Product\Index::class)->name('shop.product.index');
        Route::get('/shop/cart/index', \App\Livewire\App\Shop\Cart\Index::class)->name('shop.cart.index');
        Route::get('/shop/cart/checkout', \App\Livewire\App\Shop\Cart\Checkout::class)->name('shop.cart.checkout');
        Route::get('/shop/product/view/{product}', \App\Livewire\App\Shop\Product\View::class)->name('shop.product.view');
    }

    Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {

        Route::any('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::get('/user/verify', \App\Livewire\Panel\User\Verify::class)->name('user.verify');
        Route::get('/user/verify/id_card_file/{verify}', [\App\Livewire\Panel\User\Verify\UploadIdCardFile::class, 'displayIdCardFile'])->name('user.verify.id_card_file');
        Route::get('/user/verify/verify_file/{verify}',  [\App\Livewire\Panel\User\Verify\UploadVerifyFile::class, 'displayVerifyFile'])->name('user.verify.verify_file');
        Route::get('/user/mobile', \App\Livewire\Panel\User\Mobile::class)->name('user.mobile')->middleware(['password.confirm', 'user.verify']);


        Route::any('/notification/view/{notification}', \App\Livewire\App\Notification\View::class)->name('notification.view');
        Route::any('/faqs/index', \App\Livewire\App\FAQ\Index::class)->name('faqs.index');

        Route::group(['prefix' => config('bap.panel-prefix-url')], function() {
            Route::get('/dashboard/index', \App\Livewire\Panel\Dashboard\Index::class)->name('panel.dashboard.index');

            if(config('modules.wallet')) {
                Route::get('/panel/user/wallet/index', \App\Livewire\Panel\User\Mobile::class)->name('panel.user.wallet.index')->middleware(['password.confirm', 'user.verify']);
                Route::get('/panel/wallet/index', \App\Livewire\Panel\Wallet\Index::class)->name('panel.wallet.index');
            }
            Route::get('/support/ticket/index', \App\Livewire\Panel\Support\Ticket\Index::class)->name('panel.support.ticket.index');
            Route::get('/support/ticket/create', \App\Livewire\Panel\Support\Ticket\Create::class)->name('panel.support.ticket.create');
            Route::get('/support/ticket/view/{ticket}', \App\Livewire\Panel\Support\Ticket\View::class)->name('panel.support.ticket.view');

        });

        Route::group(['prefix' => config('bap.admin-prefix-url'), 'middleware' => ['auth:sanctum', 'verified', 'admin']], function () {
            Route::get('/dashboard/index', \App\Livewire\Admin\Dashboard\Index::class)->name('admin.dashboard.index');
            Route::get('/user/index', \App\Livewire\Admin\User\Index::class)->name('admin.user.index');
            Route::get('/user/role/index', \App\Livewire\Admin\User\Role\Index::class)->name('admin.user.role.index');
            Route::get('/user/team/index', \App\Livewire\Admin\User\Team\Index::class)->name('admin.user.team.index');
            Route::get('/user/permission/index', \App\Livewire\Admin\User\Permission\Index::class)->name('admin.user.permission.index');
            Route::get('/user/verify/index', \App\Livewire\Admin\User\Verify\Index::class)->name('admin.user.verify.index');

            Route::get('/setting/category/index', \App\Livewire\Admin\Setting\Category\Index::class)->name('admin.setting.category.index');
            Route::get('/setting/manage/index', \App\Livewire\Admin\Setting\Manage\Index::class)->name('admin.setting.manage.index');

            if(config('modules.shop')) {
                Route::get('/shop/product/index', \App\Livewire\Admin\Shop\Product\Index::class)->name('admin.shop.product.index');
                Route::get('/shop/order/index', \App\Livewire\Admin\Shop\Order\Index::class)->name('admin.shop.order.index');
            }

            if(config('modules.wallet')) {
                Route::get('/payment/deposit/index', \App\Livewire\Admin\Payment\Deposit\Index::class)->name('admin.payment.deposit.index');
                Route::get('/payment/withdraw/index', \App\Livewire\Admin\Payment\Withdraw\Index::class)->name('admin.payment.withdraw.index');
            }

            Route::get('/content/article/index', \App\Livewire\Admin\Content\Article\Index::class)->name('admin.content.article.index');
            Route::get('/content/faq/index', \App\Livewire\Admin\Content\FAQ\Index::class)->name('admin.content.faq.index');
            Route::get('/content/carousel/index', \App\Livewire\Admin\Content\Carousel\Index::class)->name('admin.content.carousel.index');

            Route::get('/support/ticket/index', \App\Livewire\Admin\Support\Ticket\Index::class)->name('admin.support.ticket.index');
            Route::get('/support/ticket/archive', \App\Livewire\Admin\Support\Ticket\Archive::class)->name('admin.support.ticket.archive');
            Route::get('/support/ticket/view/{ticket}', \App\Livewire\Admin\Support\Ticket\View::class)->name('admin.support.ticket.view');

        });
    });

});


