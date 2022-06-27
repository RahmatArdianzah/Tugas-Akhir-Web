<html>
    <head>
        <title>LOGIN PAGE</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="generator" content="Jekyll v4.1.1">
        <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">
        <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        <style>
            *{
                font-family: 'Poppins', sans-serif;
            }
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                font-size: 3.5rem;
                }
            }
        </style>
        <!-- Custom styles for this template -->
        <link href="assets/dist/css/floating-labels.css" rel="stylesheet">
    </head>
    <body>
        <?php
            if (isset($_GET["error"])){
                $error = $_GET["error"];
            } else {
                $error = "";
            }
            if ($error == "gagal"){
                echo "<script> alert ('login akun Gagal');
                </script>";
            }
        ?>
        <form class="form-signin" action="prosesLogin.php" method="POST">
            <div class="text-center mb-4">
                <h1 class="h3 mb-3 font-weight-normal"><b>Form Login</b></h1>
                <p>Masukkan Username dan Password anda dengan Benar!</p>
            </div>
            <div class="form-label-group">
                <input type="text" class="form-control" name="username" placeholder="Masukkan Username Anda!" required autofocus>
                <label>Masukkan Username Anda!</label>
            </div>

            <div class="form-label-group">
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda!" required>
                <label>Masukkan Password Anda!</label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
            <p class="mt-3">
                Belum punya akun ?
                <button type="button" class="btn btn-primary btn-sm">
                    <a href="daftar.php" style="text-decoration: none; color: white;">Daftar disini</a>
                </button>
            </p>
            <p class="mt-5 mb-3 text-muted text-center">&copy; Tugas Besar Desain Pemrograman Web 2022-<?= date('Y') ?></p>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    </body>
</html>