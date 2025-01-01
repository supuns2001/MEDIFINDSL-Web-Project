<?php

session_start();

require "connection.php";

$user = $_SESSION["u"];



$search = $_POST["search"];
$time = $_POST["time"];
$qty = $_POST["qty"];
$condition = $_POST["con"];

$query = "SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "'  ";

if (!empty($search)) {
    $query .= " AND `title` LIKE '%" . $search . "%' ";
}

if ($condition != "0") {
    $query .= " AND `condition_id`='" . $condition . "' ";
}

if ($time != "0") {
    if ($time == "1") {
        $query .= " ORDER BY `datetime_added` DESC ";
    } else if ($time == "2") {
        $query .= " ORDER BY `datetime_added` ASC ";
    }
}

if ($time != "0" && $qty != "0") {
    if ($qty == "1") {
        $query .= " , `qty` DESC ";
    } else if ($qty == "2") {
        $query .= " , `qty` ASC ";
    }
} else if ($time == "0" && $qty != "0") {
    if ($qty == "1") {
        $query .= " ORDER BY `qty` DESC ";
    } else if ($qty == "2") {
        $query .= " ORDER BY `qty` ASC ";
    }
}



// echo ($query);



?>

<div class="row gap-4 d-flex justify-content-center">


    <?php

    if (isset($_GET["page"])) {
        $pageno = $_GET["page"];
    } else {
        $pageno = 1;
    }

    $product_rs = Database::search($query);
    $product_num = $product_rs->num_rows;


    $result_per_page = 4;
    $number_of_pages = ceil($product_num / $result_per_page);

    $page_results = ($pageno - 1) * $result_per_page;

    $selected_rs = Database::search($query . " LIMIT " . $result_per_page . " OFFSET " . $page_results . " ");

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
                    <a class="page-link" <?php if ($pageno <= 1) {
                                                echo "#";
                                            } else {
                                            ?> onclick="sort1('<?php echo ($pageno - 1); ?>');" <?php
                                                                                                    } ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php

                for ($x = 1; $x <= $number_of_pages; $x++) {
                    if ($x == $pageno) {
                ?>
                        <li class="page-item  active">
                            <a class="page-link" onclick="sort1('<?php echo $x; ?>');"><?php echo $x; ?></a>
                        </li>

                    <?php

                    } else {
                    ?>

                        <li class="page-item ">
                            <a class="page-link" onclick="sort1('<?php echo $x; ?>');"><?php echo $x; ?></a>
                        </li>

                <?php
                    }
                }

                ?>


                <li class="page-item">
                    <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                                echo "#";
                                            } else {
                                            ?> onclick="sort1('<?php echo ($pageno + 1); ?>');" <?php
                                                                                                    } ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

    </div>








</div>