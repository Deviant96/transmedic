<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    public function showRentCarForm()
    {
        $cars = Car::where('available', true)->get();
        return view('rentals.rent', compact('cars'));
    }
    
    public function rentCar(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
        ]);

        $car = Car::find($validated['car_id']);

        if (!$car->available) {
            return response()->json(['message' => 'Car not available'], 400);
        }

        $rental = Rental::create([
            'user_id' => session('user_id'),
            'car_id' => $validated['car_id'],
            'date_start' => $validated['date_start'],
            'date_end' => $validated['date_end'],
        ]);

        $car->available = false;
        $car->save();

        // return response()->json(['message' => 'Car rented successfully']);
        return redirect()->route('rental.rent.form')->with('message', 'Car rented successfully.');
    }

    public function listRentedCars()
    {
        $rentals = Rental::where('user_id', session('user_id'))->with('car')->get();
        // return response()->json($rentals);
        return view('rentals.list', compact('rentals'));
    }

    public function listUserRentals()
    {
        $rentals = Rental::where('user_id', session('user_id'))->with('car')->get();
        return view('rentals.list', compact('rentals'));
    }

    public function myRentals()
    {
        $user = auth()->user();
        $rentals = Rental::where('user_id', $user->id)->get();

        return view('my-rentals', compact('rentals'));
    }

    public function showReturnCarForm()
    {
        return view('rentals.return');
    }

    public function returnCar(Request $request)
    {
        $validated = $request->validate([
            'plate_number' => 'required|string|exists:cars,plate_number',
        ]);

        $car = Car::where('plate_number', $validated['plate_number'])->first();
        $rental = Rental::where('car_id', $car->id)->where('user_id', session('user_id'))->where('returned', false)->first();

        if (!$rental) {
            // return response()->json(['message' => 'Car not rented by user'], 400);

            return back()->withErrors(['error' => 'Car is not rented by you or already returned.']);
        }

        $rental->returned = true;
        $rental->save();

        $car->available = true;
        $car->save();

        $daysRented = $rental->date_end->diffInDays($rental->date_start);
        $totalPrice = $daysRented * $car->price_per_day;

        // return response()->json(['message' => 'Car returned successfully', 'total_price' => $totalPrice]);
        return redirect()->route('rental.return.form')->with('message', "Car returned successfully. Total rent cost: $$totalPrice");
    }
}
