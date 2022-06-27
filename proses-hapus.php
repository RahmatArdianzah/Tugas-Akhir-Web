<?php
    include 'myconnection.php';
    if(isset($_GET['idk'])) {
        $delete = mysqli_query($connect, "DELETE FROM category WHERE category_id = '".$_GET['idk']."' ");
        echo '<script> window.location="kategori.php" </script>';
    }

    if(isset($_GET['idp'])) {
        $produk = mysqli_query($connect, "SELECT product_image FROM product WHERE product_id = '".$_GET['idp']."' ");
        $p = mysqli_fetch_object($produk);

        unlink('./produk/'. $p->product_image);

        $delete = mysqli_query($connect, "DELETE FROM product WHERE product_id = '".$_GET['idp']."' ");
        echo '<script> window.location="produk.php" </script>';
    }
?>