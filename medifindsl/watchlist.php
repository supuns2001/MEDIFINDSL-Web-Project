<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watchlist | MedifindSL</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="resource/icon.png" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <?php include "heder.php";

            if (isset($_SESSION["u"])) {

            ?>

                <div class=" col-12 "> 
                    <div class="row p-4">
                        <div class="col-12  border border-1 rounded border-primary mb-2">
                            <div class="row">



                                <div class="col-12 col-lg-12">
                                    <hr />
                                </div>

                                <div class="col-12 ">
                                    <div class="row">
                                        <div class=" mx-4 col-12 col-lg-12 text-center ">
                                            <label class="form-label fw-bold fs-2"><i class="bi bi-heart text-danger fs-3 fw-bold"></i> Watch List </label>
                                        </div>

                                        <div class="col-12 ">
                                            <div class="row d-flex justify-content-end">
                                                <div class="col-12 col-lg-4">
                                                    <div class="row">
                                                        <div class="col-10 col-lg-10 text-end mt-4">
                                                            <input type="text" class="cartsearch col-11 col-lg-8 text-end" placeholder="Search to Cart.. " />
                                                        </div>

                                                        <div class="col-2 col-lg-2 ">
                                                            <i class="bi bi-search  fs-1"></i>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 ">
                                    <hr />
                                </div>

                                <div class="col-11 col-lg-2 border-0 border-end border-1 border-primary">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Watchlist</li>
                                        </ol>
                                    </nav>

                                    <nav class="nav nav-pills flex-column">
                                        <a class="nav-link active" aria-current="page" href="#">My Watchlist</a>
                                        <a class="nav-link" href="cart.php">My Cart</a>
                                    </nav>


                                </div>

                                <div class="col-12 col-lg-10">
                                    <div class="row">

                                        <?php

                                        require "connection.php";
                                        $email = $_SESSION["u"]["email"];

                                        $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $email . "' ");
                                        $watchlist_num = $watchlist_rs->num_rows;

                                        if ($watchlist_num == 0) {
                                        ?>

                                            <!-- empty view -->

                                            <div class="col-10 ">
                                                <div class="row">
                                                    <div class="col-12 watchlistimg"> </div>
                                                    <div class="col-12 text-center mb-2">
                                                        <label class="form-label fs-1 fw-bold">
                                                            You have no Items in your Watchlist yet.
                                                        </label>
                                                    </div>
                                                    <div class="offset-lg-4 col-lg-4 col-12 d-grid mb-3">
                                                        <a href="home.php" class="btn btn-outline-primary fs-3 fw-bold">Start Shopping</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- empty view -->


                                            <?php

                                        } else {

                                            for ($x = 0; $x < $watchlist_num; $x++) {
                                                $watchlist_data = $watchlist_rs->fetch_assoc();

                                            ?>

                                                <div class="col-12 col-lg-12 watchlistbg1 ">
                                                    <div class="row">

                                                    <?php

                                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$watchlist_data["product_id"]."' ");
                                                    $product_data = $product_rs->fetch_assoc();

                                                    $img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$product_data["id"]."'");
                                                    $img_num = $img_rs->num_rows;
                                                    $img_data = $img_rs->fetch_assoc();

                                                    $color_rs = Database::search("SELECT * FROM `colour` WHERE `id`='" . $product_data["colour_id"] . "'");
                                                    $color_data = $color_rs->fetch_assoc();

                                                    $seller_rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."'");
                                                    $seller_data = $seller_rs->fetch_assoc();
                                                    
                                                    ?>

                                                        <!-- have products -->

                                                        <div class="card mb-3 mx-0 mx-lg-2 mt-3 col-12 col-lg-11 border-0 shadow">
                                                            <div class="row g-0">
                                                                <div class="col-md-3">
                                                                    <img src="<?php echo $img_data["code"]; ?>" class="img-fluid rounded-start" alt="">
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title fs-3 fw-bold font2 " style="color: rgb(71, 71, 71);"><?php echo $product_data["title"]; ?></h5>
                                                                        <div class="col-12 ">
                                                                            <hr />
                                                                        </div>
                                                                        <span class="fs-5 fw-bold text-black-50">Colour : <?php echo $color_data["name"]; ?> </span>
                                                                        &nbsp; &nbsp; | &nbsp;&nbsp;
                                                                        <span class="fs-5 fw-bold text-black-50">Condition : Brandnew</span><br />
                                                                        <span class="fs-5 fw-bold text-black-50">Price :</span>&nbsp;&nbsp;
                                                                        <span class="fs-5 fw-bold text-black">RS. <?php echo $product_data["price"]; ?>.00</span><br />
                                                                        <span class="fs-5 fw-bold text-black-50">Quntity :</span>&nbsp;&nbsp;
                                                                        <span class="fs-5 fw-bold text-black"><?php echo $product_data["qty"]; ?> Items Available</span><br />
                                                                        <span class="fs-5 fw-bold text-black-50">Seller :</span><br />
                                                                        <span class="fs-5 fw-bold text-black"><?php echo $seller_data["fname"]." ".$seller_data["lname"]; ?></span><br />


                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4 mt-0 mt-lg-5 ">
                                                                    <div class="card-body col-12 col-lg-9 d-flex flex-column d-lg-grid">
                                                                        <button class=" btn btn-info rounded rounded-5 mb-2" onclick="invoiceview();"> <a href='<?php echo "singleProductview.php?id=" . $releted_pro_data["id"]; ?>' class="text-black text-decoration-none">Buy Now</a></button>

                                                                        <button class="btn btn-secondary rounded rounded-5 mb-2"onclick='addtoCart(<?php echo $product_data["id"]; ?>);'>Add to cart</button>
                                                                        <button class="watchlistbtn3 mb-2" onclick='removeFromWatchlist(<?php echo $watchlist_data["id"]; ?>);'>Remove</button>


                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>




                                                        <!-- have products -->

                                                    </div>

                                                </div>

                                        <?php


                                            }
                                        }

                                        ?>


                                    </div>
                                </div>













                            </div>
                        </div>
                    </div>
                </div>

            <?php

            } else {
                ?>
                <div class="col-12" style="height: 40vh;">
                    <div class="row d-flex justify-content-center align-items-center" style="height: 40vh;">
                            <a href="index.php" class=" shadow col-6 col-lg-3 btn btn-danger text-decoration-none fs-3 text-white fw-bold ">Please Login First</a>
                    </div>
                </div>
                <?php

                // echo ("Please Loging First");
            }

            ?>








            <?php include "footer.php"; ?>

        </div>
    </div>



    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>