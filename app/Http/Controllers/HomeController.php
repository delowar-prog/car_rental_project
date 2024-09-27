<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
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
        $data['cars'] = $cars->paginate(6);
        return view('welcome', $data);
    }
}
