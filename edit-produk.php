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

    $produk = mysqli_query($connect, "SELECT * FROM product WHERE product_id = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);
    
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
        <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
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
                <h4><b>Edit Data Produk</b></h4>
                <div class="box-profil">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <select name="kategori" class="input-control" required>
                            <option value="">-- Pilih kategori --</option>
                            <?php
                                $kategori = mysqli_query($connect, "SELECT * FROM category ORDER BY category_id DESC");
                                 while($r = mysqli_fetch_array($kategori)) {
                            ?>
                                <option value="<?php echo $r['category_id'] ?>" <?php echo ($r['category_id'] == $p->category_id)? 
                                'selected':''; ?>><?php echo $r['category_name'] ?></option>
                            <?php } ?>
                        </select>
                        <input type="text" name="name" class="input-control" placeholder="Nama Produk" value="<?php echo $p->product_name ?>" required>
                        <input type="text" name="harga" class="input-control" placeholder="Harga Produk" value="<?php echo $p->product_price ?>" required>
                        <input type="text" name="deskripsi" class="input-control" placeholder="Deskripsi Produk" value="<?php echo $p->product_description ?>" required><br>
                        
                        <img src="produk/<?php echo $p->product_image ?>" width="100px">
                        <input type="hidden" name="foto" value="<?php echo $p->product_image ?>">
                        <input type="file" class="form-control mb-3" name="gambar" aria-label="Example text with button addon" aria-describedby="button-addon1" style="border-radius: 0;">
                        <select name="status" class="input-control">
                            <option value="">-- Pilih --</option>
                            <option value="1" <?php echo ($p->product_status == 1)? 'selected':''; ?>>Aktif</option>
                            <option value="0" <?php echo ($p->product_status == 0)? 'selected':''; ?>>Tidak Aktif</option>
                        </select>
                        <input type="submit" name="submit" value="Tambah" class="text-white btn btn-primary btn-sm">
                    </form>
                    <?php
                        if(isset($_POST['submit'])) {
                            $kategori  = $_POST['kategori'];
                            $name      = $_POST['name'];
                            $harga     = $_POST['harga'];
                            $deskripsi = $_POST['deskripsi'];
                            $status    = $_POST['status'];
                            $foto      = $_POST['foto'];

                            
                            $filename = $_FILES['gambar']['name'];
                            $tmp_name = $_FILES['gambar']['tmp_name'];

                            if($filename != '') {
                                $type1 = explode('.', $filename);
                                $type2 = $type1[1];

                                $newname = 'produk'.time().'.'.$type2;
                                $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                                if(!in_array($type2, $tipe_diizinkan)){
                                    echo '<script> alert("Format file tidak diizinkan") </script>';
                                } else {
                                    unlink('./produk/'.$foto);
                                    move_uploaded_file($tmp_name, './produk/'.$newname);
                                    $namagambar = $newname;
                                }
                            } else {
                                $namagambar = $foto;
                            }
                            $update = mysqli_query($connect, "UPDATE product SET
                                category_id         = '".$kategori."',
                                product_name        = '".$name."',
                                product_price       = '".$harga."',
                                product_description = '".$deskripsi."',
                                product_image       = '".$namagambar."',
                                product_status      = '".$status."'
                                WHERE product_id    = '".$p->product_id."'
                            ");
                            if($update){
                                echo '<script> alert("Edit Produk Berhasil") </script>';
                                echo '<script> window.location="produk.php" </script>';
                            } else {
                                echo '<script> alert("Gagal") </script>'.mysqli_error($connect);
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