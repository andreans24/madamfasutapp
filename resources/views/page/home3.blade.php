<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Madam Fasut | Home</title>

    <link rel="icon" type="image/png" href="{{asset('madamfasut/img/favicon.ico')}}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="madamfasut/css/style1.css">
    <style>
        .card-header {
            cursor: pointer;
        }
    </style>
</head>

<body>

    <!-- Container -->
    <div class="container-fluid text-center p-0">
        <!-- Navbar -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-3 col-md-2 text-center">
                        <a href="index.html">
                            <img class="img-fluid" src="{{asset('madamfasut/img/Pelindo.png')}}" alt="Logo">
                        </a>
                    </div>
                    <div class="col-6 col-md-8 text-center">
                        <h1 class="font-weight-bold icon-white">Madam Fasut</h1>
                    </div>
                    <div class="col-3 col-md-2 text-center">
                        <a href="{{route('page-home2')}}">
                            <i class="fa-solid fa-backward-step fa-2x icon-white"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Navbar -->
        <h3 class="text-center" style="margin-top: 120px;">Detail Information</h3>
        <!-- Content -->
        <!-- carousel  -->
        <div class="container-fluid ">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-8">
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                        <!-- Indicators (Optional, untuk navigasi titik di bawah carousel) -->
                        <ol class="carousel-indicators">
                            <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for Slides -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://plus.unsplash.com/premium_photo-1661943810539-ae3c711e3866?q=80&w=3271&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    class="d-block" alt="Gambar 1" style="border-radius: 30px;">
                            </div>
                            <div class="carousel-item">
                                <img src="https://plus.unsplash.com/premium_photo-1661963131307-f79ad259ccfc?q=80&w=3271&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    class="d-block" alt="Gambar 2" style="border-radius: 30px;">
                            </div>
                            <div class="carousel-item">
                                <img src="https://plus.unsplash.com/premium_photo-1661875610369-7df1d816d54e?q=80&w=3433&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    class="d-block" alt="Gambar 3" style="border-radius: 30px;">
                            </div>
                        </div>

                        <!-- Controls (Optional, untuk navigasi panah kiri dan kanan) -->
                        <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- akhir carousel -->

        <!-- card -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card2">
                        <div class="card-header d-flex justify-content-between align-items-center"
                            onclick="toggleCard(this)">
                            Informasi 1
                            <span class="toggleIcon">+</span>
                        </div>
                        <div class="card-body p-3" style="display: none;">
                            <p>Ini adalah informasi detail : <br>
                                yang dapat dilihat Kamu bisa menambahkan konten lainnya
                                di sini sesuai kebutuhan.
                            </p>
                            <!-- Tambahkan tabel di sini -->
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>John Doe</td>
                                        <td>john@example.com</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jane Smith</td>
                                        <td>jane@example.com</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card2">
                        <div class="card-header d-flex justify-content-between align-items-center"
                            onclick="toggleCard(this)">
                            Informasi 2
                            <span class="toggleIcon">+</span>
                        </div>
                        <div class="card-body p-3" style="display: none;">
                            <p>Ini adalah informasi detail : <br>
                                yang dapat dilihat Kamu bisa menambahkan konten lainnya
                                di sini sesuai kebutuhan.
                            </p>
                            <!-- Tambahkan tabel di sini -->
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Alice Johnson</td>
                                        <td>alice@example.com</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Bob Brown</td>
                                        <td>bob@example.com</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Content -->

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- toggle card -->
    <script>
        // toggle card 
        function toggleCard(header) {
            const cardBody = header.nextElementSibling;
            const icon = header.querySelector('.toggleIcon'); // Menggunakan class

            if (cardBody.style.display === "none" || cardBody.style.display === "") {
                cardBody.style.display = "block";
                icon.textContent = '-'; // change to minus
            } else {
                cardBody.style.display = "none";
                icon.textContent = '+'; // change to plus
            }
        }
    </script>

    <script src="madamfasut/js/script1.js"></script>
</body>

</html>