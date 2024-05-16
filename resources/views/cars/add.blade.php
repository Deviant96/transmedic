@extends('layouts.app')

@section('title', 'Tambal Mobil Baru')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambal Mobil Baru</div>
                <div class="card-body">
                    <form method="POST" action="/add-car">
                        @csrf
                        <div class="form-group">
                            <label for="brand">Merk</label>
                            <input type="text" id="brand" name="brand" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" id="model" name="model" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="plate_number">Plat Nomor</label>
                            <input type="text" id="plate_number" name="plate_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="price_per_day">Harga per hari</label>
                            <input type="number" id="price_per_day" name="price_per_day" step="0.01" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
