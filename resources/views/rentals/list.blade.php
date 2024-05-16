@extends('layouts.app')

@section('title', 'Daftar Rental Saya')

@section('content')
<div class="container">
    <div class="bg-white p-4 rounded shadow-sm">
        <h1 class="h3 mb-4">Daftar Rental Saya</h1>
        <ul class="list-group">
            @foreach ($rentals as $rental)
            <li class="list-group-item">
                <h4>{{ $rental->car->brand }} {{ $rental->car->model }} ({{ $rental->car->plate_number }})</h4>
                <small class="text-muted">Dari {{ $rental->date_start_formatted }} ke {{ $rental->date_end_formatted }} ({{ $rental->diffindays + 1 }} hari)</small>
                <div>
                @if( $rental->returned )
                    <span class="badge text-bg-success">Sudah dikembalikan</span>
                @else
                    <span class="badge text-bg-warning">Belum dikembalikan</span>
                @endif
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
