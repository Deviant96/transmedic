@extends('layouts.app')

@section('title', 'Pengembalian Mobil')

@section('content')
<div class="container">
    <div class="bg-white p-4 rounded shadow-sm">
        <h1 class="h3 mb-4">Pengembalian Mobil</h1>
        <form method="POST" action="/return-car">
            @csrf
            <div class="mb-4">
                <label for="plate_number" class="form-label">Plat Nomor</label>
                <input type="text" name="plate_number" id="plate_number" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Kembalikan Mobil</button>
        </form>
    </div>
</div>
@endsection
