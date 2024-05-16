@extends('layouts.app')

@section('title', 'Daftar Rental Saya')

@section('content')
<div class="container">
    <div class="bg-white p-4 rounded shadow-sm">
        <h1 class="h3 mb-4">Daftar Rental Saya</h1>
        <ul class="list-group">
            @foreach ($rentals as $rental)
            <li class="list-group-item">
                <p>{{ $rental->car->brand }} {{ $rental->car->model }} ({{ $rental->car->plate_number }})</p>
                <small>Dari {{ $rental->date_start }} ke {{ $rental->date_end }}</small>
                <p>{{ $rental->returned ? 'Sudah dikembalikan' : 'Belum dikembalikan' }}</p>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
