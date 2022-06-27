<?php
    session_start();
    include 'myconnection.php';
    $username = $_SESSION['username'];
    $level = $_SESSION['level'];

    if(!empty($username) && ($level == 'user')){

    }else{
        header('location:login.php');
    }
?>
<!DOCTYPE html>
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
            .kategori {
                text-align: center;
            }
            .kotak {
                border: solid;
            }
            .summary-kategori {
                background-color:#1F9DBF;
                border-radius: 15px;
            }
            .footer {
                padding : 25px 0;
                background-color : #333;
                color : #fff;
            }
            .featurette-divider {
                margin: 5rem 0; /* Space out the Bootstrap <hr> more */
            }
            .featurette-heading {
                letter-spacing: -.05rem;
            }
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }
            .box-profil {
                padding: 15px;
                box-sizing: border-box;
            }
            .box {
                background-color: #fff;
                border: 1px solid #ddd;
                padding : 15px;
                box-sizing : border-box;
                margin : 10px 0;
            }
            .box:after {
                content : '';
                display : block;
                clear : both;
            }
            .col-4 {
                width :25%;
                height : 400px;
                border : 1px solid #ccc;
                float : left;
                padding : 10px;
                box-sizing : border-box;
                margin-bottom : 10px;
            }
            @media only screen and (min-width: 768px) {
                .con-kat {
                    margin-bottom: 50px;
                }
            
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
                            <li class="nav-item">
                                <a class="nav-link" href="viewCart.php">
                                    <span class="badge text-black">
                                        <?php echo count($_SESSION['cart']); ?>
                                    </span> 
                                        Cart 
                                    <span class="glyphicon glyphicon-shopping-cart"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>
        <section>
            <div class="container">
                <form method="POST" action="save_cart.php">
                    <table class="table table-success table-striped mt-5">
                        <thead>
                            <th></th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody>
                        <?php
                            //initialize total
                            $total = 0;
                                if(!empty($_SESSION['cart'])){
                                //connection
                                $connect = new mysqli('localhost', 'root', '', 'db_olshop');
                                //create array of initail qty which is 1
                                $index = 0;
                                if(!isset($_SESSION['qty_array'])){
                                    $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
                                }
                                $sql = "SELECT * FROM product WHERE product_id IN (".implode(',',$_SESSION['cart']).")";
                                $query = $connect->query($sql);
                                    while($row = $query->fetch_assoc()){
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="deleteCart.php?id=<?php echo $row['product_id']; ?>&index=<?php echo $index; ?>" class="btn btn-danger btn-sm"><span class="fa-solid fa-trash"></span></a>
                                            </td>
                                            <td><?php echo $row['product_name']; ?></td>
                                            <td>Rp. <?php echo number_format($row['product_price'], 2); ?></td>
                                            <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
                                            <td><input type="text" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>"></td>
                                            <td>Rp. <?php echo number_format($_SESSION['qty_array'][$index]*$row['product_price'], 2); ?></td>
                                            <?php $total += $_SESSION['qty_array'][$index]*$row['product_price']; ?>
                                        </tr>
                                        <?php
                                        $index ++;
                                    }
                                }
                                else{
                                    ?>
                                    <tr>
                                        <td colspan="4" class="text-center">No Item in Cart</td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            <tr>
                                <td colspan="4" align="right"><b>Total</b></td>
                                <td><b>Rp. <?php echo number_format($total, 2); ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="tampil_produk.php" class="btn btn-secondary"><span class="fa-solid fa-arrow-left"></span> Back</a>
					<button type="submit" class="btn btn-secondary" name="save">Save Changes</button>
					<a href="clearCart.php" class="btn btn-secondary"><span class="fa-solid fa-trash">"></span> Clear Cart</a>
					<a href="checkout.php" class="btn btn-secondary" onclick="return confirm('Apakah anda yakin ingin melanjutkan pesanan ?')"><span class="fa-solid fa-circle-check">"></span> Checkout</a>
				</form>
            </div>
        </section>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        
        <!-- footer -->
        <div class="footer">
            <div class="container">
                <h6>Alamat</h6>
                <h6>Perum. Kahuripan Mas Blok AC 54-55, Bogor</h6><br>
                <h6>Email</h6>
                <h6>thriftshop@gmail.com</h6><br>
                <h6>No. Hp</h6>
                <h6>0812-8173-4072</h6><br>
                <p class="float-end"><a href="#" style="text-decoration: none; color: white;">Back to top</a></p>
                <p>&copy; Tugas Besar Desain Pemrograman Web 2022-<?= date('Y') ?></p>
            </div>
        </div>  
        <script src="fontawesome/js/all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    </body>
</html>