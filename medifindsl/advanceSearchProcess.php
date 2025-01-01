<?php


require "connection.php";

$txt = $_POST["txt"];
$catogery = $_POST["cat"];
$brand = $_POST["brand"];
$modal = $_POST["modal"];
$condition = $_POST["condi"];
$colour = $_POST["color"];
$pf = $_POST["pf"];
$pt = $_POST["pt"];
$sort = $_POST["s"];



$query = "SELECT * FROM `product` ";
$status = 0;

if ($sort == 0) {

    if (!empty($txt)) {
        $query .= " WHERE `title` LIKE '%" . $txt . "%'";
        $status = 1;
    }

    if ($catogery != 0 && $status == 0) {
        $query .= " WHERE `category_id`='" . $catogery . "'";
        $status = 1;
    } else if ($catogery != 0 && $status != 0) {
        $query .= " AND `category_id`='" . $catogery . "'";
    }

    $pid = 0;
    if ($brand != 0 && $modal == 0) {
        $model_has_brand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE `brand_id`='" . $brand . "'");
        $model_has_brand_num = $model_has_brand_rs->num_rows;
        for ($x = 0; $x < $model_has_brand_num; $x++) {
            $model_has_brand_data = $model_has_brand_rs->fetch_assoc();
            $pid = $model_has_brand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`= '" . $pid . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `model_has_brand_id`='" . $pid . "'";
        }
    }

    if ($brand == 0 && $modal != 0) {
        $model_has_brand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE `model_id`='" . $modal . "'");
        $model_has_brand_num = $model_has_brand_rs->num_rows;
        for ($x = 0; $x < $model_has_brand_num; $x++) {
            $model_has_brand_data = $model_has_brand_rs->fetch_assoc();
            $pid = $model_has_brand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`= '" . $pid . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `model_has_brand_id`='" . $pid . "'";
        }
    }

    if ($brand != 0 && $modal != 0) {
        $model_has_brand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE `brand_id`='" . $brand . "' 
        AND `model_id`='" . $modal . "'");
        $model_has_brand_num = $model_has_brand_rs->num_rows;
        for ($x = 0; $x < $model_has_brand_num; $x++) {
            $model_has_brand_data = $model_has_brand_rs->fetch_assoc();
            $pid = $model_has_brand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`= '" . $pid . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `model_has_brand_id`='" . $pid . "'";
        }
    }

    if ($condition != 0 && $status == 0) {
        $query .= " WHERE `condition_id`='" . $condition . "'";
        $status = 1;
    } else if ($condition != 0 && $status != 0) {
        $query .= " AND `condition_id`='" . $condition . "'";
    }

    if ($colour != 0 && $status == 0) {
        $query .= " WHERE `colour_id`='" . $colour . "'";
        $status = 1;
    } else if ($colour != 0 && $status != 0) {
        $query .= "AND `colour_id`='" . $colour . "'";
    }

    if (!empty($pf) && empty($pt)) {
        if ($status == 0) {
            $query .= " WHERE `price` >= '" . $pf . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` >= '" . $pf . "'";
        }
    } else if (empty($pf) && !empty($pt)) {
        if ($status == 0) {
            $query .= " WHERE `price` <= '" . $pt . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` <= '" . $pt . "'";
        }
    } else if (!empty($pf) && !empty($pt)) {
        if ($status == 0) {
            $query .= " WHERE `price` BETWEEN '" . $pf . "' AND '" . $pt . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` BETWEEN '" . $pf . "' AND '" . $pt . "'";
        }
    }
} else if ($sort == 1) {
    if (!empty($txt)) {
        
        $query .= " WHERE `title` LIKE '%" . $txt . "%' ORDER BY `price` ASC";
        $status = 1;
    }
} else if ($sort == 2) {
    if (!empty($txt)) {
        $query .= " WHERE `title` LIKE '%" . $txt . "%' ORDER BY `price` DESC";
        $status = 1;
    }
} else if ($sort == 3) {
    if (!empty($txt)) {
        $query .= " WHERE `title` LIKE '%" . $txt . "%'  ORDER BY `qty` ASC";
        $status = 1;
    }
} else if ($sort == 4) {
    if (!empty($txt)) {
        $query .= " WHERE `title` LIKE '%" . $txt . "%' ORDER BY `qty` DESC";
        $status = 1;
    }
}



if ($_POST["page"] != "0") {

    $pageno = $_POST["page"];
} else {

    $pageno = 1;
}

