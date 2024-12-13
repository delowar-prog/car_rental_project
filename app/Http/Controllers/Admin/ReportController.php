<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Pdf;


class ReportController extends Controller
{
    public function totalRental()
    {
    $rentedCars = Rental::latest()->get();
    $pdf = Pdf::loadView('admin.report.total-rental', compact('rentedCars'));
    return $pdf->stream('total-rental (' . Carbon::now()->format('d-m-Y h.i.s A') . ').pdf');
    }
    public function totalCar()
    {
    $cars = Car::latest()->get();
    $pdf = Pdf::loadView('admin.report.total-car', compact('cars'));
    return $pdf->stream('total-cars (' . Carbon::now()->format('d-m-Y h.i.s A') . ').pdf');
    }
    public function monthlyRentalForm(){
        return view('admin.report.monthly-rental-form');
    }
}
