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
    <link rel="stylesheet" href="madamfasut/css/style1.css">
</head>

<body>

    <!-- Container -->
    <div class="container-fluid text-center p-0">

        <!-- Navbar -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-3 col-md-2 text-center">
                        <img class="img-fluid" src="{{ asset('madamfasut/img/Pelindo.png') }}" alt="Logo">
                    </div>
                    <div class="col-6 col-md-8 text-center">
                        <h1 class="font-weight-bold icon-white">Madam Fasut</h1>
                    </div>
                    <div class="col-3 col-md-2 text-center">
                        <a href="{{ route('admin.login') }}" target="_blank">
                            <i class="fa-solid fa-gear fa-2x icon-white"></i>
                            <!-- <i class="fa-solid fa-house-chimney fa-3x icon-white"></i> -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Navbar -->

        <!-- Menu Buttons -->
        <div class="container mt-5 menu-buttons">
            <div class="row justify-content-center mb-4">
                @foreach ($categories as $category)
                <div class="col-6 col-md-3 d-flex justify-content-center">
                    <button class="btn-circle" data-bs-toggle="modal" data-bs-target="#categoryModal{{ $category->id }}"
                        data-category-id="{{ $category->id }}">
                        <i class="fa-solid fa-map-location"></i>
                        <span class="fw-bold">{{ $category->name }}</span>
                    </button>
                </div>

                <!-- Modal untuk setiap kategori -->
                <div class="modal fade" id="categoryModal{{ $category->id }}" tabindex="-1"
                    aria-labelledby="categoryModalLabel{{ $category->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="categoryModalLabel{{ $category->id }}" style="color: black">
                                    {{ $category->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div
                                    style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; max-width: 100%;">

                                    @foreach ($category->galleries as $gallery)
                                    <div style="position: relative; overflow: hidden; border-radius: 8px;">
                                        <a href="{{ route('page-home2', ['category_id' => $category->id, 'gallery_id' => $gallery->id]) }}"
                                            style="text-decoration: none;">
                                            <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title }}"
                                                style="width: 100%; height: 100%; border-radius: 8px; transition: transform 0.3s ease; transform: scale(1);"
                                                onmouseover="this.style.transform='scale(1.1)'"
                                                onmouseout="this.style.transform='scale(1)'">
                                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); border-radius: 8px; opacity: 0; transition: opacity 0.3s ease;"
                                                onmouseover="this.style.opacity='1'"
                                                onmouseout="this.style.opacity='0'"></div>
                                            <h5
                                                style="position: absolute; color: white; top: 40%; left: 10px; transform: none; font-weight: normal;">
                                                {{ $gallery->title }}</h5>
                                            <div
                                                style="position: absolute; top: 65%; left: 10px; width: 50px; height: 2px; background-color: rgba(255, 255, 0, 0.9);">
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Akhir Modal Bootstrap -->
            </div>
        </div>
        <!-- Akhir Menu Buttons -->

        <!-- Map Section -->
        <div class="container-fluid mt-4">
            <div id="map" class="map-container"></div>
        </div>
        <!-- Akhir Map Section -->
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <!-- Map JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="madamfasut/js/script1.js"></script>
    <script>
        // Inisialisasi peta dengan Leaflet
        var map = L.map('map').setView([-0.7893, 113.9213], 5); // Koordinat Indonesia, zoom level 5

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Array untuk menyimpan marker yang sudah ditambahkan
        var markers = [];

        // Fungsi untuk menambahkan marker ke peta
        function addMarkersForCategory(categoryId) {
            // Hapus semua marker sebelumnya
            markers.forEach(function(marker) {
                map.removeLayer(marker);
            });
            markers = []; // Reset array marker

            // Ambil data lat dan long berdasarkan category_id
            // Buat request AJAX untuk mendapatkan data lat dan lng berdasarkan category_id
            fetch('/get-galleries-by-category/' + categoryId)
                .then(response => response.json())
                .then(data => {
                    data.forEach(function(gallery) {
                        var lat = parseFloat(gallery.latitude);
                        var lng = parseFloat(gallery.longitude);
                        if (lat && lng) {
                            // Buat marker untuk setiap lokasi
                            var marker = L.marker([lat, lng]).addTo(map);
                            markers.push(marker);
                        }
                    });
                })
                .catch(error => console.error('Error fetching galleries:', error));
        }

        // Event listener untuk tombol btn-circle
        document.querySelectorAll('.btn-circle').forEach(function(button) {
            button.addEventListener('mouseenter', function() {
                var categoryId = button.getAttribute('data-category-id');
                addMarkersForCategory(categoryId); // Menambahkan marker berdasarkan category_id
            });
            
            button.addEventListener('mouseleave', function() {
                // Hapus marker ketika kursor keluar
                markers.forEach(function(marker) {
                    map.removeLayer(marker);
                });
                markers = [];
            });
        });
    </script>
</body>

</html>