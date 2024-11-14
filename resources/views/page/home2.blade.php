<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Madam Fasut | Home</title>

    <link rel="icon" type="image/png" href="{{ asset('madamfasut/img/favicon.ico') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="{{ asset('madamfasut/css/style1.css') }}">
    <style>
        .card-header {
            cursor: pointer;
        }

        /* Membuat peta tetap di posisi saat scroll */
        .map-container2 {
            position: sticky;
            top: 0;
            height: 100vh;
            /* agar sesuai tinggi layar */
            overflow: hidden;
            /* agar peta tidak ikut menggulir */
        }
    </style>
</head>

<body>

    <!-- Container -->
    <div class="container-fluid text-center p-0">

        <!-- Navbar -->
        <div class="navbar-custom2">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-3 col-md-2 text-center">
                        <a href="{{ route('page-home1') }}">
                            <img class="img-fluid" src="{{ asset('madamfasut/img/Pelindo.png') }}" alt="Logo">
                        </a>
                    </div>
                    <div class="col-6 col-md-8 text-center">
                        <h1 class="font-weight-bold icon-white">Madam Fasut</h1>
                    </div>
                    <div class="col-3 col-md-2 text-center">
                        <a href="{{ route('page-home1') }}">
                            <i class="fa-solid fa-backward-step fa-2x icon-white"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Navbar -->
        <div class="container-fluid mt-4">
            <div id="map2" class="map-container2">

            </div>
        </div>

        <!-- Card Section -->
        <div class="container card-section">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" onclick="toggleCard(this)">
                    Facility : {{ $facilities[0]->gallery->title }}
                    <span class="toggleIcon">+</span>
                </div>
                <div class="card-body p-3">
                    <!-- Tampilkan detail fasilitas dalam bentuk tabel -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Fasilitas</th>
                                <th>P (m)</th>
                                <th>L (m)</th>
                                <th>L (m)</th>
                                <th>Luas (m2)</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($facilities as $facility)
                            <tr>
                                <td>{{ $facility->fasilitas }}</td>
                                <td>{{ $facility->panjang }}</td>
                                <td>{{ $facility->luas }}</td>
                                <td>{{ $facility->lws }}</td>
                                <td>{{ $facility->luas_m2 }}</td>
                                <td>{{ $facility->keterangan }}</td>
                                {{-- <td>{{ $facility->created_at->format('d-m-Y') }}</td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td><strong>{{ $totalPanjang }}</strong></td>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" onclick="toggleCard(this)">
                    Fender : {{ $facilities[0]->gallery->title }}
                    <span class="toggleIcon">+</span>
                </div>
                <div class="card-body p-3">
                    <!-- Tampilkan detail fasilitas dalam bentuk tabel -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Fasilitas</th>
                                <th>Baik</th>
                                <th>Rusak</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fenders as $fender)
                            <tr>
                                <td>{{ $fender->fasilitas }}</td>
                                <td>{{ $fender->baik }}</td>
                                <td>{{ $fender->rusak }}</td>
                                <td>{{ $fender->baik + $fender->rusak }}</td>
                                {{-- <td>{{ $fender->created_at->format('d-m-Y') }}</td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td><strong>{{ $totalBaik }}</strong></td>
                            <td><strong>{{ $totalRusak }}</strong></td>
                            <td><strong>{{ $jumlah }}</strong></td>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" onclick="toggleCard(this)">
                    Bollard : {{ $facilities[0]->gallery->title }}
                    <span class="toggleIcon">+</span>
                </div>
                <div class="card-body p-3">
                    <!-- Tampilkan detail fasilitas dalam bentuk tabel -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Fasilitas</th>
                                <th>Baik</th>
                                <th>Rusak</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bollards as $b)
                            <tr>
                                <td>{{ $b->fasilitas }}</td>
                                <td>{{ $b->baik }}</td>
                                <td>{{ $b->rusak }}</td>
                                <td>{{ $b->baik + $b->rusak }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td><strong>{{ $totalBaik }}</strong></td>
                            <td><strong>{{ $totalRusak }}</strong></td>
                            <td><strong>{{ $jumlah }}</strong></td>
                        </tr>

                    </table>
                </div>
            </div>

        </div>
        <!-- Akhir Card Section -->
        <div class="text-center mt-4">
            <a href="{{ route('page-home3') }}" class="btn btn-custom">Read More Detail</a>
        </div>

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--  toggle card -->
    <script>
        function toggleCard(header) {
            const cardBody = header.nextElementSibling;
            const icon = header.querySelector('.toggleIcon');

            if (cardBody.style.display === "none" || cardBody.style.display === "") {
                cardBody.style.display = "block";
                icon.textContent = '-'; // change to minus
            } else {
                cardBody.style.display = "none";
                icon.textContent = '+'; // change to plus
            }
        }
    </script>
    <!-- Map JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script src="{{ asset('madamfasut/js/script1.js') }}"></script>
    <script src="{{ asset('madamfasut/js/script2.js') }}"></script>
</body>

</html>