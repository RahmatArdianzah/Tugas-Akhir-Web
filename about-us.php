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
        <div class="container mt-5">
            <div class="clearfix">
                <iframe src="https://www.google.com/maps/embed?pb=!4v1656258995472!6m8!1m7!1sI5cIr2roc1W7DbI7FImabQ!2m2!1d-6.445893391255297!2d106.9744226936607!3f191.4820566950169!4f0.24687281485782364!5f0.7820865974627469"
                width="600" height="370" style="border: 1px solid; border-radius: 15px;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" class="col-md-6 float-md-end mb-3 ms-md-3"></iframe>
                <p>
                    <span>
                        <h3><b>THRIFT SHOP</b></h3>
                        <h6 style="line-height: 23px; margin-top: 35px;">
                            <b>Thrift Shop</b> merupakan toko online yang bergerak dibidang pakaian yang memudahkan pembeli
                            untuk berbelanja tanpa perlu datang ke tokonya langsung, Toko ini memulai usaha pada bulan <b>April tahun 2022</b>. jadi masih terbilang baru merintis usaha di bidang pakaian.
                            Toko ini menjual berbagai macam pakaian mulai dari baju, celana, jaket, hingga sepatu.
                            Karena belanja online bisa dilakukan kapan saja dan dimana saja. jadi, kalian tidak perlu datang ke
                            tokonya langsung, kalian tinggal duduk santai dan pesan secara online. semua tersedia untuk anda yang
                            ingin memiliki style yang keren dan maco.
                        </h6>
                    </span>
                </p>
            </div>
            <hr class="featurette-divider">
        </div>
        <!-- <div class="container mt-5">
            <p>
                <h3 style="text-align: center;"><b>THRIFT SHOP</b></h3><br>
                <span>
                    <h6 style="text-align: center; line-height: 23px;">
                        <b>Thrift Shop</b> merupakan toko online yang bergerak dibidang pakaian yang memudahkan pembeli
                        untuk berbelanja tanpa perlu datang ke tokonya langsung, Toko ini memulai usaha pada bulan <b>April tahun 2022</b>. jadi masih terbilang baru merintis usaha di bidang pakaian.
                        Toko ini menjual berbagai macam pakaian mulai dari baju, celana, jaket, hingga sepatu.
                        Karena belanja online bisa dilakukan kapan saja dan dimana saja. jadi, kalian tidak perlu datang ke
                        tokonya langsung, kalian tinggal duduk santai dan pesan secara online. semua tersedia untuk anda yang
                        ingin memiliki style yang keren dan maco.
                    </h6>
                </span>
            </p>
            <hr class="featurette-divider">
        </div>
        <div class="container">
            <iframe src="https://www.google.com/maps/embed?pb=!4v1656258995472!6m8!1m7!1sI5cIr2roc1W7DbI7FImabQ!2m2!1d-6.445893391255297!2d106.9744226936607!3f191.4820566950169!4f0.24687281485782364!5f0.7820865974627469" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <hr class="featurette-divider">
        </div> -->
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