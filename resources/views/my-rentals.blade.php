@extends('layouts.app')

@section('title', 'Daftar Rental Saya')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="bg-white p-4 rounded shadow-md">
                <h1 class="h3 mb-4">Daftar Rental Saya</h1>
                <ul class="list-group">
                    @foreach ($rentals as $rental)
                    <li class="list-group-item">
                        {{ $rental->car->brand }} {{ $rental->car->model }} - {{ $rental->car->plate_number }} - From {{ $rental->date_start }} to {{ $rental->date_end }} - {{ $rental->returned ? 'Returned' : 'Not Returned' }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
