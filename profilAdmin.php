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

    $query = mysqli_query($connect, "SELECT * FROM login WHERE id = '".$_SESSION['id']. "' ");
    $d = mysqli_fetch_array($query);
    
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
        <link href="fontawesome/css/fontawesome.min.css" rel="stylesheet">
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
                                    <a class="nav-link" href="#keranjang">profil</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
        </section>
        <!-- content profil -->
        <div class="section mt-5">
            <div class="profil">
                <h4><b><i class="fa-solid fa-user"></i> Profil Admin</b></h4>
                <div class="box-profil">
                    <form action="" method="POST">
                        <p>
                            <label class="mb-1">Nama Lengkap : </label>
                            <input type="text" name="name" placeholder="Nama Lengkap" class="input-control " value="  <?php echo$d['name'] ?>"required>
                        </p>
                        <p>
                            <label class="mb-1">Username : </label>
                            <input type="text" name="username" placeholder="Username" class="input-control " value="  <?php echo$d['username'] ?>" required >
                        </p>
                        <p>
                            <label class="mb-1">Nomor Telepon : </label>
                            <input type="text" name="telp" placeholder="No Telpon" class="input-control " value="  <?php echo$d['telp'] ?>" required >
                        </p>
                        <p>
                            <label class="mb-1">Email : </label>
                            <input type="text" name="email" placeholder="email" class="input-control " value="  <?php echo$d['email'] ?>" required >
                        </p>
                        <p>
                            <label class="mb-1">Alamat : </label>
                            <input type="text" name="alamat" placeholder="alamat" class="input-control " value="  <?php echo$d['address'] ?>" required >
                        </p>
                        <input type="submit" name="submit" value="Ubah Profil" class="btn btn-primary btn-sm">
                    </form>
                    <?php
                        if(isset($_POST['submit'])){
                            $nama     = ucwords($_POST['name']);
                            $username = $_POST['username'];
                            $telp     = $_POST['telp'];
                            $email    = $_POST['email'];
                            $alamat   = $_POST['alamat'];

                            $update = mysqli_query($connect, "UPDATE login SET
                            name = '".$nama."',
                            username = '".$username."',
                            telp = '".$telp."',
                            email = '".$email."',
                            address = '".$alamat."'
                            WHERE id = '".$d['id']."'
                            ");

                            if($update){
                                echo '<script> alert("Ubah data berhasil") </script>';
                                echo '<script> window.location="profilAdmin.php" </script>';
                            } else {
                                echo 'Gagal '. mysqli_error($connect);
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- content password -->
        <div class="section mt-5">
            <div class="profil">
                <h4><b>Ubah Password</b></h4>
                <div class="box-profil">
                    <form action="" method="POST">
                        <input type="password" name="pass1" placeholder="Password baru" class="input-control"required>
                        <input type="password" name="pass2" placeholder="Konfirmasi Password baru" class="input-control"required>
                        <input type="submit" name="ubah_password" value="Ubah Password" class="btn btn-primary btn-sm">
                    </form>
                    <?php
                        if(isset($_POST['ubah_password'])){
                            $pass1     = $_POST['pass1'];
                            $pass2     = $_POST['pass2'];

                            if($pass2 != $pass1) {
                                echo '<script> alert("Konfirmasi Password Baru Tidak sesuai") </script>';
                            } else {
                                $u_pass = mysqli_query($connect, "UPDATE login SET
                                password = '".MD5($pass1)."'
                                WHERE id = '".$d['id']."'");

                                if($u_pass) {
                                    echo '<script> alert("Ubah data berhasil") </script>';
                                    echo '<script> window.location="profilAdmin.php" </script>';
                                } else {
                                    echo 'Gagal '. mysqli_error($connect);
                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-primary" type="button">
              <a href="logout.php" style="text-decoration: none; color: white;">Logout</a>
            </button>
        </div>
        <!-- footer -->
        <footer>
            <p class="mt-5 mb-3 text-muted text-center">&copy; Tugas Besar Desain Pemrograman Web 2022-<?= date('Y') ?></p>
        </footer>
        <script src="fontawesome/js/all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    </body>
</html>