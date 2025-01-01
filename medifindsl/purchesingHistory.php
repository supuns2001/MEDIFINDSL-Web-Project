<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prchesing History | MEDIFINDSL</title>


    <link rel="stylesheet" href="style2.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="resource/icon.png" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <?php include "heder.php";

            require "connection.php";

            if (isset($_SESSION["u"])) {
                $umail = $_SESSION["u"]["email"];

                $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `user_email`='" . $umail . "' ");
                $invoice_num = $invoice_rs->num_rows;




            ?>

                <div class="col-12">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 ">
                            <div class="row">

                                <div class="col-12 mb-3 mt-4 text-center">
                                    <p class="fs-2 font5 fw-bold"> Purchase history</p>
                                </div>

                                <?php

                                if ($invoice_num == 0) {

                                ?>
                                    <div class="col-12 text-center bg-body " style="height: 450px;">
                                        <span class="fs-1 fw-bold text-black-50 d-block" style="margin-top: 200px;">
                                            You have not purchased any item yet...
                                        </span>
                                    </div>

                                <?php
                                } else {
                                ?>

                                    <div class="col-12 border border-1 ">
                                        <div class="row d-flex justify-content-center">

                                            <div class="col-12 mt-3 mb-3">
                                                <div class="row">

                                                    <div class="col-12 d-none d-lg-block">
                                                        <div class="row">
                                                            <div class="col-1 bg-light">
                                                                <label class="form-label fw-bold">ID</label>
                                                            </div>

                                                            <div class="col-4 bg-light text-center">
                                                                <label class="form-label fw-bold">Order Details</label>
                                                            </div>

                                                            <div class="col-1 bg-light text-end">
                                                                <label class="form-label fw-bold">Quantity</label>
                                                            </div>

                                                            <div class="col-2 bg-light text-center">
                                                                <label class="form-label fw-bold">Amount</label>
                                                            </div>

                                                            <div class="col-2 bg-light text-center">
                                                                <label class="form-label fw-bold">Purchased Date & Time</label>
                                                            </div>

                                                            <div class="col-3 bg-light"></div>

                                                            <div class="col-12">
                                                                <hr />
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <?php

                                            for ($x = 0; $x < $invoice_num; $x++) {
                                                $invoice_data = $invoice_rs->fetch_assoc();

                                            ?>
                                                <div class="col-12 col-lg-12 mt-5 mt-lg-0">
                                                    <div class="row">

                                                        <div class="col-12 col-lg-1 bg-info text-center text-lg-start">
                                                            <label class="form-label text-white fs-6 mx-4 py-1 py-lg-5">000<?php echo $invoice_data["id"]; ?></label>
                                                        </div>
                                                        <div class="col-12 col-lg-4 d-flex justify-content-center">
                                                            <div class="card mx-0 mx-lg-3 my-3" style="max-width: 540px;">
                                                                <div class="row g-0">
                                                                    <div class="col-md-4">
                                                                        <?php
                                                                        $pid = $invoice_data["product_id"];
                                                                        $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "' ");
                                                                        $image_data = $image_rs->fetch_assoc();
                                                                        ?>
                                                                        <img src="<?php echo $image_data["code"]; ?>" class="img-fluid rounded-start" />
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="card-body">

                                                                            <?php
                                                                            $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "' ");
                                                                            $product_data = $product_rs->fetch_assoc();

                                                                            $seller_rs = Database::search("SELECT * FROM `sellers` WHERE `user_email`='" . $product_data["user_email"] . "' ");
                                                                            $seller_data = $seller_rs->fetch_assoc();

                                                                            $seller_detail_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $seller_data["user_email"] . "'");
                                                                            $seller_detail_data = $seller_detail_rs->fetch_assoc();

                                                                            ?>

                                                                            <h5 class="card-title"><?php echo $product_data["title"]; ?></h5>
                                                                            <p class="card-text"><b>Seller : </b><?php echo $seller_detail_data["fname"] . " " . $seller_detail_data["lname"]; ?></p>
                                                                            <p class="card-text"><b>Price : </b>Rs. <?php echo $product_data["price"]; ?> .00</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-lg-1 text-center ">
                                                            <label class="form-label fs-4 py-1 py-lg-5"><?php echo $invoice_data["qty"]; ?></label>
                                                        </div>

                                                        <div class="col-12 col-lg-2 text-center  ">
                                                            <label class="form-label  fs-5  py-1 py-lg-5 fw-bold">Rs. <?php echo $invoice_data["total"]; ?> .00</label>
                                                        </div>

                                                        <div class="col-12 col-lg-2 text-center ">
                                                            <label class="form-label  fs-5 py-1 py-lg-5 px-3"><?php echo $invoice_data["date"]; ?></label>
                                                        </div>
                                                        <div class="col-12 col-lg-2">
                                                            <div class="row d-flex justify-content-center justify-content-lg-end align-items-end">
                                                                <div class="col-8 d-grid ">
                                                                    <button class="btn btn-secondary border border-1 border-primary fs-6 rounded rounded-4 " onclick="addfeedBack(<?php echo $pid; ?>);"><i class="bi bi-info-circle-fill"></i> FeedBack</button>
                                                                </div>

                                                                <div class="col-8 d-grid ">
                                                                    <button class="btn btn-danger fs-6 rounded rounded-4 mt-2"><i class="bi bi-trash3-fill"></i> Delete</button>
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

                            </div>
                        </div>
                    </div>
                </div>

            <?php
                                }
            ?>



        <?php
            }else{
                
                ?>
                <div class="col-12" style="height: 40vh;">
                    <div class="row d-flex justify-content-center align-items-center" style="height: 40vh;">
                            <a href="index.php" class=" shadow col-6 col-lg-3 btn btn-danger text-decoration-none fs-3 text-white fw-bold ">Please Login First</a>
                    </div>
                </div>
                <?php
                
                
            }

        ?>






        </div>

    </div>
    <?php include "footer.php"; ?>



    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>