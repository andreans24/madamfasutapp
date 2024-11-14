// Pengaturan script MAP2
// Inisialisasi peta
var map2 = L.map('map2').setView([-2.5489, 118.0149], 5); // Posisi awal Jakarta (ganti sesuai kebutuhan)

// Tambahkan tile layer (layer peta dasar)
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright"> </a> Pelindo MadamFasut',
    maxZoom: 18,
}).addTo(map2);

// Lokasi target untuk setiap card
const locations = {
    1: { lat: -6.105338748694712, lng: 106.88663860075957, zoom: 15, name: 'PT JICT' }, // JICT
    2: { lat: -6.094800452733563, lng: 106.92306584048859, zoom: 15, name: 'NPCT 1' }, //NPCT1
    3: { lat: -6.103374665765472, lng: 106.8812253985955, zoom: 15, name: 'Pelabuhan Tanjung Priok' }    // pelabuhan penumpang
};

// Tambahkan marker untuk setiap lokasi
Object.keys(locations).forEach(key => {
    const location = locations[key];
    const marker = L.marker([location.lat, location.lng]).addTo(map2);
    marker.bindPopup(location.name); // Menampilkan nama lokasi ketika marker diklik
});

// Fungsi untuk berpindah dan zoom peta
function focusMap(cardNumber) {
    const location = locations[cardNumber];
    if (location) {
        map2.flyTo([location.lat, location.lng], location.zoom + 1);
    }
}

// Tambahkan event listener ke setiap card
document.querySelectorAll('.card').forEach((card, index) => {
    card.addEventListener('mouseenter', () => focusMap(index + 1, 17)); // Pindah saat hover
    card.addEventListener('click', () => focusMap(index + 1)); // Pindah saat klik
});