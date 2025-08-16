<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\V1\CategoriesController;
use App\Http\Controllers\V1\PermissionController;
use App\Http\Controllers\V1\RoleController;
use App\Http\Controllers\V1\UserController;
use App\Http\Controllers\V1\VendorController;

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

Route::redirect('/', 'login');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    // Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/analytics', [DashboardController::class, 'analytics'])->name('analytics');

    Route::get('/dashboard/fintech', [DashboardController::class, 'fintech'])->name('fintech');
    Route::get('/ecommerce/customers', [CustomerController::class, 'index'])->name('customers');
    Route::get('/ecommerce/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/ecommerce/invoices', [InvoiceController::class, 'index'])->name('invoices');
    Route::get('/ecommerce/shop', function () {
        return view('pages/ecommerce/shop');
    })->name('shop');
    Route::get('/ecommerce/shop-2', function () {
        return view('pages/ecommerce/shop-2');
    })->name('shop-2');
    Route::get('/ecommerce/product', function () {
        return view('pages/ecommerce/product');
    })->name('product');
    Route::get('/ecommerce/cart', function () {
        return view('pages/ecommerce/cart');
    })->name('cart');
    Route::get('/ecommerce/cart-2', function () {
        return view('pages/ecommerce/cart-2');
    })->name('cart-2');
    Route::get('/ecommerce/cart-3', function () {
        return view('pages/ecommerce/cart-3');
    })->name('cart-3');
    Route::get('/ecommerce/pay', function () {
        return view('pages/ecommerce/pay');
    })->name('pay');
    Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns');
    Route::get('/community/users-tabs', [MemberController::class, 'indexTabs'])->name('users-tabs');
    Route::get('/community/users-tiles', [MemberController::class, 'indexTiles'])->name('users-tiles');
    Route::get('/community/profile', function () {
        return view('pages/community/profile');
    })->name('profile');
    Route::get('/community/feed', function () {
        return view('pages/community/feed');
    })->name('feed');
    Route::get('/community/forum', function () {
        return view('pages/community/forum');
    })->name('forum');
    Route::get('/community/forum-post', function () {
        return view('pages/community/forum-post');
    })->name('forum-post');
    Route::get('/community/meetups', function () {
        return view('pages/community/meetups');
    })->name('meetups');
    Route::get('/community/meetups-post', function () {
        return view('pages/community/meetups-post');
    })->name('meetups-post');
    Route::get('/finance/cards', function () {
        return view('pages/finance/credit-cards');
    })->name('credit-cards');
    // Route::get('/finance/transactions', [TransactionController::class, 'index01'])->name('transactions');
    // Route::get('/finance/transaction-details', [TransactionController::class, 'index02'])->name('transaction-details');
    Route::get('/job/job-listing', [JobController::class, 'index'])->name('job-listing');
    Route::get('/job/job-post', function () {
        return view('pages/job/job-post');
    })->name('job-post');
    Route::get('/job/company-profile', function () {
        return view('pages/job/company-profile');
    })->name('company-profile');
    // Route::get('/messages', function () {
    //     return view('pages/messages');
    // })->name('messages');
    Route::get('/tasks/kanban', function () {
        return view('pages/tasks/tasks-kanban');
    })->name('tasks-kanban');
    Route::get('/tasks/list', function () {
        return view('pages/tasks/tasks-list');
    })->name('tasks-list');
    Route::get('/inbox', function () {
        return view('pages/inbox');
    })->name('inbox');
    Route::get('/calendar', function () {
        return view('pages/calendar');
    })->name('calendar');
    Route::get('/settings/account', function () {
        return view('pages/settings/account');
    })->name('account');
    Route::get('/settings/notifications', function () {
        return view('pages/settings/notifications');
    })->name('notifications');
    Route::get('/settings/apps', function () {
        return view('pages/settings/apps');
    })->name('apps');
    Route::get('/settings/plans', function () {
        return view('pages/settings/plans');
    })->name('plans');
    Route::get('/settings/billing', function () {
        return view('pages/settings/billing');
    })->name('billing');
    Route::get('/settings/feedback', function () {
        return view('pages/settings/feedback');
    })->name('feedback');
    Route::get('/utility/changelog', function () {
        return view('pages/utility/changelog');
    })->name('changelog');
    Route::get('/utility/roadmap', function () {
        return view('pages/utility/roadmap');
    })->name('roadmap');
    Route::get('/utility/faqs', function () {
        return view('pages/utility/faqs');
    })->name('faqs');
    Route::get('/utility/empty-state', function () {
        return view('pages/utility/empty-state');
    })->name('empty-state');
    Route::get('/utility/404', function () {
        return view('pages/utility/404');
    })->name('404');
    Route::get('/utility/knowledge-base', function () {
        return view('pages/utility/knowledge-base');
    })->name('knowledge-base');
    Route::get('/onboarding-01', function () {
        return view('pages/onboarding-01');
    })->name('onboarding-01');
    Route::get('/onboarding-02', function () {
        return view('pages/onboarding-02');
    })->name('onboarding-02');
    Route::get('/onboarding-03', function () {
        return view('pages/onboarding-03');
    })->name('onboarding-03');
    Route::get('/onboarding-04', function () {
        return view('pages/onboarding-04');
    })->name('onboarding-04');
    Route::get('/component/button', function () {
        return view('pages/component/button-page');
    })->name('button-page');
    Route::get('/component/form', function () {
        return view('pages/component/form-page');
    })->name('form-page');
    Route::get('/component/dropdown', function () {
        return view('pages/component/dropdown-page');
    })->name('dropdown-page');
    Route::get('/component/alert', function () {
        return view('pages/component/alert-page');
    })->name('alert-page');
    Route::get('/component/modal', function () {
        return view('pages/component/modal-page');
    })->name('modal-page');
    Route::get('/component/pagination', function () {
        return view('pages/component/pagination-page');
    })->name('pagination-page');
    Route::get('/component/tabs', function () {
        return view('pages/component/tabs-page');
    })->name('tabs-page');
    Route::get('/component/breadcrumb', function () {
        return view('pages/component/breadcrumb-page');
    })->name('breadcrumb-page');
    Route::get('/component/badge', function () {
        return view('pages/component/badge-page');
    })->name('badge-page');
    Route::get('/component/avatar', function () {
        return view('pages/component/avatar-page');
    })->name('avatar-page');
    Route::get('/component/tooltip', function () {
        return view('pages/component/tooltip-page');
    })->name('tooltip-page');
    Route::get('/component/accordion', function () {
        return view('pages/component/accordion-page');
    })->name('accordion-page');
    Route::get('/component/icons', function () {
        return view('pages/component/icons-page');
    })->name('icons-page');


    Route::fallback(function () {
        return view('pages/utility/404');
    });

    Route::get('event', function () {
        return view('pages.event.event');
    })->name('event');

    Route::get('menagement-sales', function () {
        return view('pages.sales.sales');
    })->name('sales');

    Route::get('menagement-order', function () {
        return view('pages.order.order');
    })->name('order');

    Route::prefix('controls')->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('users');
        Route::get('/user/{id}/edit', [UserController::class, 'show'])->name('users.show');
        Route::post('/user', [UserController::class, 'store'])->name('users.store');
        Route::put('/user/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('users.destroy');

        Route::get('/role', [RoleController::class, 'index'])->name('roles');
        Route::get('/role/{id}/edit', [RoleController::class, 'show'])->name('roles.show');
        Route::post('/role', [RoleController::class, 'store'])->name('roles.store');
        Route::put('/role/{id}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('/role/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

        Route::get('/permission',[PermissionController::class, 'index'])->name('permission');
        Route::get('/permission/{id}/edit', [PermissionController::class, 'show'])->name('permission.show');
        Route::post('/permission', [PermissionController::class, 'store'])->name('permission.store');
        Route::put('/permission/{id}', [PermissionController::class, 'update'])->name('permission.update');
        Route::delete('/permission/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');

        Route::get('/assign-role', [UserController::class, 'assignRolePage'])->name('assign-role');
        Route::get('/assign-role/{id}/edit', [UserController::class, 'assignRoleView'])->name('assign-role.show');
        Route::put('/assign-role/{id}', [UserController::class, 'assignRoleUpdate'])->name('assign-role.update');
    });

    Route::prefix('menu')->group(function () {
        Route::get('/vendor', [VendorController::class, 'index'])->name('vendors');
        Route::post('/vendor', [VendorController::class, 'store'])->name('vendors.store');
        Route::get('/vendor/{id}/edit', [VendorController::class, 'show'])->name('vendors.show');
        Route::put('/vendor/{id}', [VendorController::class, 'update'])->name('vendors.update');
        Route::delete('/vendor/{id}', [VendorController::class, 'destroy'])->name('vendors.destroy');

        Route::get('/category', [CategoriesController::class, 'index'])->name('category');
        Route::post('/category', [CategoriesController::class, 'store'])->name('category.store');
        Route::get('/category/{id}/edit', [CategoriesController::class, 'show'])->name('category.show');
        Route::put('/category/{id}', [CategoriesController::class, 'update'])->name('category.update');
        Route::delete('/category/{id}', [CategoriesController::class, 'destroy'])->name('category.destroy');
    });

    Route::prefix('create-transaction')->group(function () {
        Route::get('/manual-order', function () {
            return view('pages.menu.sub-category');
        })->name('manual-order');
    });

    Route::prefix('finance')->group(function () {
        Route::get('/revenue', function () {
            return view('pages.finance.revenue');
        })->name('revenue');
        Route::get('/transactions', function () {
            return view('pages.finance.transactions');
        })->name('transactions');
    });

    Route::get('/messages', function () {
        return view('pages.messages.messages');
    })->name('messages');
});
