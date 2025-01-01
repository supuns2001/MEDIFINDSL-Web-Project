<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | MedifindSL</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="resource/icon.png" />
</head>

<body>
    <div class="container-fluid">
        <div class="col-12">
            <div class="row">
                <?php include "heder.php";

                require "connection.php";

                if (isset($_SESSION["u"])) {

                    $email = $_SESSION["u"]["email"];

                    $total = 0;
                    $subTotal = 0;
                    $shipping = 0;

                ?>

                    <div class="col-12 boder border-1 border-primary rounded mb-3">
                        <div class="row ">

                            <div class="col-12 text-center mt-3 ">
                                <label class="form-label fs-1  fw-bolder"><i class="bi fw-bold bi-bag"></i> My Cart</label>
                            </div>



                            <div class="col-12  ">
                                <div class="row d-flex justify-content-end">
                                    <div class="col-12 col-lg-4">
                                        <div class="row">
                                            <div class="col-10 col-lg-10 text-end mt-3">
                                                <input type="text" class="cartsearch text-end" placeholder="Search to Cart.. " />
                                            </div>

                                            <div class="col-2 col-lg-2">
                                                <i class="bi bi-search  fs-1"></i>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>

                            <div class="col-12">
                                <hr />
                            </div>

                            <?php

                            $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "' ");
                            $cart_nm = $cart_rs->num_rows;

                            if ($cart_nm == 0) {
                            ?>

                                <!-- empty view -->

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 emptyCart"> </div>
                                        <div class="col-12 text-center mb-2">
                                            <label class="form-label fs-1 fw-bold">
                                                You have no Items in your Cart yet.
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

                            ?>

                                <!-- products -->

                                <div class="mx-lg-5 col-12 col-lg-8 shadow ">
                                    <div class="row ">

                                        <?php

                                        for ($x = 0; $x < $cart_nm; $x++) {
                                            $cart_data = $cart_rs->fetch_assoc();

                                            $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cart_data["product_id"] . "' ");
                                            $product_data = $product_rs->fetch_assoc();

                                            $total = $total + ($product_data["price"] * $cart_data["qty"]);

                                            $address_rs = Database::search("SELECT district.id AS did FROM `user_has_address` INNER JOIN `city` ON
                                            user_has_address.city_id=city.id INNER JOIN `district` ON city.district_id=district.id WHERE `user_email`='" . $email . "' ");

                                            $address_data = $address_rs->fetch_assoc();

                                            $ship = 0;



                                            $color_rs = Database::search("SELECT * FROM `colour` WHERE `id`='" . $product_data["colour_id"] . "'");
                                            $color_data = $color_rs->fetch_assoc();

                                            if ($address_data["did"] == 3) {
                                                $ship = $product_data["delivery_fee_colombo"];
                                                $shipping = $shipping +   $ship;
                                            } else {
                                                $ship = $product_data["delivery_fee_other"];
                                                $shipping = $shipping +  $ship;
                                            }

                                            $seller_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $product_data["user_email"] . "'");
                                            $seller_data  = $seller_rs->fetch_assoc();

                                            $img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                                            $img_num = $img_rs->num_rows;
                                            $img_data = $img_rs->fetch_assoc();

                                            $condition_rs = Database::search("SELECT * FROM `condition` WHERE `id`='".$product_data["condition_id"]."'");
                                            $condition_data = $condition_rs->fetch_assoc();



                                        ?>

                                            <div class="card mb-3 mx-0 col-12">
                                                <div class="row g-0">
                                                    <div class="col-md-12 mt-3 mb-3">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <span class="fw-bold text-black-50 fs-5">Seller :</span>&nbsp;
                                                                <span class="fw-bold text-black fs-5"><?php echo $seller_data["fname"] . " " . $seller_data["lname"]; ?></span>&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="col-md-3  ">
                                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
                                                         data-bs-content="<?php echo $product_data["discription"]; ?>" title="Products Details">
                                                            <img src="<?php echo $img_data["code"]; ?>" class="img-fluid rounded-start" style="max-width: 200px;">

                                                        </span>



                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="card-body">

                                                            <h3 class="card-title"><?php echo $product_data["title"]; ?></h3>

                                                            <span class="fw-bold text-black-50">Colour : <?php echo $color_data["name"]; ?></span> &nbsp; |

                                                            &nbsp; <span class="fw-bold text-black-50">Condition : <?php echo $condition_data["name"]; ?></span>
                                                            <br>
                                                            <span class="fw-bold text-black-50 fs-5">Price :</span>&nbsp;
                                                            <span class="fw-bold text-black fs-5">Rs.<?php echo $product_data["price"]; ?>.00</span>
                                                            <br>


                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4">
                                                        <div class="row">
                                                            <div class="px-5 col-lg-6 mt-3 border-end">
                                                                <span class="fw-bold text-black-50 fs-5">Quantity </span>&nbsp;
                                                                <input type="number" class=" border-0 fs-4 fw-bold  cardqtytext" min="0" value="<?php echo $cart_data["qty"]; ?>">
                                                            </div>
                                                            <div class="col-lg-6 mt-3">
                                                                <span class="fw-bold text-black-50 fs-5">Delivery Fee </span>&nbsp;
                                                                <span class="fw-bold text-black fs-5">Rs.<?php echo $ship; ?>.00</span>
                                                            </div>

                                                            <div class="offset-0 offset-lg-4 col-12 col-lg-12 mt-5 mb-3">
                                                                <div class=" col-12 col-lg-7 d-grid">
                                                                    <a class="btn btn-info mb-2">Buy Now</a>
                                                                    <a class="btn btn-danger mb-2" onclick='removefromCart(<?php echo $cart_data["id"]; ?>);'>Remove</a>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>




                                                    <hr>

                                                    <div class="col-md-12 mt-3 mb-3">
                                                        <div class="row">
                                                            <div class="col-6 col-md-6">
                                                                <span class="fw-bold fs-5 text-black-50">Requested Total <i class="bi bi-info-circle"></i></span>
                                                            </div>
                                                            <div class="col-6 col-md-6 text-end">
                                                                <span class="fw-bold fs-5 text-black-50">Rs.<?php echo $product_data["price"] * $cart_data["qty"] + $ship; ?>.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php


                                        }

                                        ?>




                                    </div>
                                </div>

                                <!-- products -->

                                <!-- summery -->

                                <div class=" col-12 col-lg-3 cartSmmerybg shadow">
                                    <div class="row">

                                        <div class="col-12">
                                            <label class="form-label fs-3 fw-bold">Summary</label>
                                        </div>

                                        <div class="col-12">
                                            <hr />
                                        </div>

                                        <div class="col-6 mb-3">
                                            <span class="fs-6 fw-bold">items (<?php echo $cart_nm; ?>)</span>
                                        </div>

                                        <div class="col-6 text-end mb-3">
                                            <span class="fs-6 fw-bold">Rs. <?php echo $total; ?> .00</span>
                                        </div>

                                        <div class="col-6">
                                            <span class="fs-6 fw-bold">Shipping</span>
                                        </div>

                                        <div class="col-6 text-end">
                                            <span class="fs-6 fw-bold">Rs. <?php echo $shipping ?> .00</span>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <hr />
                                        </div>

                                        <div class="col-6 mt-2">
                                            <span class="fs-4 fw-bold">Total</span>
                                        </div>

                                        <div class="col-6 mt-2 text-end">
                                            <span class="fs-4 fw-bold">Rs. <?php echo $shipping + $total; ?> .00</span>
                                        </div>

                                        <div class="col-12 mt-3 mb-3 d-grid">
                                            <button class="btn  fs-5 text-white fw-bold cartbtncrl" >CHECKOUT</button>
                                        </div>

                                    </div>
                                </div>

                                <!-- summery -->


                            <?php

                            }

                            ?>








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
                }

                ?>


                <?php include "footer.php"; ?>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>

    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>

</body>

</html>