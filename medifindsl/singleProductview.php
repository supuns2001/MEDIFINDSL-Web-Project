<?php
require "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $product_rs = Database::search("SELECT product.id,product.price,product.qty,product.title,product.discription,product.datetime_added,product.delivery_fee_colombo,product.delivery_fee_other,product.category_id,product.model_has_brand_id,
    product.colour_id,product.condition_id,product.status_id,product.user_email,
    model.name AS mname, brand.name AS bname FROM  `product` 
    INNER JOIN `model_has_brand` ON model_has_brand.id=product.model_has_brand_id 
    INNER JOIN `brand` ON brand.id=model_has_brand.brand_id 
    INNER JOIN `model` ON model.id=model_has_brand.model_id WHERE product.id = '" . $pid . "' ");

    $product_num = $product_rs->num_rows;

    if ($product_num == 1) {

        $product_data = $product_rs->fetch_assoc();



?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Single Prodct view</title>

            <link rel="stylesheet" href="style.css" />
            <link rel="stylesheet" href="style2.css" />

            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

            <link rel="icon" href="resource/icon.png" />

        </head>

        <body>

            <div class="container-fluid">
                <div class="row">

                    <?php include "heder.php"; ?>

                    <div class="col-12 mt-5 mb-4">
                        <div class="row d-flex justify-content-center">

                            <div class="col-12 col-lg-11 categoraybg mt-5 mb-4">
                                <h1 class=" offset-lg-1 font5 mt-1 mb-1"><?php echo $product_data["mname"]; ?></h1>
                            </div>

                            <div class="col-12 mt-3 mb-4">
                                <div class="row">
                                    <?php

                                    $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "' ");
                                    $image_num = $image_rs->num_rows;
                                    $image_data = $image_rs->fetch_assoc();

                                    if ($image_num > 0) {
                                    ?>
                                        <div class="offset-lg-2 col-12 col-lg-3 singleviewImg rounded rounded-3 shadow" style="height: 400px;">
                                            <div class="col-12 ">
                                                <img src="<?php echo $image_data["code"]; ?>" class="img-thumbnail singleviewImg border-0" />
                                            </div>
                                        </div>
                                    <?php

                                    } else {
                                    ?>
                                        <div class="offset-lg-2 col-12 col-lg-3 singleviewImg rounded rounded-3 shadow" style="height: 400px;">
                                            <div class="col-12 ">
                                                <img src="resource/productImg/addproductimg.svg" class="img-thumbnail singleviewImg border-0" />
                                            </div>
                                        </div>
                                    <?php

                                    }

                                    ?>



                                    <div class="offset-lg-1 col-12 col-lg-6 mt-4">
                                        <label class="fs-1 text-secondary  mt-2 font5"> <?php echo $product_data["title"]; ?></label>
                                        <hr class="col12 col-lg-11" />
                                        <p class="fs-4  mt-2 font5"><b>Brand :</b> <?php echo $product_data["bname"]; ?></p>

                                        <!-- <p class="fs-4 mt-4 font5"><b>Product Catogery :</b> aadaewDayana</p> -->

                                        <p class="fs-4 mt-4 font5"><b>Product Model :</b> <?php echo $product_data["mname"]; ?></p>

                                        <p class="fs-4 mt-4 font5"><b>Price :</b> RS. <?php echo $product_data["price"]; ?>.00</p>

                                        <p class="fs-4 mt-4 font5"><b>In Stock :</b> <?php echo $product_data["qty"]; ?> Item Available</p>




                                    </div>
                                </div>
                            </div>

                            <div class="offset-lg-1 col-12 col-lg-3 me-lg-2 mt-4">
                                <div class="col-12">
                                    <p class="font5 fs-4 fw-bold mb-4">Delivery time : 5 Days</p>
                                </div>

                                <div class="col-12">
                                    <p class="font5 fs-4 mb-4"><b> Warrenty :</b> 6 Months Warrenty</p>
                                </div>

                                <div class="col-12">
                                    <div class="row">

                                        <div class="col-4">
                                            <span class="fs-4 font5 fw-bold">Quantity : </span>
                                        </div>

                                        <div class="col-5 ">
                                            <div class="row g-2">

                                                <div class="border border-1 border-secondary rounded overflow-hidden 
                                                        float-left mt-1 position-relative product-qty">
                                                    <div class="col-12">
                                                        <!-- <span>Quantity : </span> -->
                                                        <input type="text" class="border-0 fs-5 fw-bold text-start mx-3" style="outline: none;" pattern="[0-9]" value="1" id="qty_input" onkeyup='checkValue(<?php echo $product_data["qty"]; ?>);' />

                                                        <div class="position-absolute qty-buttons border-0 bg-secondary bg-opacity-10 ">
                                                            <div class="justify-content-center d-flex flex-column align-items-center 
                                                                 qty-inc">
                                                                <i class="bi bi-caret-up-fill text-primary fs-5" onclick='qty_inc(<?php echo $product_data["qty"] ?>);'></i>
                                                            </div>
                                                            <div class="justify-content-center d-flex flex-column align-items-center 
                                                                 qty-dec">
                                                                <i class="bi bi-caret-down-fill text-primary fs-5" onclick="qty_dec();"></i>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>




                                            </div>
                                        </div>

                                    </div>

                                </div>



                            </div>

                            <div class=" col-12 col-lg-5  me-lg-6 mt-4 border-start border-dark">
                                <div class="row">
                                    <div class="offset-lg-1 col-12 gap-4">
                                        <i class="bi bi-star-fill text-warning fs-5 mx-2"></i>
                                        <i class="bi bi-star-fill text-warning fs-5 mx-2"></i>
                                        <i class="bi bi-star-fill text-warning fs-5 mx-2"></i>
                                        <i class="bi bi-star-fill text-warning fs-5 mx-2"></i>
                                        <i class="bi bi-star-fill fs-5 mx-2"></i>

                                    </div>

                                    <div class=" offset-lg-1 col-12">
                                        <p class="font5 fs-4 mt-2 mb-4"> 4.5 stars | 39 Reviews & Ratings</p>
                                    </div>

                                    <div class="col-12 mt-lg-3 ">
                                        <div class="d-flex flex-lg-row flex-column justify-content-center align-items-center gap-lg-5 col-12 ">
                                            <div class="  col-10 col-lg-3 mt-4  d-grid  " >
                                                <button type="submit" id="payhere-payment" class="shadow btn btn-info font4 mt-2 mb-3 fs-4 rounded rounded-3" onclick="paynow(<?php echo $pid; ?>);">Buy Now</button>
                                            </div>

                                            <div class="  col-10 col-lg-3 mt-1 mt-lg-4  d-grid  " >
                                                <button class="btn mt-lg-2 mb-3 font5  fs-4 btn-secondary rounded rounded-3 shadow" onclick='addtoCart(<?php echo $pid; ?>);'>Add to Cart</button>
                                            </div>

                                        </div>

                                    </div>








                                </div>


                            </div>






                            <div class=" offset-lg-2 col-12 col-lg-9 me-lg-4 mt-4  ">
                                <p class="font5 fs-4 fw-bold mb-4">Description</p>
                                <p class="fs-5"><?php echo $product_data["discription"]; ?>
                                </p>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <hr />
                                    </div>
                                    <div class="col-12">
                                        <p class="fs-3 fw-bold font5">Related Items</p>
                                    </div>

                                    <div class="col-12 mb-5">
                                        <hr />
                                    </div>

                                    <div class="col-12">
                                        <div class="row d-flex justify-content-center gap-5">
                                            <?php
                                            $releted_pro_rs = Database::search("SELECT * FROM `product` WHERE `category_id`= '" . $product_data["category_id"] . "' 
                                            AND `status_id` = '1' ORDER BY `datetime_added` ASC LIMIT 4 OFFSET 0 ");
                                            $releted_pro_num = $releted_pro_rs->num_rows;

                                            // echo ($releted_pro_num);

                                            for ($x = 0; $x < $releted_pro_num; $x++) {
                                                $releted_pro_data = $releted_pro_rs->fetch_assoc();

                                                $img_rs = Database::search("SELECT * FROM `images` WHERE  `product_id`='" . $releted_pro_data["id"] . "' ");
                                                $img_num = $img_rs->num_rows;
                                                $img_data = $img_rs->fetch_assoc();

                                            ?>

                                                <div class="card col-6 col-lg-3 mt-2 mb-2 shadow bg-white rounded rounded-4" style="width: 22rem;">
                                                    <div class="col-12 d-flex align-items-center" style="height: 300px;">
                                                        <img src="<?php echo $img_data["code"]; ?>" class="card-img-top img-thumbnail mt-2 border border-0" />
                                                    </div>
                                                    <div class="card-body ms-0 m-0 text-center">
                                                        <h5 class="card-title"><?php echo $releted_pro_data["title"]; ?><span class="badge bg-info">New</span></h5>
                                                        <span class="card-text text-primary">Rs. <?php echo $releted_pro_data["price"]; ?> .00</span> <br />

                                                        <?php

                                                        if ($releted_pro_data["qty"] > 0) {
                                                        ?>
                                                            <span class="card-text text-warning fw-bold">In Stock</span> <br />
                                                            <a href='<?php echo "singleProductview.php?id=" . $releted_pro_data["id"]; ?>' class="col-12 btn btn-info" >Buy Now</a>
                                                            <button class="col-12 btn btn-secondary mt-2" onclick='addtoCart(<?php echo $releted_pro_data["id"]; ?>);'>Add to Cart</button>
                                                        <?php

                                                        } else {
                                                        ?>
                                                            <span class="card-text text-danger fw-bold">Out of Stock</span> <br />
                                                            <button class="col-12 btn btn-info" disabled>Buy Now</button>
                                                            <button class="col-12 btn btn-secondary mt-2" disabled>Add to Cart</button>

                                                            <?php

                                                        }

                                                        if (isset($_SESSION["u"])) {

                                                            $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $_SESSION["u"]["email"] . "' AND `product_id`='" . $releted_pro_data["id"] . "' ");
                                                            $watchlist_num = $watchlist_rs->num_rows;

                                                            if ($watchlist_num == 1) {
                                                            ?>
                                                                <button class="col-12 btn btn-outline-light mt-2 border border-info" onclick="addtoWatchlist(<?php echo $releted_pro_data['id']; ?>);">
                                                                    <i class="bi bi-heart-fill text-danger fs-5" id="watchlistHeart<?php echo $releted_pro_data['id']; ?>"></i>
                                                                </button>
                                                            <?php

                                                            } else {
                                                            ?>
                                                                <button class="col-12 btn btn-outline-light mt-2 border border-info" onclick="addtoWatchlist(<?php echo $releted_pro_data['id']; ?>);">
                                                                    <i class="bi bi-heart-fill text-dark fs-5" id="watchlistHeart<?php echo $releted_pro_data['id']; ?>"></i>
                                                                </button>
                                                            <?php

                                                            }
                                                        } else {

                                                            ?>
                                                            <button class="col-12 btn btn-outline-light mt-2 border border-info" onclick="newUserClickWatchlist(<?php echo $releted_pro_data['id']; ?>);">
                                                                <i class="bi bi-heart-fill text-dark fs-5" id="watchlistHeart<?php echo $releted_pro_data['id']; ?>"></i>
                                                            </button>
                                                        <?php

                                                        }



                                                        ?>


                                                    </div>
                                                </div>

                                            <?php


                                            }

                                            ?>



                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <?php include "footer.php"; ?>

                </div>
            </div>

            <script src="script.js"></script>
            <script src="bootstrap.bundle.js"></script>
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        </body>

        </html>

<?php



    } else {
        echo ("Sorry for the Inconvenience");
    }
} else {

    echo ("Something went wrong");
}



?>