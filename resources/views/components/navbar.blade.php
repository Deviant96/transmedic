<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/">Sewa Mobil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @if(auth()->check())
                    <li class="nav-item">
                        <a class="nav-link link-warning" href="/add-car">Tambah Mobil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-warning" href="/list-cars">Daftar Mobil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/my-rentals">Rental Saya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/return-car">Pengembalian Mobil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn bg-danger text-white" href="/logout">Keluar</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Daftar</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
