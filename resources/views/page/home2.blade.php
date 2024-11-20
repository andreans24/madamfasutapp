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
        /* Tab Styling */
        .nav-tabs {
            border-bottom: 2px solid #ddd;
            /* Tab underline */
        }

        .nav-item .nav-link {
            padding: 10px 20px;
            font-size: 19px;
            color: #ffffff;
            border: 1px solid transparent;
            border-radius: 5px 5px 0 0;
            margin-right: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .nav-item .nav-link:hover {
            background-color: #f8f9fa;
        }

        .nav-item .nav-link.active {
            background-color: rgba(255, 255, 0, 0.9);
            color: rgb(0, 0, 0);
            border-color: #ffffff;
        }

        /* Map Section */
        #map2 {
            height: 500px;
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
                        <a href="">
                            <img class="img-fluid" src="{{asset('madamfasut/img/bumn.png')}}" alt="Logo">
                        </a>
                    </div>
                    <div class="col-3 col-md-2 text-center">
                        <a href="{{ route('page-home1') }}" class="btn btn-custom"> <strong>Back</strong>
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

        <!-- Tab Navigation -->
        <div class="container-fluid mt-4">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="facility-tab" data-bs-toggle="tab" href="#facility"
                        role="tab"><strong>Facility</strong></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="fender-tab" data-bs-toggle="tab" href="#fender"
                        role="tab"><strong>Fender</strong></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="bollard-tab" data-bs-toggle="tab" href="#bollard"
                        role="tab"><strong>Bollard</strong></a>
                </li>
            </ul>

            <div class="tab-content mt-3">
                <!-- Facility Tab -->
                <div class="tab-pane fade show active" id="facility" role="tabpanel">
                    <div
                        style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                        <h4 style="color: black">Facility : {{ $facilities[0]->gallery->title }}</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Fasilitas</th>
                                    <th>P (m)</th>
                                    <th>L (m)</th>
                                    <th>LWS</th>
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
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Fender Tab -->
                <div class="tab-pane fade" id="fender" role="tabpanel">
                    <div
                        style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                        <h4 style="color: black">Fender : {{ $facilities[0]->gallery->title }}</h4>
                        <table class="table table-striped">
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
                                <td><strong>{{ $totalBaik1 }}</strong></td>
                                <td><strong>{{ $totalRusak1 }}</strong></td>
                                <td><strong>{{ $jumlah1 }}</strong></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Bollard Tab -->
                <div class="tab-pane fade" id="bollard" role="tabpanel">
                    <div
                        style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                        <h4 style="color: black">Bollard : {{ $facilities[0]->gallery->title }}</h4>\
                        <table class="table table-striped">
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
        </div>
        <!-- End Card Section -->

        <div class="text-center mt-4" style="margin-bottom: 50px;">
            <a href="{{ route('page-home3', ['category_id' => $facility->category_id, 'gallery_id' => $facility->gallery_id]) }}"
                class="btn btn-custom"><strong> Read More Detail </strong></a>
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

    <script>
        // Ambil data latitude dan longitude dari server
        var latitude = {{ $gallery->latitude }};
        var longitude = {{ $gallery->longitude }};

        var map2 = L.map('map2').setView([latitude, longitude], 17); 
        var circle = L.circle([latitude, longitude], {
            color: 'red',        // Warna lingkaran
            fillColor: '#30f',     // Warna isi lingkaran
            fillOpacity: 0.2,      // Opasitas isi lingkaran
            radius: 100           // Radius lingkaran dalam meter
        }).addTo(map2);

        // Tambahkan tile layer (layer peta dasar)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">Pelindo MadamFasut</a>',
            maxZoom: 25,
        }).addTo(map2);

        // Tambahkan marker di peta
        var marker = L.marker([latitude, longitude]).addTo(map2);
        marker.bindPopup("<b>Lokasi {{ $gallery->title }}</b><br>Latitude: " + latitude + "<br>Longitude: " + longitude);
    </script>
</body>

</html>