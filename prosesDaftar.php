<?php
    $conn = mysqli_connect("localhost", "root", "","db_olshop");

    function db_olshop($data) {
        global $conn;
        $password = md5 ($_POST["password"]);

        $nama = mysqli_real_escape_string($conn, $data["name"]);
        $username = mysqli_real_escape_string($conn, $data["username"]);
        $password = mysqli_real_escape_string($conn, $data["pass"]);
        $email = strtolower(stripcslashes($data["email"]));
        $alamat = mysqli_real_escape_string($conn, $data["alm"]);
        $noTelp = mysqli_real_escape_string($conn, $data["telp"]);
        $level = mysqli_real_escape_string($conn, $data["user_type"]);

        mysqli_query($conn, "INSERT INTO login VALUES ('','$nama', '$username', '$password', '$telp','$email','$alamat','$level')");
        return mysqli_affected_rows($conn);
    }
?>
<?php
    require 'prosesDaftar.php';
    if(isset($_POST["signup"])) {
        if(db_olshop($_POST) > 0) {
            echo "<script>alert('Akun berhasil dibuat..'); window.location.href='login.php';</script>";
        } else {
            echo "<script> alert ('Daftar akun Gagal');
            </script>";
        }
    }
?>