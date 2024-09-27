<?php

use App\Http\Controllers\Frontend\RentalController;
use App\Http\Controllers\Admin\RentalController as DashboardRentalController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\AdminController;
use App\Models\Car;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', [HomeController::class, 'index']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('customer', CustomerController::class);
    Route::resource('car', CarController::class);
    Route::resource('rental', DashboardRentalController::class);
    Route::put('/rental/{id}/update-status', [DashboardRentalController::class, 'updateStatus'])->name('rental.updateStatus');

});

Route::middleware(['auth', 'userMiddleware'])->group(function () {
   Route::get('/customer/dashboard', [CustomerController::class, 'customerDashboard'])->name('customer.dashboard');
   Route::post('/bookings/store', [RentalController::class, 'store'])->name('bookings.store');
   Route::get('/my-rental/{id}', [RentalController::class, 'getBookingHistory'])->name('frontend.rental');
   Route::put('/bookings/{id}/cancel', [RentalController::class, 'cancel'])->name('bookings.cancel');

});

Route::get('/about', [PageController::class, 'aboutPage'])->name('about');
Route::get('/contact', [PageController::class, 'contactPage'])->name('contact');
