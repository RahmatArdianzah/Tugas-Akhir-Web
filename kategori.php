<!doctype html>
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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link href="fontawesome/css/fontawesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="admin.css">
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
        <div class="section mt-5">
            <div class="container">
                <h3><b><i class="fa-solid fa-align-justify text-black-50"></i> Data Kategori</b></h3>
                <table class="table table-success table-striped" >
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $kategori = mysqli_query($connect, "SELECT * FROM category ORDER BY category_id DESC");
                            while($row = mysqli_fetch_array($kategori)){ 
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td>
                                <a href="edit-kategori.php?id=<?php echo $row['category_id']; ?>" style="text-decoration:none;" class="text-dark">Edit</a> || <a href="
                                proses-hapus.php?idk=<?php echo $row['category_id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus ?')" style="text-decoration:none;" class="text-dark">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <p><a href="tambah-kategori.php" style="text-decoration:none;" class="text-white btn btn-primary btn-sm">Tambah Data</a></p>
            </div>
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