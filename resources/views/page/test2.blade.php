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
        /* Map Section */
        #map2 {
            height: 400px;
            /* Set map height */
            width: 100%;
            position: relative;
            /* Map remains fixed at the top */
            top: 0;
            left: 0;
            z-index: 2;
            /* Map on top */
            margin-top: 150px;
            margin-bottom: 20px;
            z-index: 0;
            margin-bottom: 1.5rem;
            border-radius: 15px;
            overflow: hidden;
        }

        /* Card Section */
        .card-section2 {
            margin-top: 15px;
            /* Menambahkan jarak antara map dan card */
            padding: 20px;
            max-height: calc(100vh - 540px);
            /* Menyesuaikan ukuran untuk ruang setelah map */
            overflow-y: auto;
            /* Enable scroll for card section */
            z-index: 0;
            /* Cards tetap di bawah map */
        }

        /* Card Styling */
        .card {
            margin-bottom: 20px;
            /* Space between cards */
        }

        .card-header {
            cursor: pointer;
        }

        /* Icon Styling */
        .toggleIcon {
            font-size: 1.5rem;
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
        <!-- End Navbar -->

        <!-- Map Section -->
        <div class="container-fluid mt-4">
            <div id="map2" class="map-container2">
                <!-- Map content here (using Leaflet.js or other map implementation) -->
            </div>
        </div>

        <!-- Card Section -->
        <div class="container card-section2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" onclick="toggleCard(this)">
                    Facility : {{ $facilities[0]->gallery->title }}
                    <span class="toggleIcon">+</span>
                </div>
                <div class="card-body p-3">
                    <!-- Display facility details in a table -->
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
                            </tr>
                            @endforeach
                        </tbody>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td><strong>{{ $totalPanjang }}</strong></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" onclick="toggleCard(this)">
                    Fender : {{ $facilities[0]->gallery->title }}
                    <span class="toggleIcon">+</span>
                </div>
                <div class="card-body p-3">
                    <!-- Display fender details in a table -->
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

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" onclick="toggleCard(this)">
                    Bollard : {{ $facilities[0]->gallery->title }}
                    <span class="toggleIcon">+</span>
                </div>
                <div class="card-body p-3">
                    <!-- Display bollard details in a table -->
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
        <!-- End Card Section -->

        <div class="text-center mt-4">
            <a href="{{ route('page-home3', ['category_id' => $facility->category_id, 'gallery_id' => $facility->gallery_id]) }}"
                class="btn btn-custom">Read More Detail</a>
        </div>

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Toggle Card Script -->
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
    <script src="{{ asset('madamfasut/js/script2.js') }}"></script>

</body>

</html>