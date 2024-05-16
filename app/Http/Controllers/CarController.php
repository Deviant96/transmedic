<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function showAddCarForm()
    {
        return view('cars.add');
    }

    public function addCar(Request $request)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'plate_number' => 'required|string|max:10|unique:cars',
            'price_per_day' => 'required|numeric|min:0',
        ]);

        Car::create($request->all());

        return redirect()->route('car.add.form')->with('message', 'Mobil berhasil ditambahkan.');
    }

    public function listCars(Request $request)
    {
        $query = Car::query();

        if ($request->filled('brand')) {
            $query->where('brand', 'like', '%' . $request->brand . '%');
        }

        if ($request->filled('model')) {
            $query->where('model', 'like', '%' . $request->model . '%');
        }

        if ($request->filled('available')) {
            $query->where('available', $request->available);
        }

        $cars = $query->get();

        return view('cars.list', compact('cars'));
    }
}
