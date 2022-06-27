<!doctype html>
<?php
    session_start();
    include 'myconnection.php';
    $queryKategory = mysqli_query($connect, "SELECT * FROM category");
    $jumlahKategory = mysqli_num_rows($queryKategory);
    
    $queryKategoryp = mysqli_query($connect, "SELECT * FROM product");
    $jumlahKategoryp = mysqli_num_rows($queryKategoryp);

    $username = $_SESSION['username'];
    $level = $_SESSION['level'];
    if(!empty($username) && ($level == 'admin')){

    }else{
        header('location:login.php');
    }
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link href="fontawesome/css/fontawesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="web.css">
        <script src="fontawesome/js/fontawesome.min.js"></script>
        <title>TUBES | Thrift Shop</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <style>
            .kotak {
                border: solid;
            }
            .summary-kategori {
                background-color:#1F9DBF;
                border-radius: 15px;
            }
        </style>
    </head>
    <body>
        <!-- header -->
        <section class="shadow-sm sticky-top bg-white">
            <nav class="container navbar navbar-expand-lg bg-white">
                <div class="container-fluid">
                <a class="nav-logo navbar-brand" href="homeCRUD.php"><b>| Thrift Shop |</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-right navbar-nav ml-auto" style="text-transform: uppercase;">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="homeCRUD.php">dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="kategori.php">category</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="produk.php">product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profilAdmin.php">profil</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>
        <!-- content -->
        <section>
            <div class="container mt-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <i class="fa-solid fa-house"></i> Home
                        </li>
                    </ol>
                </nav>
                <h2><b>Halo <?php echo $_SESSION['name']; ?></b></h2>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12 mb-3">
                            <div class="summary-kategori p-3">
                                <div class="row">
                                    <div class="col-6">
                                        <i class="fa-solid fa-align-justify fa-5x text-black-50"></i>
                                    </div>
                                    <div class="col-6 text-white">
                                        <h3 class="fs-2">Kategori</h3>
                                        <p class="fs-4"><?php echo $jumlahKategory; ?> Kategori</p>
                                        <a href="kategori.php" class="text-white" style="text-decoration:none;">Lihat detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 mb-3">
                            <div class="summary-kategori p-3">
                                <div class="row">
                                    <div class="col-6">
                                        <i class="fas fa-box fa-5x text-black-50"></i>
                                    </div>
                                    <div class="col-6 text-white">
                                        <h3 class="fs-2">Produk</h3>
                                        <p class="fs-4"><?php echo $jumlahKategoryp; ?> Macam</p>
                                        <a href="produk.php" class="text-white" style="text-decoration:none;">Lihat detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- footer -->
        <footer>
            <p class="mt-5 mb-3 text-muted text-center">&copy; Tugas Besar Desain Pemrograman Web 2022-<?= date('Y') ?></p>
        </footer>
        <script src="fontawesome/js/all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    </body>
</html>