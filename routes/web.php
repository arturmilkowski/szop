<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page\{PageController, ContactController};
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Cart\{
    StoreController as CartStoreController,
    DestroyController as CartDestroyController,
    RemoveAllController as CartRemoveAllController
};
use App\Http\Controllers\Order\{CheckoutController, WithoutRegistrationController, WithRegistrationController};
use App\Http\Controllers\Backend\User\DashboardController;
use App\Http\Controllers\Backend\Admin\Product\BrandController;

Route::get('/', [PageController::class, 'index'])->name('pages.index');
Route::get('/o-firmie', [PageController::class, 'about'])->name('pages.about');
Route::get('/kontakt', [ContactController::class, 'create'])->name('pages.contacts.create');
Route::post('/kontakt/wyślij', [ContactController::class, 'store'])->name('pages.contacts.store');

Route::get('/produkty/{product:slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/produkty', [ProductController::class, 'index'])->name('products.index');

Route::post('/dodaj/{type}', CartStoreController::class)->name('cart.store');
Route::delete('/usun/{type}', CartDestroyController::class)->name('cart.destroy');
Route::get('/usun', CartRemoveAllController::class)->name('cart.destroy.all');

Route::get('/kasa', CheckoutController::class)->name('orders.checkout.index');
Route::get('/zamow-bez-rejestracji', [WithoutRegistrationController::class, 'create'])->name('orders.without-registration.create');
Route::post('/wyslij-zamowienie-bez-rejestracji', [WithoutRegistrationController::class, 'store'])->name('orders.without-registration.store');
Route::view('/dziekujemy-za-zamowienie-bez-rejestracji', 'order.thank.without-registration')->name('orders.thank.without-registration');
Route::view('/dziekujemy-za-zamowienie', 'order.thank.with-registration')->name('orders.thank.with-registration');


// Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/zamow', [WithRegistrationController::class, 'create'])->name('orders.with-registration.create');
    Route::post('/wyslij-zamowienie', [WithRegistrationController::class, 'store'])->name('orders.with-registration.store');

    Route::resource('/konto/admin/produkty/firmy', BrandController::class)->names('backend.admins.products.brands')->parameters(['firmy' => 'brand']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
