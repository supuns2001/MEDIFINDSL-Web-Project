<?php
session_start();

require "connection.php";

if (isset($_SESSION["u"])) {
    $Uemail = $_SESSION["u"]["email"];

    $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $Uemail . "'");
    $user_data = $user_rs->fetch_assoc();


?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Seller Dashbord | MEFIFINDSL</title>

        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <link rel="icon" href="resource/icon.png" />

    </head>

    <body>

        <div class="container-fluid">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="row">



                            <div class="col-12 col-lg-12">
                                <div class="row ">

                                    <!-- heder -->
                                    <div class="col-12 border mt-2 bg-light ">
                                        <div class="row">

                                            <div class="col-12 col-lg-2 adminhomelogo"></div>

                                            <div class="col-12 col-lg-3 ">
                                                <p class="fs-5 mb-1 mt-4 font5 fw-bold">Hii <?php echo $user_data["fname"]; ?>. Welcome To Seller Account </p>
                                            </div>


                                            <div class="col-3 col-lg-3 ">
                                                <div class="row">
                                                    <div class="col-4 text-center text-lg-end  mt-3"><i class="bi bi-bell fw-bold fs-4"></i></div>
                                                    <div class="col-4 text-center text-lg-end mt-3"><i class="bi bi-chat-left-text fw-bold fs-4"></i></div>
                                                    <div class="col-4 text-center text-lg-end mt-3"><i class="bi bi-calendar-event fw-bold fs-4"></i></div>
                                                </div>
                                            </div>

                                            <div class="col-9 col-lg-4">
                                                <div class="row">
                                                    <div class="col-9  text-end">
                                                        <p class="fs-4 font5 mb-2 mt-3"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></p>
                                                    </div>
                                                    <div class="col-2 me-2">
                                                        <?php

                                                        $uimag_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $Uemail . "' ");
                                                        $user_num = $uimag_rs->num_rows;



                                                        if ($user_num == 1) {
                                                            $uimag_data = $uimag_rs->fetch_assoc();

                                                        ?>
                                                            <img src="<?php echo $uimag_data["path"]; ?>" class="rounded-circle mt-2 mb-1" style="width: 50px; height: 50px;" />

                                                        <?php


                                                        } else {
                                                        ?>
                                                            <img src="resource/profile_img/newUser.svg" class="rounded-circle mt-2 mb-1" style="width: 50px; height: 50px;" />

                                                        <?php

                                                        }


                                                        ?>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <!-- heder -->



                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-12 col-lg-2 sellermenuclr mt-4" style="height: 700px;">
                                        <div class="row ">
                                            <div class="col-12 selectmenu  mt-5 d-flex align-content-center">
                                                <a href="sellerDashbord.php" class="mt-2 mx-3 mt-3 mb-3 fs-6 text-white text-decoration-none   font5"><i class="bi bi-speedometer me-1"></i> DASHBORD</a>
                                            </div>

                                            <!-- <div class="col-12  mt-3 d-flex align-content-center">
                                                <p class="mt-2 mx-3 mt-3 mb-3 fs-6 text-white  font5"><i class="bi bi-house-heart me-1"></i> HOME</p>
                                            </div> -->

                                            <div class="col-12  mt-3 d-flex align-content-center">
                                                <a href="" class="mt-2 mx-3 mt-3 mb-3 text-decoration-none  fs-6 text-white  font5"><i class="bi bi-person-fill me-1"></i> MY PROFILE</a>
                                            </div>

                                            <div class="col-12  mt-3 d-flex align-content-center">
                                                <a href="myProduct.php" class="mt-2 mx-3 mt-3 mb-3 fs-6 text-decoration-none text-white  font5"><i class="bi bi-basket2 me-1"></i> MY PRODUCT</a>
                                            </div>

                                            <div class="col-12  mt-3 d-flex align-content-center">
                                                <a href="addProduct.php" class="mt-2 mx-3 mt-3 mb-3 text-decoration-none fs-6 text-white  font5"><i class="bi bi-bag-plus-fill me-1"></i> ADD PRODUCT</a>
                                            </div>

                                            <div class="col-12 mt-5">
                                                <hr class="text-white border-1" />
                                            </div>

                                            <div class="col-12  mt-3 d-flex align-content-center">
                                                <a class="mx-3 mt-3 mb-3 fs-6 text-white text-decoration-none font5" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i class="bi bi-box-arrow-left me-1 "></i> GO TO HOME</a>
                                            </div>


                                            <!-- log out Modal -->
                                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content modelClr ">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fw-bold fs-4 font5" id="exampleModalLabel">Switch to buyer Account</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <p class="fs-4 font5">Are you sure you want Switch to buyer Account</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                            <button type="button" class="btn btn-primary" onclick="sellerSignout();"> Yes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- log out Modal -->


                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-10 p-lg-4 mt-4 ">
                                        <div class="row ">
                                            <div class="col-12 ">

                                                <div class="row gap-5 d-flex justify-content-center">

                                                    <?php
                                                    $today = date("Y-m-d");
                                                    $thismonth = date("m");
                                                    $thisyear = date("Y");

                                                    $a = "0";
                                                    $b = "0";
                                                    $c = "0";
                                                    $e = "0";
                                                    $f = "0";

                                                    // $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `user_email`='" . $Uemail . "' ");
                                                    // $invoice_num = $invoice_rs->num_rows;

                                                    $seller_rs = Database::search("SELECT * FROM `sellers` WHERE `user_email`='" . $Uemail . "'");
                                                    $seller_data = $seller_rs->fetch_assoc();

                                                    $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `sellers_id`='" . $seller_data["id"] . "'");
                                                    $invoice_num = $invoice_rs->num_rows;

                                                    // echo($mySold_invoice_num);


                                                    for ($x = 0; $x < $invoice_num; $x++) {
                                                        $invoice_data = $invoice_rs->fetch_assoc();


                                                        $f = $f + $invoice_data["qty"]; //total qty

                                                        $d = $invoice_data["date"];
                                                        $splitDate = explode(" ", $d); //separate date from time
                                                        $pdate = $splitDate[0]; //sold date

                                                        if ($pdate == $today) {
                                                            $a = $a + $invoice_data["total"];
                                                            $c = $c + $invoice_data["qty"];
                                                        }

                                                        $splitMonth = explode("-", $pdate); //separate date as year,month & date
                                                        $pyear = $splitMonth[0]; //year
                                                        $pmonth = $splitMonth[1]; //month

                                                        if ($pyear == $thisyear) {
                                                            if ($pmonth == $thismonth) {
                                                                $b = $b + $invoice_data["total"];
                                                                $e = $e + $invoice_data["qty"];
                                                            }
                                                        }
                                                    }



                                                    ?>

                                                    <div class="col-8 col-lg-3  sellerdashBox  rounded rounded-4" style="height: 150px;">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-8 mt-5">
                                                                <label class="mx-2 fs-2 fw-bold font5 text-white"><?php echo $a; ?>.00</label></br>
                                                                <label class="mx-2 fs-5 fw-bold font5 text-white">Today Earning</label>

                                                            </div>

                                                            <div class="col-4 d-none d-lg-block mt-5 d-flex justify-content-center">
                                                                <i class="bi bi-cart-plus divicon  text-start "></i>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-8 col-lg-3  bg-danger sellerdashBox  rounded rounded-4" style="height: 150px;">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-8 mt-4 mt-lg-5">
                                                                <label class="mx-2 fs-2 fw-bold font5 text-white"><?php echo $b; ?>.00</label></br>
                                                                <label class="mx-2 fs-5 fw-bold font5 text-white">Monthly Earning</label>

                                                            </div>

                                                            <div class="col-4  d-none d-lg-block  mt-5 d-flex justify-content-center">
                                                                <i class="bi bi-bag-check divicon  text-start"></i>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-8 col-lg-3  bg-danger sellerdashBox  rounded rounded-4" style="height: 150px;">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-8 mt-5">
                                                                <label class="mx-2 fs-2 fw-bold font5 text-white"><?php echo $invoice_num; ?></label></br>
                                                                <label class="mx-2 fs-5 fw-bold font5 text-white">Sold Product</label>

                                                            </div>

                                                            <div class="col-4 d-none d-lg-block mt-5 d-flex justify-content-center">
                                                                <i class="bi bi-shop divicon  text-start"></i>
                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                            <div class=" col-12">
                                                <div class="row p-4">
                                                    <div class="col-12 " style="height: 300px;">
                                                        <div class="row d-flex justify-content-center gap-5">

                                                            <div class="col-12 col-lg-6  mt-4 mb-1 border-1 rounded-3 shadow">
                                                                <div class="col-12 text-center mb-3 mt-2">
                                                                    <p class=" fs-4 fw-bold text-decoration-underline font5">Most Selling Products</p>
                                                                </div>

                                                                <hr />

                                                                <?php
                                                                $sellerFreqen_rs = Database::search("SELECT `product_id` , COUNT(`product_id`) AS `most_sell_product`
                                                                FROM `invoice` WHERE `sellers_id`='" . $seller_data["id"] . "' AND `date` LIKE '%" . $pmonth . "%' GROUP BY `product_id` ORDER BY `most_sell_product` DESC LIMIT 5 ");
                                                                $sellerFreqen_num = $sellerFreqen_rs->num_rows;


                                                                ?>

                                                                <table class="table mt-3 mb-3">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">#</th>
                                                                            <th scope="col"></th>
                                                                            <th scope="col">Product Name</th>
                                                                            <th scope="col">price (Rs.)</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php

                                                                        for ($x = 0; $x < $sellerFreqen_num; $x++) {
                                                                            $sellerFreqen_data = $sellerFreqen_rs->fetch_assoc();

                                                                            $sellerProdct_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $sellerFreqen_data["product_id"] . "' AND `user_email`='" . $Uemail . "' ");
                                                                            $sellerProdct_data = $sellerProdct_rs->fetch_assoc();
                                                                            // echo ($sellerProdct_data["title"]);

                                                                        ?>
                                                                            <tr>
                                                                                <th scope="row"><?php echo $x + 1; ?></th>
                                                                                <td>
                                                                                    <div class=" mx-lg-3 adminProdctImg">
                                                                                        <?php
                                                                                        $imag_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $sellerFreqen_data["product_id"] . "'");
                                                                                        $imag_num = $imag_rs->num_rows;
                                                                                        $imag_data = $imag_rs->fetch_assoc();

                                                                                        ?>
                                                                                        <img src="<?php echo $imag_data["code"]; ?>" onclick="block();" style="width: 60px; height: 60px;" />
                                                                                    </div>
                                                                                </td>
                                                                                <td><?php echo $sellerProdct_data["title"]; ?></td>
                                                                                <td><?php echo $sellerProdct_data["price"]; ?>.00</td>
                                                                            </tr>
                                                                        <?php
                                                                        }

                                                                        ?>

                                                                    </tbody>
                                                                </table>

                                                            </div>

                                                            <div class="col-12 col-lg-5 mt-4 mb-4 border-1 rounded-3 shadow">

                                                                <div class="col-12 text-center mb-3 mt-2">
                                                                    <p class=" fs-4 fw-bold text-decoration-underline font5">Best Sellers</p>
                                                                </div>

                                                                <hr />

                                                                <?php
                                                                $freqen_rs2 = Database::search("SELECT `sellers_id` , COUNT(`sellers_id`) AS `most_seller`
                                                                 FROM `invoice` WHERE `date` LIKE '%" . $pmonth . "%' GROUP BY `sellers_id` ORDER BY `most_seller` DESC LIMIT 10 ");
                                                                $freqen_num2 = $freqen_rs2->num_rows;
                                                                // echo ($freqen_num2);
                                                                ?>

                                                                <table class="table mb-3 mt-3">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">#</th>
                                                                            <th scope="col"></th>
                                                                            <th scope="col">Name</th>
                                                                            <th scope="col">Contact No.</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        for ($y = 0; $y < $freqen_num2; $y++) {

                                                                            $freqen_data2 = $freqen_rs2->fetch_assoc();
                                                                            //    echo($freqen_data2["product_id"]);

                                                                            $seller_rs2 = Database::search("SELECT * FROM `sellers` WHERE `id`='" . $freqen_data2["sellers_id"] . "'");
                                                                            $seller_num2 = $seller_rs2->num_rows;
                                                                            $seller_data2 = $seller_rs2->fetch_assoc();



                                                                            $mostSeller_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $seller_data2["user_email"] . "'");
                                                                            $mostSeller_num = $mostSeller_rs->num_rows;
                                                                            $mostSeller_data = $mostSeller_rs->fetch_assoc();
                                                                            // echo ($mostSeller_data["lname"]);

                                                                        ?>
                                                                            <tr>
                                                                                <th class="" scope="row">
                                                                                    <?php
                                                                                    if ($y == "0") {
                                                                                    ?>
                                                                                        <div class="numberOne mt-3" style="width: 30px; height: 30px;"></div>
                                                                                    <?php

                                                                                    } else if ($y == "1") {
                                                                                    ?>
                                                                                        <div class="numbertwo mt-3" style="width: 30px; height: 30px;"></div>
                                                                                    <?php

                                                                                    } else if ($y == "2") {
                                                                                    ?>
                                                                                        <div class="numberThree mt-3" style="width: 30px; height: 30px;"></div>
                                                                                    <?php

                                                                                    } else {
                                                                                        echo $y + 1;
                                                                                    }




                                                                                    ?>
                                                                                </th>
                                                                                <td>
                                                                                    <?php

                                                                                    $proImage_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $mostSeller_data["email"] . "' ");
                                                                                    $proImage_num = $proImage_rs->num_rows;

                                                                                    if ($proImage_num == 1) {
                                                                                        $proImage_data = $proImage_rs->fetch_assoc();
                                                                                    ?>
                                                                                        <div class=" " style="width: 50px; height: 50px; border-radius: 80px;">
                                                                                            <img src="<?php echo $proImage_data["path"]; ?>" style="width:50px; height: 50px; border-radius: 80px;" />
                                                                                        </div>
                                                                                    <?php
                                                                                    } else {
                                                                                    ?>
                                                                                        <div class=" " style="width: 50px; height: 50px; border-radius: 80px;">
                                                                                            <img src="resource/profile_img/newUser.svg" style="width:50px; height: 50px; border-radius: 80px;" />
                                                                                        </div>
                                                                                    <?php

                                                                                    }

                                                                                    ?>

                                                                                </td>
                                                                                <td><?php echo $mostSeller_data["fname"] . " " . $mostSeller_data["lname"]; ?></td>
                                                                                <td><?php echo $mostSeller_data["mobile"]; ?></td>
                                                                            </tr>
                                                                        <?php

                                                                        }
                                                                        ?>

                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>



                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>

<?php

} else {
    echo ("Something went Wrong Please Sign In");
}

?>