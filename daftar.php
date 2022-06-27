<?php
    $connect = mysqli_connect("localhost", "root", "","db_olshop");
    if(isset($_POST["signup"])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $level = $_POST['user_type'];

        mysqli_query($connect, "INSERT INTO login VALUES ('','$name', '$username', '$password', '$telp','$email','$alamat','$level')");
        if(($_POST) > 0) {
            echo "<script>alert('Akun berhasil dibuat..'); window.location.href='login.php';</script>";
        } else {
            echo "<script> alert ('Daftar akun Gagal');
            </script>";
        }
        
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Daftar</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <style>
            *{
                font-family: 'Poppins', sans-serif;
            }
        </style>
    </head>
    <body style="background-color: #f5f5f5;">
        <div class="container">
            <form class="row g-3" action="" method="POST">
                <div class="text-center">
                    <h1 class="h3 font-weight-normal mt-5"><b>Daftar Akun</b></h1>
                </div>
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Nama</label>
                    <input type="name" name="name"class="form-control" id="inputName" required>
                </div>
                <div class="col-md-6">
                    <label for="Username" class="form-label">Username</label>
                    <input type="username" name="username" class="form-control" id="inputUsername" required>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword4" required>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail4" required>
                </div>
                <div class="col-md-6">
                    <label for="inputAddress" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="inputAddress" required>
                </div>
                <div class="col-md-6">
                    <label for="inputText" class="form-label">No Telpon</label>
                    <input type="telp" name="telp" class="form-control" id="inputText" required>
                </div>
                <div class="col-md-">
                    <select name="user_type" class="box" type="level">
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
                <div class="col-12">
                    <input type="submit" class="btn btn-primary" id="signup" name="signup" value="Register">
                </div>
                <p class="mt-3">
                    Sudah Punya Akun ?
                    <button type="button" class="btn btn-primary btn-sm">
                        <a href="login.php" style="text-decoration: none; color: white;">Login</a>
                    </button>
                </p>
                <p class="mt-5 mb-3 text-muted text-center">&copy; Tugas Besar Desain Pemrograman Web 2022-<?= date('Y') ?></p>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>