$product_rs = Database::search($query);
$product_num = $product_rs->num_rows;

$results_per_page = 4;
$number_of_pages = ceil($product_num / $results_per_page);

$viewed_results_count = ((int)$pageno - 1) * $results_per_page;

$query .= " LIMIT " . $results_per_page . " OFFSET " . $viewed_results_count . "";
$results_rs = Database::search($query);
$results_num = $results_rs->num_rows;

?>



            <?php

            while ($results_data = $results_rs->fetch_assoc()) {
            ?>


                <!-- card2 -->
                <div class="card col-6 col-lg-3 mt-2 mb-2 shadow bg-white rounded rounded-4" style="width: 22rem;">
                    <div class="col-12 d-flex align-items-center" style="height: 300px;">
                        <?php

                        $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $results_data["id"] . "'");
                        $image_data = $image_rs->fetch_assoc();

                        ?>

                        <img src="<?php echo $image_data["code"]; ?>" class="card-img-top img-thumbnail mt-2 border border-0" />
                    </div>
                    <div class="card-body ms-0 m-0 text-center">
                        <h5 class="card-title"><?php echo $results_data["title"]; ?><span class="badge bg-info">New</span></h5>
                        <span class="card-text text-primary">Rs. <?php echo $results_data["price"]; ?> .00</span> <br />

                        <?php

                        if ($results_data["qty"] > 0) {
                        ?>
                            <span class="card-text text-warning fw-bold">In Stock</span> <br />
                            <a href='<?php echo "singleProductview.php?id=" . $results_data["id"]; ?>' class="col-12 btn btn-info">Buy Now</a>
                            <button class="col-12 btn btn-secondary mt-2" onclick='addtoCart(<?php echo $results_data["id"]; ?>);'>Add to Cart</button>
                        <?php

                        } else {
                        ?>
                            <span class="card-text text-danger fw-bold">Out of Stock</span> <br />
                            <button class="col-12 btn btn-info" disabled>Buy Now</button>
                            <button class="col-12 btn btn-secondary mt-2" disabled>Add to Cart</button>

                            <?php

                        }

                        if (isset($_SESSION["u"])) {

                            $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $_SESSION["u"]["email"] . "' AND `product_id`='" . $results_data["id"] . "' ");
                            $watchlist_num = $watchlist_rs->num_rows;

                            if ($watchlist_num == 1) {
                            ?>
                                <button class="col-12 btn btn-outline-light mt-2 border border-info" onclick="addtoWatchlist(<?php echo $results_data['id']; ?>);">
                                    <i class="bi bi-heart-fill text-danger fs-5" id="watchlistHeart<?php echo $results_data['id']; ?>"></i>
                                </button>
                            <?php

                            } else {
                            ?>
                                <button class="col-12 btn btn-outline-light mt-2 border border-info" onclick="addtoWatchlist(<?php echo $results_data['id']; ?>);">
                                    <i class="bi bi-heart-fill text-dark fs-5" id="watchlistHeart<?php echo $results_data['id']; ?>"></i>
                                </button>
                            <?php

                            }
                        } else {

                            ?>
                            <button class="col-12 btn btn-outline-light mt-2 border border-info" onclick="newUserClickWatchlist(<?php echo $results_data['id']; ?>);">
                                <i class="bi bi-heart-fill text-dark fs-5" id="watchlistHeart<?php echo $results_data['id']; ?>"></i>
                            </button>
                        <?php

                        }



                        ?>


                    </div>
                </div>
                <!-- card2 -->

            <?php
            }

            ?>

        


<?php



?>





<div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-lg justify-content-center">
            <li class="page-item">
                <a class="page-link" <?php if ($pageno <= 1) {
                                            echo ("#");
                                        } else {
                                        ?> onclick="advanceSeacher(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                    } ?> aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php

            for ($page = 1; $page <= $number_of_pages; $page++) {
                if ($page == $pageno) {
            ?>
                    <li class="page-item active">
                        <a class="page-link" onclick="advanceSeacher(<?php echo ($page) ?>);"><?php echo $page; ?></a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="page-item">
                        <a class="page-link" onclick="advanceSeacher(<?php echo ($page) ?>);"><?php echo $page; ?></a>
                    </li>
            <?php
                }
            }

            ?>

            <li class="page-item">
                <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                            echo ("#");
                                        } else {
                                        ?> onclick="advanceSeacher(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                    } ?> aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>