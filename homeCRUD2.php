<!doctype html>
<?php
    session_start();
    include 'myconnection.php';
    //initialize cart if not set or is unset
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }

    //unset qunatity
    unset($_SESSION['qty_array']);
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="web.css">
        <link href="carousel.css" rel="stylesheet">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">
        <title>TUBES | Thrift Shop</title>
        <link href="fontawesome/css/fontawesome.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <style>
            *{
                font-family: 'Poppins', sans-serif;
            }
            .kategori {
                text-align: center;
            }
            .kotak {
                border: solid;
            }
            .footer {
                padding : 25px 0;
                background-color : #333;
                color : #fff;
            }
            .featurette-divider {
                margin: 5rem 0; /* Space out the Bootstrap <hr> more */
            }
            .featurette-heading {
                letter-spacing: -.05rem;
            }
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }
            
        </style>
    </head>
    <body>
        <!-- header -->
        <section class="shadow-sm sticky-top bg-white">
            <div class="bg-light">
                <div class="container">
                    <div class="nav-atas ml-auto bg-light">
                        <p><a href="login.php" style="text-decoration:none; color:black; margin-left:970px;">Masuk | <a href="daftar.php" style="text-decoration:none; color:black;" >Daftar</a></a></p>
                    </div>
                </div>
            </div>
            <nav class="container navbar navbar-expand-lg bg-white">
                <div class="container-fluid">
                <a class="nav-logo navbar-brand" href="homeCRUD2.php"><b>| Thrift Shop |</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-right navbar-nav ml-auto" style="text-transform: uppercase;">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="homeCRUD2.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="tampil_produk.php">products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profilUser.php">account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="viewCart.php">
                                    <span class="badge text-black">
                                        <?php echo count($_SESSION['cart']); ?>
                                    </span> 
                                        Cart 
                                    <span class="glyphicon glyphicon-shopping-cart"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>
        <!-- banner -->
        <section>
            <div class="container mt-4">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner" style="border-radius: 20px;">
                        <div class="carousel-item active">
                            <button type="button" class="btn btn-light btn-sm position-absolute"
                            style="margin-left: 45.3%;
                            margin-top: 26%;">
                               <a href="#conn-produk" style="text-decoration: none; color: black;">SHOP NOW</a> 
                            </button>
                            <img src="img/baner.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/baner2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/baner3.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>
        <div class="container">
            <hr class="featurette-divider">
            <p>
                <h3 style="text-align: center;"><b>THRIFT SHOP <br> THE BEST ONLINE SHOP</b></h3><br>
                <span>
                    <h6 style="text-align: center;">Thrift Shop merupakan toko online yang bergerak dibidang pakaian yang memudahkan pembeli
                        untuk berbelanja tanpa perlu datang ke tokonya langsung. disini kami menjual berbagai macam
                        pakaian mulai dari baju, celana,jaket sampai sepatu. <a href="about-us.php" style = "text-decoration : none; color: black;">Lihat selengkapnya</a>
                    </h6>
                </span>
            </p>
            <hr class="featurette-divider">
        </div>
        <!-- foto produk -->
        <section class="konten">
            <div class="container" id="conn-produk">
                <h3 style="text-align: center;" class = "mb-3"><b>Produk Terbaru</b></h3>
                <div class="row">
                    <?php 
                        $produk = mysqli_query($connect, "SELECT * FROM product ORDER BY product_id DESC LIMIT 4");
                        
                        if(mysqli_num_rows($produk) > 0) {
                            while($p = mysqli_fetch_array($produk)) {
                    ?>
                    <div class="col-md-3" style="margin-bottom : 20px;">
                            <div class="card">
                                <img src="produk/<?php echo $p['product_image'] ?>" class="card-img-top" width="100%">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $p['product_name'] ?></h5>
                                    <p class="card-text">Rp. <?php echo $p['product_price'] ?></p>
                                    <a href="detail-produk.php?id=<?php echo $p['product_id'] ?>" class="btn btn-secondary btn-sm">Lihat</a>
                                </div>
                            </div>
                        </div>
                    <?php }} else { ?>
                        <p>Produk Tidak ada</p>
                    <?php } ?>
                </div>
            </div>
        </section>
        <div class="container">
            <hr class="featurette-divider">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading fw-normal lh-1">Coming Soon ! <br><span class="text-muted"></span></h2>
                        <p class="lead text-muted">Blouse wanita dengan motif polkadot, cocok untuk anda yang suka dengan style korea</p>
                    </div>
                    <div class="col-md-5">
                        <img src="img/Blouse_wanita.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto shadow-sm" width="500" height="500" style="border-radius: 20px; border: 1px solid #ddd;">
                    </div>
                </div>
            <hr class="featurette-divider">
        </div>
        <div class="container">
                <div class="row featurette">
                    <div class="col-md-5">
                        <img src="img/hodi.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto shadow-sm" width="500" height="500" style="border-radius: 20px; border: 1px solid #ddd;">
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading fw-normal lh-1">Weekly <br> Recommendation !<br><span class="text-muted"></span></h2>
                        <p class="lead text-muted">Hoodie pria dengan bahan yang tebal sangat cocok untuk musim dingin seperti sekarang dan membuat anda semakin macooo</p>
                    </div>
                </div>
            <hr class="featurette-divider">
        </div>
        <!-- footer -->
        <div class="footer">
            <div class="container">
                <h6>Alamat</h6>
                <h6>Perum. Kahuripan Mas Blok AC 54-55, Bogor</h6><br>
                <h6>Email</h6>
                <h6>thriftshop@gmail.com</h6><br>
                <h6>No. Hp</h6>
                <h6>0812-8173-4072</h6><br>
                <p class="float-end"><a href="#" style="text-decoration: none; color: white;">Back to top</a></p>
                <p>&copy; Tugas Besar Desain Pemrograman Web 2022-<?= date('Y') ?></p>
            </div>
        </div> 
        <script src="fontawesome/js/all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    </body>
</html>