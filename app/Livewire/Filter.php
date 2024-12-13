<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class Filter extends Component
{

    public $car_type;
    public $car_brand;
    public $daily_rent_price;

    public function render()
    {
        $car_type = $this->car_type;
        $car_brand = $this->car_brand;
        $daily_rent_price = $this->daily_rent_price;

        return view('livewire.filter', [
            'cars' => Car::where(function ($query) use ($car_type, $car_brand, $daily_rent_price) {
                if ($car_type) {
                    $query->where('car_type', $car_type);
                }
                if ($car_brand) {
                    $query->where('brand', $car_brand);
                }
                if ($daily_rent_price) {
                    $query->where('daily_rent_price', '<=', $daily_rent_price);
                }
            })->paginate(6)
        ]);
    }
}
