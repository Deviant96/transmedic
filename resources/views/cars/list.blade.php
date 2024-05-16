@extends('layouts.app')

@section('title', 'Mobil Tersedia')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-header">Cari mobil</div>
                <div class="card-body">
                    <form method="GET" action="/list-cars" name="search-form">
                        <div class="form-group">
                            <label>Merk</label>
                            <input type="text" name="brand" class="form-control mb-4" value="{{ request('brand') }}">
                        </div>
                        <div class="form-group">
                            <label>Model</label>
                            <input type="text" name="model" class="form-control mb-4" value="{{ request('model') }}">
                        </div>
                        <div class="form-group">
                            <label>Ketersediaan</label>
                            <select name="available" class="form-control mb-4">
                                <option value="">Semua</option>
                                <option value="1" @if(request('available') == '1') selected @endif>Tersedia</option>
                                <option value="0" @if(request('available') == '0') selected @endif>Tidak tersedia</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="bg-white p-6 rounded shadow-md">
                @if(isset($cars) && (request()->has('brand') || request()->has('model') || request()->has('available')))
                <h2 class="text-2xl mb-2">Hasil pencarian</h2>
                <a href="/list-cars" class="small">Kembali ke daftar</a>
                <ul class="list-group mt-4">
                    @forelse ($cars as $car)
                    <li class="list-group-item">
                        {{ $car->brand }} {{ $car->model }} - {{ $car->plate_number }} - Rp{{ number_format($car->price_per_day, 2, ",", ".") }}/hari - {{ $car->available ? 'Tersedia' : 'Tidak tersedia' }}
                    </li>
                    @empty
                    <li class="list-group-item">Tidak ada mobil ditemukan.</li>
                    @endforelse
                </ul>
                @else
                <h1 class="text-2xl mb-4">Semua mobil</h1>
                <ul class="list-group">
                    @foreach ($cars as $car)
                    <li class="list-group-item">
                        {{ $car->brand }} {{ $car->model }} - {{ $car->plate_number }} - Rp{{ number_format($car->price_per_day, 2, ",", ".") }}/hari
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
