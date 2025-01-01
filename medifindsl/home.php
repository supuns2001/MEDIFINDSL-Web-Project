<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Medifindsl</title>



    <link rel="stylesheet" href="style2.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" class="mainicon" href="resource/icon.png" />
    <script src="https://unpkg.com/scrollreveal"></script>

</head>

<body>

    <div class="container-fluid ">
        <div class="row ">
            <div class="col-12 d-flex justify-content-center ">
                <div class="row">
                    <?php

                    require "connection.php";


                    include "heder.php";

                    ?>

                    <div class="col-12 mt-3">
                        <div class="row">

                            <div class="col-12 mt-4 mb-5">
                                <div class="row">

                                    <div class="col-12 col-lg-3 ">
                                        <select class="form-select text-center fw-bold fs-5 shadow" id="basic_search_select_category">
                                            <option value="0">All Categoeries</option>
                                            <?php



                                            $catogary_rs = Database::search("SELECT * FROM `category`");
                                            $catogary_num = $catogary_rs->num_rows;

                                            for ($x = 0; $x < $catogary_num; $x++) {
                                                $catogary_data = $catogary_rs->fetch_assoc();
                                            ?>

                                                <option value="<?php echo $catogary_data["id"]; ?>"><?php echo $catogary_data["name"]; ?></option>


                                            <?php


                                            }



                                            ?>



                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-7 mt-4 mt-lg-0">
                                        <div class="input-group flex-nowrap ">
                                            <input type="text" class="form-control col-9 shadow " placeholder="Search All Categories..." aria-label="Username" aria-describedby="addon-wrapping" id="basic_search_txt">
                                            <button class="col-3 btn btn-secondary text-white fw-bold fs-5 shadow" onclick="basicSearch(0);">Search</button>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-2 text-end   mt-2 ">
                                        <div class="row">
                                            <div class="col-4 d-flex d-block d-lg-none  ">
                                            <i class="bi bi-cart-plus-fill text-secondary fs-3 mt-2 fw-bold mx-3"></i>
                                                <i class="bi bi-person-circle text-secondary fs-3 mt-2 fw-bold mx-3"></i>
                                            </div>
                                            <div class="col-8  col-lg-12 text-end text-lg-start mt-3 mt-lg-0">
                                                <a href="advancSeacher.php" class="link-secondary me-3 mt-3 fs-5 fw-bold">Advanc Search</a>
                                            </div>
                                        </div>
                                    </div>

                                    

                                </div>

                            </div>



                            <div class="col-12 mb-5 d-none d-lg-block" id="basicSearchReslt">
                                <div class="offset-1 col-10 animateCarosal">

                                    <!-- carosal -->
                                    <div id="carouselExampleDark" class="carousel carousel-dark slide rounded rounded-3 " data-bs-ride="carousel">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active caroimg1 d-flex   " data-bs-interval="5000">
                                                <div class="welcome font5   "> Welcome to MedifindSL</div>
                                                <?php
                                                if (isset($_SESSION["u"])) {
                                                ?>
                                                    <div class="col-12 mt-5  d-block " style="height: 100px;">
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="col-12 mt-1 d-block " style="height: 100px;">
                                                        <div class="carosalBtnDiv1 font5 mt-3">
                                                            <a href="index.php" class="carosalBtnText fw-bold text-decoration-none text-white">Join Us</a>
                                                        </div>
                                                    </div>
                                                <?php

                                                }
                                                ?>



                                                <div class="carousel-caption  d-none d-md-block">
                                                    <h5 class="imgclz1 fs-4 font5 text-white">Our company offers a range of technologically advanced medical equipment, accompanied by exceptional seller support for hassle-free purchases.</h5>
                                                    <p>Some representative placeholder content for the first slide.</p>
                                                </div>
                                            </div>
                                            <div class="carousel-item caroimg2 " data-bs-interval="10000">
                                                <div class="welcome2 font5 col-9"> You can buy safe, Comfortable and Smart Equipment.</div>

                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5 class="fs-3 text-white">Our company offers a range of technologically advanced wheelchairs, accompanied by exceptional seller support for hassle-free purchases</h5>
                                                    <p>Some representative placeholder content for the second slide.</p>
                                                </div>
                                            </div>
                                            <div class="carousel-item caroimg3">

                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5>Third slide label</h5>
                                                    <p>Some representative placeholder content for the third slide.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                    <!-- carosal -->
                                </div>
                            </div>

                            <?php

                            $category2_rs = Database::search("SELECT * FROM `category`");
                            $catogary2_num = $category2_rs->num_rows;

                            for ($y = 0; $y < $catogary2_num; $y++) {
                                $category2_data = $category2_rs->fetch_assoc();

                            ?>
                                <!-- category name -->

                                <div class="col-12 mt-lg-5 mb-3 text-center categoraybg p-3 topicAnimate ">
                                    <a href="#" class="text-decoration-none link-dark fs-1 fw-bold font3"><?php echo $category2_data["name"]; ?></a> &nbsp;&nbsp;
                                    <a href="#" class="text-decoration-none link-dark fs-6">See All &nbsp; &rarr;</a>
                                </div>

                                <!-- category name -->

                                <!-- Products Model-->

                                <div class="col-12 mb-3">
                                    <div class="row  ">

                                        <div class="col-12">
                                            <div class="row justify-content-center gap-4 ">

                                                <?php
                                                $product_rs = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $category2_data["id"] . "' AND
                                                `status_id`='1' ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 0 ");
                                                $product_num = $product_rs->num_rows;

                                                for ($x = 0; $x < $product_num; $x++) {
                                                    $product_data = $product_rs->fetch_assoc();

                                                    $img_rs = Database::search("SELECT * FROM `images` WHERE  `product_id`='" . $product_data["id"] . "' ");
                                                    $img_num = $img_rs->num_rows;
                                                    $img_data = $img_rs->fetch_assoc();

                                                ?>
                                                    <div class="card col-6 col-lg-3 mt-2 mb-2 shadow bg-white rounded rounded-4 productAnimate" style="width: 22rem;">
                                                        <div class="col-12 d-flex align-items-center mt-3" style="height: 300px;">
                                                            <img src="<?php echo $img_data["code"]; ?>" class="card-img-top img-thumbnail mt-2 border border-0" />
                                                        </div>
                                                        <div class="card-body ms-0 m-0 text-center">
                                                            <h5 class="card-title"><?php echo $product_data["title"]; ?><span class="badge bg-info">New</span></h5>
                                                            <span class="card-text text-primary">Rs. <?php echo $product_data["price"]; ?> .00</span> <br />

                                                            <?php

                                                            if ($product_data["qty"] > 0) {
                                                            ?>
                                                                <span class="card-text text-warning fw-bold">In Stock</span> <br />
                                                                <a href='<?php echo "singleProductview.php?id=" . $product_data["id"]; ?>' class="col-12 btn btn-info">Buy Now</a>
                                                                <button class="col-12 btn btn-secondary mt-2" onclick='addtoCart(<?php echo $product_data["id"]; ?>);'>Add to Cart</button>
                                                            <?php

                                                            } else {
                                                            ?>
                                                                <span class="card-text text-danger fw-bold">Out of Stock</span> <br />
                                                                <button class="col-12 btn btn-info" disabled>Buy Now</button>
                                                                <button class="col-12 btn btn-secondary mt-2" disabled>Add to Cart</button>

                                                                <?php

                                                            }

                                                            if (isset($_SESSION["u"])) {

                                                                $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $_SESSION["u"]["email"] . "' AND `product_id`='" . $product_data["id"] . "' ");
                                                                $watchlist_num = $watchlist_rs->num_rows;

                                                                if ($watchlist_num == 1) {
                                                                ?>
                                                                    <button class="col-12 btn btn-outline-light mt-2 border border-info" onclick="addtoWatchlist(<?php echo $product_data['id']; ?>);">
                                                                        <i class="bi bi-heart-fill text-danger fs-5" id="watchlistHeart<?php echo $product_data['id']; ?>"></i>
                                                                    </button>
                                                                <?php

                                                                } else {
                                                                ?>
                                                                    <button class="col-12 btn btn-outline-light mt-2 border border-info" onclick="addtoWatchlist(<?php echo $product_data['id']; ?>);">
                                                                        <i class="bi bi-heart-fill text-dark fs-5" id="watchlistHeart<?php echo $product_data['id']; ?>"></i>
                                                                    </button>
                                                                <?php

                                                                }
                                                            } else {

                                                                ?>
                                                                <button class="col-12 btn btn-outline-light mt-2 border border-info" onclick="newUserClickWatchlist(<?php echo $product_data['id']; ?>);">
                                                                    <i class="bi bi-heart-fill text-dark fs-5" id="watchlistHeart<?php echo $product_data['id']; ?>"></i>
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

                                <!-- Products Model -->

                            <?php

                            }

                            ?>

                            


                        </div>

                    </div>

                    <?php include "footer.php"; ?>


                </div>
            </div>
        </div>
    </div>

    <script>
        ScrollReveal({
            // reset: true,
            distance: "100px",
            duration: 1000,
            delay: 400,
        });

        ScrollReveal().reveal('.topicAnimate', {
            delay: 50,
            origin: "top"
        });
        ScrollReveal().reveal('.productAnimate', {
            delay: 100,
            origin: "right",
            interval: "50"
        });
        ScrollReveal().reveal('.animateCarosal', {
            delay: 300,
            origin: "left",
            distance: "1500px"
        });




        ScrollReveal2().reveal('.animateCarosal', {
            delay: 100,
            origin: "left"
        });
    </script>


    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>