<!doctype html>
<?php
    include 'myconnection.php';

    $produk = mysqli_query($connect, "SELECT * FROM product WHERE product_id = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);

    $kategori = mysqli_query($connect, "SELECT * FROM category WHERE category_id = '".$_GET['id']."' ");
    $kat = mysqli_fetch_object($kategori);
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
            .footer {
                padding : 25px 0;
                background-color : #333;
                color : #fff;
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
                        </ul>
                    </div>
                </div>
            </nav>
        </section>
        <!-- detail.produk -->
        <section>
            <div class="container mt-5">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="produk/<?php echo $p->product_image ?>" class="img-fluid rounded-start" width="100%">
                        </div>
                        <div class="col-md-8 mt-5" >
                            <div class="card-body">
                                <h3 class="card-title" name="nama-brg"> <b><?php echo $p->product_name ?></b> </h3><br>
                                <p class="card-text">Deskripsi : <br>
                                    <?php echo $p->product_description ?>
                                </p>
                                <h4 style="color: #C41E1E;" name="harga">Rp. <?php echo number_format($p->product_price)?></h4>
                                <!--<input class="inputan" type="number" name="jumlah" placeholder="Jumlah" style="margin-top: 25px;"><br>
                                 <button type="button" class="btn btn-primary btn-sm" style="margin-top: 10px;" name="hitung"> 
                                    <a href="beli.php?id" style="text-decoration: none; color: white;">Beli</a>
                                </button>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <!-- footer -->
        <div class="footer">
            <div class="container">
                <h6>Alamat</h6>
                <h6>Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141</h6><br>
                <h6>Email</h6>
                <h6>thriftshop@gmail.com</h6><br>
                <h6>No. Hp</h6>
                <h6>0813-1111-2022</h6><br>
                <p class="float-end"><a href="#" style="text-decoration: none; color: white;">Back to top</a></p>
                <p>&copy; Tugas Besar Desain Pemrograman Web 2022-<?= date('Y') ?></p>
            </div>
        </div>  
        <script src="fontawesome/js/all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    </body>
</html>