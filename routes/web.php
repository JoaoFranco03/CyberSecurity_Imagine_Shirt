<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OwnProductController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\LoginController; // Add this import
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify' => true]);

Route::get('/product', function () {
    return view('product_page.index');
});

// Move 2FA routes before auth middleware
Route::get('/2fa/verify', function () {
    if (!session()->has('2fa:user:id')) {
        return redirect()->route('login');
    }
    return view('auth.2fa.verify');
})->name('2fa.verify');

Route::post('/2fa/verify', [LoginController::class, 'verify2FA'])->name('2fa.verify.post');
Route::post('/2fa/resend', [LoginController::class, 'resend2FA'])->name('2fa.resend');

Route::middleware(['auth', 'verified', 'isBlocked'])->group(function () {

    Route::resource('settings/account', ClientController::class);
    Route::resource('dashboard/users', ClientController::class);
    Route::resource('dashboard/orders', OrderController::class);

    //Generate PDF
    Route::get('dashboard/orders/invoice/{order}', [PDFController::class, 'pdfFromOrder'])->name("order.pdf");

    Route::middleware('isClient')->group(function () {
        Route::resource('settings/orders', OrderController::class);

        Route::get('/settings/billing', function () {
            return view('settings.billing')->with('page', 'Billing');
        })->name("settings.billing");

        Route::resource('settings/my_prints', OwnProductController::class);
        Route::get('/create_your_own_tshirt', [OwnProductController::class, 'own_product'])->name('my_prints.create_own');

        Route::get('/settings/shipping', function () {
            return view('settings.shipping')->with('page', 'Shipping');
        })->name("settings.shipping");
        Route::post('cart', [CartController::class, 'store'])->name('cart.checkout');
        Route::get('/cart/success', function () {
            return view('cart.success');
        })->name('cart.success');

        Route::get('pdf', [PDFController::class, 'generatePDF'])->name('pdf.generate');
    });

    // Add vpn middleware to all dashboard routes
    Route::middleware(['isAdmin', 'vpn'])->group(function () {
        Route::resource('dashboard/categories', CategoryController::class);
        Route::get('dashboard/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('dashboard/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

        Route::resource('dashboard/colors', ColorController::class);
        Route::get('dashboard/colors/{color}/edit', [ColorController::class, 'edit'])->name('colors.edit');
        Route::put('dashboard/colors/{color}', [ColorController::class, 'update'])->name('colors.update');

        Route::resource('dashboard/settings', ColorController::class);

        Route::get('dashboard/prints', [ProductController::class, 'adminIndex'])->name('prints.index');
        Route::get('dashboard/prints/{product?}', [ProductController::class, 'adminShow'])->name('prints.show');
        Route::post('dashboard/prints', [ProductController::class, 'store'])->name('prints.store');

        Route::get('dashboard/prints/{product}/edit', [ProductController::class, 'edit'])->name('prints.edit');
        Route::put('dashboard/prints/{product}', [ProductController::class, 'update'])->name('prints.update');

        Route::delete('dashboard/prints/{product}', [ProductController::class, 'removeProduct'])->name('prints.remove');
        Route::resource('dashboard/prices', PriceController::class);
        Route::resource('dashboard', DashboardController::class);
    });
});

Route::put('cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('cart/{t_shirt}', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('cart', [CartController::class, 'show'])->name('cart.show');
Route::delete('cart', [CartController::class, 'destroy'])->name('cart.destroy');

Route::resource('products', ProductController::class);

Route::resource('orders', OrderController::class)->middleware(['auth', 'verified']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
