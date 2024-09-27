<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['cars'] = Car::paginate(10);
        return view('admin.car.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['car'] = new Car();
        return view('admin.car.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'model' => 'nullable',
            'year' => 'required',
            'car_type' => 'nullable',
            'image' => 'required',
        ]);
        if ($request->has('image')) {
            $file = $request->file('image');
            $uploadsPath = $file->store('uploads', 'public');
            $path = Storage::url($uploadsPath);
        }

        $car = Car::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'model' => $request->model,
            'year' => $request->year,
            'car_type' => $request->car_type,
            'daily_rent_price' => $request->daily_rent_price,
            'image' => $path,
        ]);

        $alert = [
            'type' => 'Success',
            'message' => 'Car created successfully',
        ];

        return redirect()->route('car.index')
            ->with($alert);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['car'] = Car::findOrFail($id);
        return view('admin.car.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'model' => 'nullable',
            'year' => 'required',
            'car_type' => 'nullable',
        ]);

        $car = Car::findOrFail($id);
        if ($request->has('image')) {
            $file = $request->file('image');
            $uploadsPath = $file->store('uploads', 'public');
            $path = Storage::url($uploadsPath);
        }
        $car->update([
            'name' => $request->name,
            'brand' => $request->brand,
            'model' => $request->model,
            'year' => $request->year,
            'car_type' => $request->car_type,
            'daily_rent_price' => $request->daily_rent_price,
            'image' => $path,
        ]);
        $alert = [
            'type' => 'Success',
            'message' => 'Car Updated successfully',
        ];

        return redirect()->route('car.index')
            ->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);

        if ($car->image && file_exists(public_path($car->image))) {
            unlink(public_path($car->image));
        }

        $car->delete();
        $alert = [
            'type' => 'Success',
            'message' => 'Car Deleted successfully',
        ];

        return redirect()->route('car.index')
            ->with($alert);
    }
}
