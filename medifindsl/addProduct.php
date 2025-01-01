



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
        <title>Add new Product | MEFIFINDSL</title>

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

                            <div class="col-12 ">
                                <div class="row">

                                    <div class="col-12 col-lg-2 sellermenuclr mt-4" >
                                        <div class="row ">
                                            <div class="col-12   mt-5 d-flex align-content-center">
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

                                            <div class="col-12 selectmenu mt-3 d-flex align-content-center">
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

                                    <div class="col-12 col-lg-10  mt-4  ">
                                        <div class="row d-flex justify-content-center">

                                            <div class="  col-12 col-lg-11 border border-1  rounded-4  p-5   addproductbg">
                                                <div class="row">

                                                    <div class="col-12 text-center mb-5">
                                                        <h2 class="textblueclr fw-bold">Add New Product</h2>
                                                    </div>
                                                    <div class="col-12  " id="details1">
                                                        <div class="row ms-4">

                                                            <div class="col-12">
                                                                <label class="form-label fw-bold" style="font-size: 20px;">Select Product Category</label>
                                                            </div>


                                                            <div class="col-12 offset-lg-1 col-lg-10 mb-3">
                                                                <select class="form-select text-center shadow  rounded-4" id="category">
                                                                    <option value="0">Select Category</option>

                                                                    <?php
                                                                    $category_rs = Database::search("SELECT * FROM `category` ");
                                                                    $category_num = $category_rs->num_rows;

                                                                    for ($x = 0; $x < $category_num; $x++) {
                                                                        $category_data = $category_rs->fetch_assoc();

                                                                    ?>
                                                                        <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>

                                                                    <?php


                                                                    }

                                                                    ?>

                                                                </select>
                                                            </div>


                                                            <div class="col-12">
                                                                <label class="form-label fw-bold" style="font-size: 20px;">Select Product Brand</label>
                                                            </div>

                                                            <div class="col-12 offset-lg-1 col-lg-10  mb-3">
                                                                <select class="form-select text-center shadow  rounded-4" id="brand">
                                                                    <option value="0">Select Brand</option>
                                                                    <?php
                                                                    $brand_rs = Database::search("SELECT * FROM `brand`");
                                                                    $brand_num = $brand_rs->num_rows;

                                                                    for ($y = 0; $y < $brand_num; $y++) {
                                                                        $brand_data = $brand_rs->fetch_assoc();

                                                                    ?>
                                                                        <option value="<?php echo $brand_data["id"]; ?>"><?php echo $brand_data["name"]; ?></option>

                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </select>
                                                            </div>

                                                            <div class="col-12">
                                                                <label class="form-label fw-bold" style="font-size: 20px;">Select Product Model</label>
                                                            </div>

                                                            <div class="col-12 offset-lg-1 col-lg-10  mb-3">
                                                                <select class="form-select text-center shadow rounded-4" id="model">
                                                                    <option>Select Model</option>
                                                                    <?php

                                                                    $model_rs = Database::search("SELECT * FROM `model`");
                                                                    $model_num = $model_rs->num_rows;

                                                                    for ($z = 0; $z < $model_num; $z++) {
                                                                        $model_data = $model_rs->fetch_assoc();

                                                                    ?>
                                                                        <option value="<?php echo $model_data["id"]; ?>"><?php echo $model_data["name"]; ?></option>

                                                                    <?php

                                                                    }


                                                                    ?>

                                                                </select>
                                                            </div>

                                                            <div class="col-12">
                                                                <label class="form-label fw-bold" style="font-size: 20px;">
                                                                    Add a Title to your Product
                                                                </label>
                                                            </div>
                                                            <div class=" col-12 offset-lg-1 col-lg-10 mb-3">
                                                                <input type="text" class="form-control shadow  rounded-4" id="title" />
                                                            </div>

                                                            <div class="row col-12 col-lg-6 border-1 border-end border-success ">
                                                                <div class="col-12">
                                                                    <label class="form-label fw-bold" style="font-size: 20px;">Select Product Condition</label>
                                                                </div>
                                                                <div class="col-12 col-lg-12 mb-3">
                                                                    <div class="form-check form-check-inline mx-5">
                                                                        <input class="form-check-input" type="radio" id="b" name="c" checked />
                                                                        <label class="form-check-label fw-bold" for="b">Brandnew</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline  mx-5">
                                                                        <input class="form-check-input" type="radio" id="u" name="c" />
                                                                        <label class="form-check-label fw-bold" for="u">Used</label>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="col-12 col-lg-6 mb-3  ms-4">
                                                                <div class="col-12">
                                                                    <label class="form-label fw-bold" style="font-size: 20px;">Select Product Colour</label>
                                                                </div>
                                                                <div class="col-12 mb-3 col-lg-10">
                                                                    <select class="form-select text-center shadow rounded-4" id="color">
                                                                        <option>Select colour</option>
                                                                        <?php

                                                                        $color_rs = Database::search("SELECT * FROM `colour`");
                                                                        $color_num = $color_rs->num_rows;

                                                                        for ($c = 0; $c < $color_num; $c++) {
                                                                            $color_data = $color_rs->fetch_assoc();
                                                                        ?>
                                                                            <option value="<?php echo $color_data["id"]; ?>"><?php echo $color_data["name"]; ?></option>

                                                                        <?php

                                                                        }


                                                                        ?>


                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <label class="form-label fw-bold" style="font-size: 20px;">Product Description</label>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <textarea cols="30" rows="10" class="form-control" id="dc"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>




                                                            <div class="col-12 col-lg-11 d-flex justify-content-end gap-4 mt-4 ">
                                                                <div class="col-2 d-grid " onclick="otherdetails();">
                                                                    <button class="btn btn-warning">Next</button>
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
                                                                        <input type="text" class="form-control" id="cost" />
                                                                        <span class="input-group-text">.00</span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <label class="form-label fw-bold" style="font-size: 20px;">Add Product Quantity</label>
                                                                </div>
                                                                <div class="offset-0 offset-lg-2 col-12 col-lg-9 mb-3 ">
                                                                    <input type="number" class="form-control" value="0" min="0" id="qty" />
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
                                                                            <input type="text" class="form-control" id="dwc" />
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
                                                                            <input type="text" class="form-control" id="doc" />
                                                                            <span class="input-group-text">.00</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="offset-lg-3 col-12 col-lg-6 gap-1 mt-3 mb-3">
                                                                <div class="row">
                                                                    <div class="col-4 border-2 border-dark rounded">
                                                                        <img src="resource/productImg/addproductimg.svg" class="img-fluid" style="width: 250px;" id="p0" />
                                                                    </div>
                                                                    <div class="col-4 border-1 border-dark rounded">
                                                                        <img src="resource/productImg/addproductimg.svg" class="img-fluid" style="width: 250px;" id="p1" />
                                                                    </div>
                                                                    <div class="col-4 border-1 border-dark rounded">
                                                                        <img src="resource/productImg/addproductimg.svg" class="img-fluid" style="width: 250px;" id="p2" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-5">
                                                                <input type="file" class="d-none" id="imageUploder" multiple />
                                                                <label for="imageUploder" class="col-12 btn btn-primary" onclick="changeImgUpload();">Upload Images</label>
                                                            </div>



                                                            <div class="col-12 col-lg-12 d-flex justify-content-end gap-4 mt-4 ">
                                                                <div class="col-2 d-grid ">
                                                                    <button class="btn btn-warning" onclick="saveProduct();">Save Product</button>
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