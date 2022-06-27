<!DOCTYPE html>
<?php
    session_start();
    include 'myconnection.php';
    $username = $_SESSION['username'];
    $level = $_SESSION['level'];

    if(!empty($username) && ($level == 'admin')){

    }else{
        header('location:login.php');
    }

    
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="admin.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <title>TUBES | Thrift Shop</title>
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
        <!-- content profil -->
        <div class="section mt-5">
            <div class="profil">
                <h4><b>Tambah Data Kategori</b></h4>
                <div class="box-profil">
                    <form action="" method="POST">
                        <input type="text" name="name" placeholder="Nama Kategori" class="input-control " required>
                        <input type="submit" name="submit" value="Tambah" class="text-white btn btn-primary btn-sm">
                    </form>
                    <?php
                        if(isset($_POST['submit'])) {
                            $nama = ucwords($_POST['name']);
                            $insert = mysqli_query($connect, "INSERT INTO category VALUES (
                                '','".$nama."'
                            )");

                            if($insert){
                                echo '<script> alert("Tambah Berhasil") </script>';
                                echo '<script> window.location="kategori.php" </script>';
                            } else {
                                echo 'Tambah data gagal, Coba lagi' . mysqli_error($connect);
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- footer -->
        <footer>
            <p class="mt-5 mb-3 text-muted text-center">&copy; Tugas Besar Desain Pemrograman Web 2022-<?= date('Y') ?></p>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    </body>
</html>