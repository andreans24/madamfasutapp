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
