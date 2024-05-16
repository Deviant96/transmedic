<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RentalController;

Route::get('/', function () {
    return view('welcome');
});

// Route::post('/register', [UserController::class, 'register']);
// Route::post('/login', [UserController::class, 'login']);
// Route::post('/logout', [UserController::class, 'logout']);

// Route::middleware('auth')->group(function () {
//     Route::post('/add-car', [CarController::class, 'addCar']);
//     Route::get('/search-cars', [CarController::class, 'searchCars']);
//     Route::get('/available-cars', [CarController::class, 'listAvailableCars']);

//     Route::post('/rent-car', [RentalController::class, 'rentCar']);
//     Route::get('/rented-cars', [RentalController::class, 'listRentedCars']);
//     Route::post('/return-car', [RentalController::class, 'returnCar']);
// });

Route::permanentRedirect('/', '/rent-car');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/add-car', [CarController::class, 'showAddCarForm'])->name('car.add.form')->middleware('auth');
Route::post('/add-car', [CarController::class, 'addCar'])->name('car.add')->middleware('auth');
Route::get('/list-cars', [CarController::class, 'listCars'])->name('car.list')->middleware('auth');


Route::get('/rent-car', [RentalController::class, 'showRentCarForm'])->name('rental.rent.form');
Route::post('/rent-car', [RentalController::class, 'rentCar'])->name('rental.rent')->middleware('auth');
Route::get('/my-rentals', [RentalController::class, 'listUserRentals'])->name('rental.list')->middleware('auth');
Route::get('/return-car', [RentalController::class, 'showReturnCarForm'])->name('rental.return.form')->middleware('auth');
Route::post('/return-car', [RentalController::class, 'returnCar'])->name('rental.return')->middleware('auth');

