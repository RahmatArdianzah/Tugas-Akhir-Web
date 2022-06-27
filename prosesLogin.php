<?php
    session_start();
    include 'myconnection.php';
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = mysqli_query($connect, "SELECT * FROM login WHERE username='$username' && password='$password'");
    $count = mysqli_num_rows($sql);
    $fetchData = mysqli_fetch_array($sql);
    if($count > 0){
        $level = $fetchData['level'];
        $_SESSION['id'] = $fetchData['id'];
        $_SESSION['name'] = $fetchData['name'];
        $_SESSION['username'] = $fetchData['username'];
        $_SESSION['telp'] = $fetchData['telp'];
        $_SESSION['email'] = $fetchData['email'];
        $_SESSION['address'] = $fetchData['address'];
        if($level == 'admin'){
            $_SESSION['username'] = $username;
            $_SESSION['level'] = $level;
            header('location:homeCRUD.php');
        }else if($level == 'user'){
            $_SESSION['username'] = $username;
            $_SESSION['level'] = $level;
            header('location:homeCRUD2.php');
        }
    }else{
        echo '<script> alert("Username dan Password yang Anda masukan salah") </script>';
        echo '<script> window.location="login.php" </script>';
    }
?>