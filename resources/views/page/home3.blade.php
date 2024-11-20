<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Madam Fasut | Detail</title>

    <link rel="icon" type="image/png" href="{{asset('madamfasut/img/favicon.ico')}}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('madamfasut/css/style1.css') }}">

</head>

<body>
    <!-- Container -->
    <div class="container-fluid text-center p-0">
        <!-- Navbar -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-3 col-md-2 text-center">
                        <a href="{{ route('page-home1') }}">
                            <img class="img-fluid" src="{{asset('madamfasut/img/Pelindo.png')}}" alt="Logo">
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
        {{-- Content --}}
        <div class="container2 my-5">
            <div class="card2">
                <div class="card-header">
                    Header
                </div>
                <div class="card-body bg-light border">
                    <h5 class="card-title">Title</h5>
                    <p class="justify">This is a simple card example. You can add your content here.
                        Lorem
                        ipsum dolor
                        sit amet, consectetur adipisicing elit. Beatae inventore enim ducimus adipisci magni dolore
                        fugit ex accusantium, id dignissimos saepe iste, deleniti incidunt quasi sit tempora debitis
                        eaque? Eveniet explicabo adipisci delectus nihil? Eum, reprehenderit ad maiores atque possimus
                        nulla suscipit? Quaerat perspiciatis in nesciunt, quisquam nihil molestias odit neque
                        dignissimos exercitationem ipsam animi enim? Assumenda, dicta! Ipsa eaque explicabo, dignissimos
                        deserunt laboriosam hic magnam reprehenderit repellendus dicta labore sequi harum eligendi animi
                        iure quibusdam sapiente asperiores eos aperiam mollitia voluptatibus ratione et similique
                        veritatis possimus? Ex odit sed iure debitis dolores sint, autem soluta architecto nesciunt
                        dolore aliquam commodi velit molestiae numquam, labore distinctio? Quaerat quas laboriosam
                        explicabo facere, deserunt aliquid. Esse aliquam et ipsum illo facilis debitis eveniet
                        voluptatem recusandae, delectus exercitationem dolor facere beatae. Aut obcaecati soluta ab
                        necessitatibus qui perspiciatis vel dolorem molestiae et earum, autem labore sunt tenetur!
                        Consequatur ipsa illum porro? Eos numquam molestias explicabo. Facilis veritatis, dolor
                        eligendi, itaque deleniti nobis aperiam adipisci libero nihil eius voluptatum. Omnis soluta,</p>
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
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td><strong></strong></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                    <a href="#" class="btn btn-danger"><strong><i class="fa-solid fa-file-pdf"></i> Download
                            PDF</strong></a>
                </div>
            </div>
        </div>
    </div>
    {{-- Akhir Content --}}


    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>