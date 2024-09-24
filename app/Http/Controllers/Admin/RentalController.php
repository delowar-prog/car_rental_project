<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rental;


class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['rentals'] = Rental::paginate();
        return view('admin.rental.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['rental'] = new Rental();
        return view('admin.rental.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'name'=>'required',
            'brand'=>'required',
            'model'=>'nullable',
            'year'=>'required',
            'car_type'=>'nullable',
        ]);
        $car=Car::create($request->all());

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
        $validated=$request->validate([
            'name'=>'required',
            'brand'=>'required',
            'model'=>'nullable',
            'year'=>'required',
            'car_type'=>'nullable',
        ]);
        $car = Car::findOrFail($id);
        $car->update($request->all());
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
        $car->delete();
        $alert = [
            'type' => 'Success',
            'message' => 'Car Deleted successfully',
        ];

        return redirect()->route('car.index')
            ->with($alert);
    }
}
