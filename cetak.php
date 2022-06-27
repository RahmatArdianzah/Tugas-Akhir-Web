<?php
	session_start();
    include 'myconnection.php';
	//initialize cart if not set or is unset
    if(!isset($_SESSION['cart'])){
	    $_SESSION['cart'] = array();
    }

	//unset qunatity
    $query = mysqli_query($connect, "SELECT * FROM login WHERE id = '".$_SESSION['id']. "' ");
    $d = mysqli_fetch_array($query);

    $username = $_SESSION['username'];
    $level = $_SESSION['level'];

    if(!empty($username) && ($level == 'user')){

    }else{
        header('location:login.php');
    }

?>
<html>
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
    </head>
    <body>
    <section class="konten">
            <div class="container">
                <div class="box mt-5  mb-5 bg-body rounded">
                    <h4 style="text-align : center; margin-top : 18px;"><b>--------------- INVOICE ---------------</b></h4><br><br>
                    <h6 style="margin-left : 20px; margin-top : 15px;">Terimakasih sudah berbelanja di toko kami</h6>
                    <p>
                        <div class="container">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;<span><?php echo $d['name'] ?></span></li>
                                <li class="list-group-item">Username &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;<span><?php echo$d['username'] ?></span></li>
                                <li class="list-group-item">No Telpon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;<span><?php echo$d['telp'] ?></span></li>
                                <li class="list-group-item">Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;<span><?php echo$d['address'] ?></span></li>
                                
                            </ul>
                        </div>
                    </p>
                    <table class="table table-light table-striped mt-5 border-dark">
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
                                            <td></td>
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
                    <a href="checkout.php" class="btn btn-secondary"><span class="fa-solid fa-arrow-left"></span> Back</a>
                </div>
            </div>
        </section>
            <script src="fontawesome/js/all.min.js"></script>
        <script>
            window.print(); 
        </script>
    </body>
</html>