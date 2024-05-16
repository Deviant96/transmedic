@extends('layouts.app')

@section('title', 'Sewa Mobil')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sewa mobil</div>
                <div class="card-body">
                    <form method="POST" action="/rent-car">
                        @csrf
                        <div class="row">
                            @foreach ($cars as $car)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    @if ($car->image_url)
                                    <img src="{{ $car->image_url }}" class="card-img-top" alt="{{ $car->brand }} {{ $car->model }}">
                                    @else
                                    <img src="{{ asset('placeholder-image.svg') }}" class="card-img-top" alt="Placeholder Image">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $car->brand }} {{ $car->model }}</h5>
                                        <p class="card-text">Rp{{ number_format($car->price_per_day, 2, ",", ".") }}/hari</p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="car_id" id="car_{{ $car->id }}" value="{{ $car->id }}" required>
                                            <label class="form-check-label" for="car_{{ $car->id }}">Pilih</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        <div class="mb-4">
                            <label for="date_start" class="form-label">Tanggal mulai</label>
                            <input type="date" name="date_start" id="date_start" class="form-control" required min="{{ date('Y-m-d') }}">
                        </div>
                        <div class="mb-4">
                            <label for="date_end" class="form-label">Tanggal selesai</label>
                            <input type="date" name="date_end" id="date_end" class="form-control" required min="{{ date('Y-m-d') }}">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Sewa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
