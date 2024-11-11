// Pengaturan script map 
// Inisialisasi peta
var map = L.map('map').setView([-2.5489, 118.0149], 5); // Fokus ke Indonesia

// Tambahkan tile layer dari OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 55,
    attribution: '© OpenStreetMap'
}).addTo(map);

// Untuk ganti ikon marker baru
const customIcon = L.icon({
    iconUrl: 'img/marker2.png', // Ganti dengan path ke ikon marker Anda
    iconSize: [38, 42], // Ukuran ikon
    iconAnchor: [12, 41], // Titik anchor dari ikon
    popupAnchor: [1, -34], // Titik popup anchor
});

// Variabel untuk menyimpan marker
var markers = [];

// Koordinat untuk setiap regional
const regionalLocations = {
    '1': [
        { lat: 1.6852756820161394, lng: 101.45801366487869, name: "Dumai" },
        { lat: 0.85950, lng: 104.61008, name: "Tanjung Pinang" },
        { lat: 0.53969, lng: 101.44359, name: "PekanBaru" },
        { lat: 1.00057, lng: 103.44014, name: "Tanjung Balai Karimun" },
        { lat: 0.85950, lng: 104.61008, name: "Kuala Tanjung" },// ini belum nemu lat long
        { lat: 1.72971, lng: 98.78505, name: "Sibolga" },
        { lat: 2.9997542209028665, lng: 99.8145670792764, name: "Tanjung Balai Asahan" },
        { lat: -0.32651227908916114, lng: 103.16055746239877, name: "Tembilahan" },
        { lat: 1.3068235607578607, lng: 97.61075932882618, name: "Gunungsitoli" },
        { lat: 3.78405, lng: 98.68893, name: "Belawan" },
        { lat: 5.59593, lng: 95.52592, name: "Malahayati" },
    ],
    '2': [
        { lat: -2.97943, lng: 104.77687, name: "Palembang" },
        { lat: -6.10768, lng: 106.88310, name: "Tanjung Priok" },
        { lat: -5.46632, lng: 105.32054, name: "Panjang" },
        { lat: -0.01957, lng: 109.33740, name: "Pontianak" },
        { lat: -0.99603, lng: 100.37011, name: "Teluk Bayur" },
        { lat: -5.93152, lng: 105.99889, name: "Banten" },
        { lat: -3.90739, lng: 102.30530, name: "Bengkulu" },
        { lat: -6.71490, lng: 108.56959, name: "Cirebon" },
        { lat: -1.53613, lng: 103.66146, name: "Jambi" },
        { lat: -2.09939, lng: 106.13044, name: "Pangkal Balam" },
        { lat: -6.12509, lng: 106.81052, name: "Sunda Kelapa" },
        { lat: -2.74340, lng: 107.63094, name: "Tanjung Pandan" },
    ],
    '3': [
        { lat: -7.732620807179353, lng: 108.99748313770795, name: "Tanjung Intan Cilacap" },
        { lat: -6.853607276899479, lng: 109.13537633250819, name: "Tegal" },
        { lat: -6.948028120445229, lng: 110.42735957778257, name: "Tanjung Emas" },
        { lat: -7.155090875029141, lng: 112.66012720309453, name: "Gresik" },
        { lat: -7.736744624199189, lng: 113.2170782331747, name: "Tanjung Tembaga - Probolinggo" },
        { lat: -7.056177912160784, lng: 113.94246457952717, name: "Kalianget" },
        { lat: -8.12600600678743, lng: 114.39764042687126, name: "Tanjung Wangi" },
        { lat: -8.190008078751545, lng: 114.83084883781558, name: "Celukan Bawang" },
        { lat: -8.741628772238425, lng: 115.2103341175889, name: "Benoa" },
        { lat: -8.727829808664966, lng: 116.07575421602164, name: "Lembar" },
        { lat: -8.462602399261687, lng: 117.37170022576363, name: "Badas" },
        { lat: -8.448153020469054, lng: 118.71438169733295, name: "Bima" },
        { lat: -9.64236700733121, lng: 120.24937662608421, name: "Waingapu" },
        { lat: -8.854139896197298, lng: 121.66186486112977, name: "Ende - ippi" },
        { lat: -8.617842585473136, lng: 122.21822992035497, name: "Maumere" },
        { lat: -8.21907460339911, lng: 124.51824345231684, name: "Kalabahi" },
        { lat: -3.4635497929802326, lng: 115.99743515315811, name: "Batulicin" },
        { lat: -3.328675870526517, lng: 114.5596357407459, name: "Banjarmasin" },
        { lat: -2.764601598449078, lng: 114.25192470866563, name: "Pulang Pisau" },
        { lat: -2.5386748105920502, lng: 112.96405570755589, name: "Sampit" },
        { lat: -2.7393561026786157, lng: 111.7283188330866, name: "Kumai" },
        { lat: -8.466847463644617, lng: 119.92358814965738, name: "Labuan Bajo" },
        { lat: -7.198063092342046, lng: 112.73297755331832, name: "Tanjung Perak" },
        { lat: -3.2934941212880333, lng: 116.14488098771027, name: "Kotabaru" },
        { lat: -10.192422476340429, lng: 123.52889588467141, name: "Tenau Kupang" },
    ],
    '4': [
        { lat: -1.2713217361462301, lng: 116.80779953745093, name: "BalikPapan" },
        { lat: -0.5044655787940237, lng: 117.15134571148317, name: "Samarinda" },
        { lat: 0.12583829769879654, lng: 117.48445527394317, name: "Bontang" },
        { lat: 2.1709213594482835, lng: 117.49540337537404, name: "Tanjung Redeb" },
        { lat: 3.285851619949373, lng: 117.594420663666, name: "Tarakan" },
        { lat: 4.143128803663014, lng: 117.66576876069051, name: "Nunukan" },
        { lat: -4.00242517929479, lng: 119.6215274979938, name: "Pare - Pare" },
        { lat: -0.7088156747444627, lng: 119.85763246128758, name: "Pantoloan" },
        { lat: 1.0509384436737703, lng: 120.79991913679441, name: "Tolitoli" },
        { lat: 0.5151296597000999, lng: 123.06339708839525, name: "Gorontalo" },
        { lat: 1.4948436479932075, lng: 124.84015228992045, name: "Manado" },
        { lat: 0.7816790304073242, lng: 127.38814144081, name: "Ternate" },
        { lat: -3.6938955561554367, lng: 128.1781563553819, name: "Ambon" },
        { lat: -0.876707964793824, lng: 131.24720235513038, name: "Sorong" },
        { lat: -2.930941238220443, lng: 132.30497279788577, name: "Fakfak" },
        { lat: -0.8664469166877554, lng: 134.07462482116756, name: "Manokwari" },
        { lat: -1.1840876883999099, lng: 136.07609952588655, name: "Biak" },
        { lat: -2.5467573180627276, lng: 140.71306120087098, name: "Jayapura" },
        { lat: -8.478451336775972, lng: 140.393762765654, name: "Merauke" },
        { lat: 1.4432174591357239, lng: 125.19797206487272, name: "Bitung" },
        { lat: -5.120956163209325, lng: 119.40877868223508, name: "Makassar" },
        { lat: -3.973039299400753, lng: 122.58354750982411, name: "Kendari" },
    ]
};

// Tambahkan event listener ke button
document.querySelectorAll('.btn-circle').forEach(button => {
    button.addEventListener('mouseover', function () {
        const regionalId = this.getAttribute('data-regional');
        const locations = regionalLocations[regionalId];


        markers.forEach(marker => map.removeLayer(marker));
        markers = [];
        // map.setView([lat, lng], 8); // Zoom in ke marker

        // Menambahkan marker berdasarkan regional
        locations.forEach(location => {
            const marker = L.marker([location.lat, location.lng]).addTo(map)
                .bindPopup(`<b>Lokasi: </b>${location.name}`);
            markers.push(marker); // Simpan marker ke dalam array
        });
    });

    button.addEventListener('mouseout', function () {
        // Menghapus semua marker saat kursor keluar
        markers.forEach(marker => map.removeLayer(marker));
        markers = []; // Kosongkan array markers
    });
});
// Akhir Pengaturan script map 




