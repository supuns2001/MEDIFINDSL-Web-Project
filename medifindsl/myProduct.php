<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    $email = $_SESSION["u"]["email"];
    $pageno;
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Product | MedifindSL</title>

        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <link rel="icon" href="resource/icon.png" />

    </head>

    <body>
        <div class="container-fluid">
            <div class="col-12 myprodctbg">
                <div class="row">


                    <!-- header -->
                    <div class="col-12 border-5 border-bottom bg-light">
                        <div class="row">
                            <div class="col-12 col-lg-12 ">
                                <div class="row ">

                                    <div class="col-12 col-lg-2 ">
                                        <div class="col-12  text-center bg-danger rounded-4 shadow mt-4 d-flex justify-content-center align-items-center" style="background-image: linear-gradient(30deg, rgb(4, 72, 77) 10%, rgb(0, 37, 42) 80%);">
                                            <a href="sellerDashbord.php" class="text-decoration-none text-white mt-3 mb-3 fw-bold fs-5">Go to Dashbord</a>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-7 mt-4 text-center">
                                        <h1>My Product</h1>
                                    </div>

                                    <div class="col-12 col-lg-3  d-flex justify-content-end">
                                        <div class="row">

                                            <div class="col-12 col-lg-9 ">
                                                <div class="row text-center text-lg-end">
                                                    <div class="col-12 mt-0 mt-lg-4">
                                                        <span class="text-dark fs-4 fw-bold"><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"] ?></span>
                                                    </div>
                                                    <div class="col-12 ">
                                                        <span class="text-black-50 fw-bold"><?php echo $email; ?></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-3 mt-1 mb-1 text-start d-none d-lg-block ">
                                                <?php

                                                $profile_img_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`= '" . $email . "'");
                                                $profile_img_num = $profile_img_rs->num_rows;
                                                $profile_img_data = $profile_img_rs->fetch_assoc();

                                                if ($profile_img_num == 1) {
                                                ?>

                                                    <img src="<?php echo $profile_img_data["path"]; ?>" width="90px" height="90px" class="rounded-circle" />


                                                <?php
                                                } else {
                                                ?>
                                                    <img src="resource/profile_img/newUser.svg" width="90px" height="90px" class="rounded-circle" />


                                                <?php
                                                }


                                                ?>


                                            </div>


                                        </div>
                                    </div>



                                </div>
                            </div>



                        </div>
                    </div>
                    <!-- header -->

                    <div class="col-12">
                        
                    </div>


                    <div class="col-12 p-4">
                        <div class="row">

                            <!-- filtre -->

                            <div class="col-11 col-lg-2   shadow rounded myproductSort ">
                                <div class="row">
                                    <div class="col-12 mt-3 fs-5">
                                        <div class="row">
                                            <div class="col-12 ">
                                                <label class="form-label fw-bold fs-3">Sort Products</label>
                                            </div>
                                            <div class="col-11">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <input type="text" placeholder="search...." class="form-control" id="s" />
                                                    </div>
                                                    <div class="col-1 p-1">
                                                        <label class="form-label" onclick="sort1(0);"><i class="bi bi-search fs-5"></i></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label fw-bold">Active Time</label>
                                            </div>
                                            <div class="col-12">
                                                <hr style="width:80% ;" />
                                            </div>

                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="r1" id="n">
                                                    <label class="form-check-label" for="n">
                                                        Newest to oldest
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="r1" id="o">
                                                    <label class="form-check-label" for="o">
                                                        Oldest to newest
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-3">
                                                <label class="form-label fw-bold">By quantity</label>
                                            </div>

                                            <div class="col-12">
                                                <hr style="width:80% ;" />
                                            </div>

                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="r2" id="h">
                                                    <label class="form-check-label" for="h">
                                                        High to Low
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="r2" id="l">
                                                    <label class="form-check-label" for="l">
                                                        low to High
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-3">
                                                <label class="form-label fw-bold">By Condition</label>
                                            </div>

                                            <div class="col-12">
                                                <hr style="width:80% ;" />
                                            </div>

                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="r3" id="b">
                                                    <label class="form-check-label" for="b">
                                                        Brandnew
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="r3" id="u">
                                                    <label class="form-check-label" for="u">
                                                        Used
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-12 text-center mt-3 mb-3">
                                                <div class="row g-2">
                                                    <div class="col-12 col-lg-6 d-grid ">
                                                        <button class="btn btn-warning fw-bold" onclick="sort1(0);">Sort</button>
                                                    </div>

                                                    <div class="col-12 col-lg-6 d-grid ">
                                                        <button class="btn btn-secondary fw-bold" onclick="clearSort();">Clear</button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- filtre -->

                            <div class="col-12 col-lg-10 " id="sortProduct">
                                <div class="row gap-4 d-flex justify-content-center">


                                    <?php

                                    if (isset($_GET["page"])) {
                                        $pageno = $_GET["page"];
                                    } else {
                                        $pageno = 1;
                                    }

                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "'");
                                    $product_num = $product_rs->num_rows;


                                    $result_per_page = 4;
                                    $number_of_pages = ceil($product_num / $result_per_page);

                                    $page_results = ($pageno - 1) * $result_per_page;

                                    $selected_rs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "' 
                                    LIMIT " . $result_per_page . " OFFSET " . $page_results . " ");

                                    $selected_num = $selected_rs->num_rows;

                                    for ($x = 0; $x < $selected_num; $x++) {
                                        $selected_data = $selected_rs->fetch_assoc();

                                    ?>

                                        <!-- have products -->

                                        <div class="card mb-3  mx-lg-2 mt-3 col-12 col-lg-5 border-0 shadow">
                                            <div class="row g-0">

                                                <div class="col-12">
                                                    <div class="row">
                                                        <?php
                                                        $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $selected_data["id"] . "'");
                                                        $image_num = $image_rs->num_rows;

                                                        if ($image_num == 1) {
                                                            $image_data = $image_rs->fetch_assoc();
                                                        ?>
                                                            <div class="col-md-3">
                                                                <img src="<?php echo $image_data["code"]; ?>" class="img-fluid rounded-start" alt="">
                                                            </div>
                                                        <?php

                                                        } else {
                                                        }

                                                        ?>

                                                        <div class="col-9 mt-3">
                                                            <h5 class="card-title fs-4 fw-bold font2 " style="color: rgb(71, 71, 71);"><?php echo $selected_data["title"]; ?></h5>
                                                            <div class="col-12 ">
                                                                <hr />
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="row">

                                                        <div class="card-body col-8 ">


                                                            <span class="fs-5 fw-bold text-black-50">Price :</span>&nbsp;&nbsp;
                                                            <span class="fs-5 fw-bold text-black">RS. <?php echo $selected_data["price"]; ?>.00</span><br />
                                                            <span class="fs-5 fw-bold text-black-50">Quntity :</span>&nbsp;&nbsp;
                                                            <span class="fs-5 fw-bold text-black"><?php echo $selected_data["qty"]; ?> Items Available</span><br />

                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="fd<?php echo $selected_data["id"]; ?>" <?php if ($selected_data["status_id"] == 2) {
                                                                                                                                                                            ?>checked <?php
                                                                                                                                                                                    }
                                                                                                                                                                                        ?> onclick="changeStatus1(<?php echo $selected_data['id']; ?>);" />
                                                                <label class="form-check-label fw-bold " for="fd<?php echo $selected_data["id"]; ?>">

                                                                    <?php if ($selected_data["status_id"] == 2) { ?>
                                                                        <div class="text-danger">Make your Prodcts Active</div>
                                                                    <?php } else { ?>
                                                                        <div class="text-warning">Make your Prodcts Deactive</div>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </label>
                                                            </div>




                                                        </div>

                                                        <div class="col-4  d-flex align-items-end ">
                                                            <div class=" col-12   ">
                                                                <!-- href="updateProduct.php" -->
                                                                <a class=" d-flex align-items-center col-12 justify-content-center text-white myProductbluebtn text-decoration-none text-center px-3 py-5 py-lg-4 mb-4" onclick="sendpid('<?php echo $selected_data['id']; ?>');"> Update Product</a>
                                                                <!-- <button class="btn btn-secondary rounded rounded-4 mb-2" onclick='addtoCart(<?php echo $product_data["id"]; ?>);'>Delete Product</button> -->


                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>



                                            </div>
                                        </div>

                                        <!-- have products -->


                                    <?php


                                    }

                                    ?>


                                    <div class="d d-flex justify-content-center text-center mb-3">

                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination pagination-lg">
                                                <li class="page-item">
                                                    <a class="page-link" href="<?php if ($pageno <= 1) {
                                                                                    echo "#";
                                                                                } else {
                                                                                    echo "?page=" . ($pageno - 1);
                                                                                } ?>" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>

                                                <?php

                                                for ($x = 1; $x <= $number_of_pages; $x++) {
                                                    if ($x == $pageno) {
                                                ?>
                                                        <li class="page-item  active">
                                                            <a class="page-link" href="<?php echo "?page=" . $x; ?>"><?php echo $x; ?></a>
                                                        </li>

                                                    <?php

                                                    } else {
                                                    ?>

                                                        <li class="page-item ">
                                                            <a class="page-link" href="<?php echo "?page=" . $x; ?>"><?php echo $x; ?></a>
                                                        </li>

                                                <?php
                                                    }
                                                }

                                                ?>


                                                <li class="page-item">
                                                    <a class="page-link" href="<?php if ($pageno >= $number_of_pages) {
                                                                                    echo "#";
                                                                                } else {
                                                                                    echo "?page=" . ($pageno + 1);
                                                                                } ?>" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>

                                    </div>








                                </div>
                            </div>

                        </div>
                    </div>











                    <?php include "footer.php"; ?>

                </div>
            </div>
        </div>


        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>


<?php

} else {

    header("location:home.php");
}

?>