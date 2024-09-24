<?php

use App\Http\Controllers\Frontend\RentalController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\AdminController;
use App\Models\Car;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    $cars = Car::query();
    if ($request->filled('car_type')) {
        $cars->where('car_type', $request->car_type);
    }
    if ($request->filled('car_brand')) {
        $cars->where('brand', $request->car_brand);
    }
    if ($request->filled('daily_rent_price')) {
        $cars->where('daily_rent_price', '<=', $request->daily_rent_price);
    }
    $data['cars'] = $cars->get();
    return view('welcome', $data);
});



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
    Route::resource('rental', RentalController::class);

});

Route::middleware(['auth', 'userMiddleware'])->group(function () {
   Route::get('/customer/dashboard', [CustomerController::class, 'customerDashboard'])->name('customer.dashboard');
   Route::post('/bookings/store', [RentalController::class, 'store'])->name('bookings.store');
   Route::get('/my-rental/{id}', [RentalController::class, 'getBookingHistory'])->name('frontend.rental');
   Route::get('/about', [PageController::class, 'aboutPage'])->name('about');
   Route::get('/contact', [PageController::class, 'contactPage'])->name('contact');

});
