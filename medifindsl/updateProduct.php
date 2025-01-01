<?php

session_start();

require "connection.php";

if ($_SESSION["p"]) {
    $product = $_SESSION["p"];
    $email = $_SESSION["p"]["user_email"];

?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Product | Medifindsl</title>

        <link rel="stylesheet" href="style.css" />

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <link rel="icon" href="resource/icon.png" />
    </head>

    <body>
        <div class="container-fluid">

            <!-- header -->
            <?php

            $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
            $user_data = $user_rs->fetch_assoc();

            ?>
            <div class="col-12 border-5 border-bottom bg-light">
                <div class="row">
                    <div class="col-12 col-lg-12 ">
                        <div class="row ">

                            <div class="col-2 col-lg-2 ">
                                <div class="row">
                                    <a href="sellerDashbord.php" class="fs-3 fw-bold mx-5 mt-4 text-secondary font5"><i class="bi bi-house-door-fill hicon text-secondary"></i> Home</a>
                                </div>
                            </div>

                            <div class="col-10 col-lg-10 d-flex justify-content-end">
                                <div class="row">

                                    <div class="col-12 col-lg-9 ">
                                        <div class="row text-center text-lg-end">
                                            <div class="col-12 mt-0 mt-lg-4">
                                                <span class="text-dark fs-4 fw-bold"><?php echo $user_data["fname"] . " " . $user_data["lname"] ?></span>
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



            <div class="row d-flex justify-content-center align-items-center addproductbg2">
                <div class=" col-11   p-4">

                    <div class=" offset-2 col-12 col-lg-8 border border-1  rounded-4  p-5   addproductbg">
                        <div class="row">

                            <div class="col-12 text-center mb-5">
                                <h2 class="textblueclr fw-bold">Update Product</h2>
                            </div>
                            <div class="col-12  " id="details1">
                                <div class="row ms-4">

                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Select Product Category</label>
                                    </div>

                                    <div class="col-12 offset-lg-1 col-lg-10 mb-3">
                                        <select class="form-select text-center shadow  rounded-4 " disabled>
                                            <?php
                                            $catagery_rs = Database::search("SELECT * FROM `category` WHERE `id`='" . $product["category_id"] . "'");
                                            $catagery_data = $catagery_rs->fetch_assoc();
                                            ?>
                                            <option><?php echo $catagery_data["name"]; ?></option>

                                        </select>
                                    </div>


                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Select Product Brand</label>
                                    </div>

                                    <div class="col-12 offset-lg-1 col-lg-10  mb-3">
                                        <select class="form-select text-center shadow  rounded-4 " disabled>
                                            <?php
                                            $brand_rs = Database::search("SELECT * FROM `brand` WHERE `id` IN
                                            (SELECT `brand_id` FROM `model_has_brand` WHERE `id`='" . $product["model_has_brand_id"] . "') ");
                                            $brand_data = $brand_rs->fetch_assoc();

                                            ?>
                                            <option><?php echo $brand_data["name"]; ?></option>

                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Select Product Model</label>
                                    </div>

                                    <div class="col-12 offset-lg-1 col-lg-10  mb-3">
                                        <select class="form-select text-center shadow rounded-4 " disabled>
                                            <?php
                                            $modal_rs = Database::search("SELECT * FROM `model` WHERE `id` IN
                                            (SELECT `model_id` FROM `model_has_brand` WHERE `id`='" . $product["model_has_brand_id"] . "') ");
                                            $modal_data = $modal_rs->fetch_assoc();


                                            ?>
                                            <option><?php echo $modal_data["name"]; ?></option>


                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">
                                            Add a Title to your Product
                                        </label>
                                    </div>
                                    <div class=" col-12 offset-lg-1 col-lg-10 mb-3">
                                        <input type="text" class="form-control shadow  rounded-4" value="<?php echo $product["title"] ?>" id="title" />
                                    </div>

                                    <div class="row col-12 col-lg-6 border-1 border-end border-success ">
                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Select Product Condition</label>
                                        </div>
                                        <div class="col-12 col-lg-12 mb-3">
                                            <?php
                                            if ($product["condition_id"] == 1) {
                                            ?>
                                                <div class="form-check form-check-inline mx-5">
                                                    <input class="form-check-input" type="radio" id="b" name="c" checked disabled />
                                                    <label class="form-check-label fw-bold" for="b">Brandnew</label>
                                                </div>
                                                <div class="form-check form-check-inline  mx-5">
                                                    <input class="form-check-input" type="radio" id="u" name="c" disabled />
                                                    <label class="form-check-label fw-bold" for="u">Used</label>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="form-check form-check-inline mx-5">
                                                    <input class="form-check-input" type="radio" id="b" name="c" disabled />
                                                    <label class="form-check-label fw-bold" for="b">Brandnew</label>
                                                </div>
                                                <div class="form-check form-check-inline  mx-5">
                                                    <input class="form-check-input" type="radio" id="u" name="c" checked disabled />
                                                    <label class="form-check-label fw-bold" for="u">Used</label>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                        </div>

                                    </div>


                                    <div class="col-12 col-lg-6 mb-3  ms-4">
                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Select Product Colour</label>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-10">
                                            <?php
                                            $colour_rs = Database::search("SELECT * FROM `colour` WHERE `id`='" . $product["colour_id"] . "'");
                                            $colour_data = $colour_rs->fetch_assoc();
                                            ?>

                                            <select class="form-select text-center shadow rounded-4" disabled>
                                                <option><?php echo $colour_data["name"]; ?></option>


                                            </select>
                                        </div>
                                    </div>

                                    <div class="offset-lg-3 col-12 col-lg-6 gap-1">
                                        <div class="row">
                                            <div class="col-4 border-2 border-dark rounded">
                                                <img src="resource/productImg/addproductimg.svg" class="img-fluid" style="width: 250px;" id="img1" />
                                            </div>
                                            <div class="col-4 border-1 border-dark rounded">
                                                <img src="resource/productImg/addproductimg.svg" class="img-fluid" style="width: 250px;" id="img2"/>
                                            </div>
                                            <div class="col-4 border-1 border-dark rounded">
                                                <img src="resource/productImg/addproductimg.svg" class="img-fluid" style="width: 250px;" id="img3"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3">
                                        <input type="file" class="d-none" id="imageuploader" multiple />
                                        <label for="imageuploader" class="col-12 btn btn-primary" onclick="changeImage();">Change Images</label>
                                    </div>



                                    <div class="col-12 col-lg-11 d-flex justify-content-end gap-4 mt-4 ">
                                        <div class="col-2 d-grid " >
                                            <button class="btn btn-warning" onclick="updateOtherdetails();">Next</button>
                                        </div>

                                        <div class="col-2 d-grid ">
                                            <button class="btn btn-dark" onclick="cancel();">Cancel</button>
                                        </div>
                                    </div>


                                </div>
                            </div>



                            <div class="col-12  d-none " id="details2">
                                <div class="row">

                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Cost Per Item</label>
                                        </div>
                                        <div class="offset-0 offset-lg-2 col-12 col-lg-9 mb-3">
                                            <div class="input-group mb-2 mt-2">
                                                <span class="input-group-text">Rs.</span>
                                                <input type="text" class="form-control" value="<?php echo $product["price"]; ?>" disabled />
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Add Product Quantity</label>
                                        </div>
                                        <div class="offset-0 offset-lg-2 col-12 col-lg-9 mb-3 ">
                                            <input type="number" class="form-control" value="<?php echo $product["qty"]; ?>" min="0" id="qty" />
                                        </div>
                                    </div>


                                    <div class="col-12 ">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Approved Payment Methods</label>
                                    </div>
                                    <div class="col-12 mb-3 ">
                                        <div class="row">
                                            <div class="offset-0 offset-lg-2 col-2 pm pm1"></div>
                                            <div class="col-2 pm pm2 "></div>
                                            <div class="col-2 pm pm3"></div>
                                            <div class="col-2 pm pm4"></div>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Delivery Cost</label>
                                    </div>
                                    <div class="col-12 col-lg-11">
                                        <div class="row">
                                            <div class="col-12 offset-lg-1 col-lg-4">
                                                <label class="form-label">Delivery cost Within Colombo</label>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="input-group mb-2 mt-2">
                                                    <span class="input-group-text">Rs.</span>
                                                    <input type="text" class="form-control" value="<?php echo $product["delivery_fee_colombo"]; ?>" id="dwc" />
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-11">
                                        <div class="row">
                                            <div class="col-12 offset-lg-1 col-lg-4">
                                                <label class="form-label">Delivery cost out of Colombo</label>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="input-group mb-2 mt-2">
                                                    <span class="input-group-text">Rs.</span>
                                                    <input type="text" class="form-control" value="<?php echo $product["delivery_fee_other"]; ?>" id="doc" />
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Product Description</label>
                                            </div>
                                            <div class="col-12">
                                                <textarea cols="30" rows="10" class="form-control" id="discription"><?php echo $product["discription"]; ?></textarea>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="col-12 col-lg-12 d-flex justify-content-end gap-4 mt-4 ">
                                        <div class="col-2 d-grid ">
                                            <button class="btn btn-warning" onclick="updateProduct();">Update Product</button>
                                        </div>

                                        <div class="col-2 d-grid ">
                                            <button class="btn btn-dark" onclick="backdiv();">Back</button>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>



                    </div>

                </div>

            </div>

            <?php include "footer.php"; ?>



        </div>

        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>

    </body>

    </html>
<?php


}

?>