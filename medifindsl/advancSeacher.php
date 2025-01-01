<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanc eSeacher | MedifindSL</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="resource/icon.png" />
</head>

<body>

    <div class="container-fluid">
        <div class="col-12">
            <div class="row">
                <?php include "heder.php"; ?>

                <div class="col-12">
                    <div class="row d-flex justify-content-center bg-secondary">

                        <div class="col-12 col-lg-10  text-center bg-light  shadow mt-4 rounded-top ">
                            <p class="fs-1 font5 ">Advance Search</p>
                        </div>

                        <div class="col-12 col-lg-10  text-center  bg-light  shadow mt-1  ">
                            <div class="row d-flex justify-content-center">

                                <div class="col-11 mt-4 mb-3">
                                    <div class="row d-flex justify-content-center">

                                        <div class="col-9 mb-2">
                                            <input type="text" class="form-control shadow" placeholder="Type key word to Search.." id="text" />
                                        </div>
                                        <div class="col-3 d-grid mb-2">
                                            <button class="btn btn-secondary rounded rounded-3 shadow" onclick="advanceSeacher(0);">Search</button>
                                        </div>

                                        <div class="col-12 col-lg-4 mt-3 mb-3">
                                            <select class="form-select shadow" id="catogery">
                                                <option value="0">Select Carogery</option>
                                                <?php

                                                require "connection.php";

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

                                        <div class="col-12 col-lg-4 mt-3 mb-3">
                                            <select class="form-select shadow" id="brand">
                                                <option value="0">Select brand</option>
                                                <?php
                                                $brand_rs = Database::search("SELECT * FROM `brand` ");
                                                $brand_num = $brand_rs->num_rows;

                                                for ($x = 0; $x < $brand_num; $x++) {
                                                    $brand_data = $brand_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $brand_data["id"]; ?>"><?php echo $brand_data["name"]; ?></option>
                                                <?php
                                                }
                                                ?>



                                            </select>

                                        </div>

                                        <div class="col-12 col-lg-4 mt-3 mb-3">
                                            <select class="form-select shadow" id="modal">
                                                <option value="0">Select Modal</option>
                                                <?php

                                                $model_rs = Database::search("SELECT * FROM `model`");
                                                $model_num = $model_rs->num_rows;

                                                for ($x = 0; $x < $model_num; $x++) {
                                                    $model_data = $model_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $model_data["id"]; ?>"><?php echo $model_data["name"]; ?></option>
                                                <?php
                                                }

                                                ?>

                                            </select>

                                        </div>

                                        <div class="col-12 col-lg-6 mt-3 mb-3">
                                            <select class="form-select shadow" id="condition">
                                                <option value="0">Select Condition</option>
                                                <?php

                                                $condition_rs = Database::search("SELECT * FROM `condition`");
                                                $condition_num = $condition_rs->num_rows;

                                                for ($x = 0; $x < $condition_num; $x++) {
                                                    $condition_data = $condition_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $condition_data["id"]; ?>"><?php echo $condition_data["name"]; ?></option>
                                                <?php
                                                }

                                                ?>

                                            </select>

                                        </div>


                                        <div class="col-12 col-lg-6 mt-3 mb-3 d-flex flex-row justify-content-end  g-4">

                                            <div class="col-6 d-flex flex-row justify-content-start justify-content-lg-end">

                                                <div class="col-11 ">
                                                    <input type="text" class="form-control shadow" placeholder="Price From.." id="pf" />
                                                </div>
                                            </div>

                                            <div class="col-6 d-flex flex-row justify-content-end ">

                                                <div class="col-11 ">
                                                    <input type="text" class="form-control shadow" placeholder="Price To..." id="pt" />
                                                </div>
                                            </div>


                                            <!-- <select class="form-select shadow" id="colour">
                                                <option value="0">Select Colour</option>
                                                <?php

                                                $color_rs = Database::search("SELECT * FROM `colour`");
                                                $color_num = $color_rs->num_rows;

                                                for ($x = 0; $x < $color_num; $x++) {
                                                    $color_data = $color_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $color_data["id"]; ?>"><?php echo $color_data["name"]; ?></option>
                                                <?php
                                                }

                                                ?>

                                            </select> -->

                                        </div>









                                    </div>
                                </div>



                            </div>
                        </div>

                        <div class=" col-12 col-lg-10 bg-body rounded mb-1 mt-2">
                            <div class="row">
                                <div class="offset-8 col-4 mt-2 mb-2 ">
                                    <select class="form-select border border-top-0 border-start-0 border-end-0 border-2 border-dark shadow" id="s">
                                        <option value="0">SORT BY</option>
                                        <option value="1">PRICE LOW TO HIGH</option>
                                        <option value="2">PRICE HIGH TO LOW</option>
                                        <option value="3">QUANTITY LOW TO HIGH</option>
                                        <option value="4">QUANTITY HIGH TO LOW</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-10 rounded-bottom shadow  bg-light mb-5  mt-1">
                            <div class="row d-flex justify-content-center">
                                <div class="col-12 col-lg-10 mt-5 " id="viewproduct">
                                    <div class="row gap-3  d-flex justify-content-center" id="view_area">
                                        <div class=" col-12 mt-5 d-flex justify-content-center">
                                            <span class="fw-bold text-black-50"><i class="bi bi-search h1" style="font-size: 100px;"></i></span>
                                        </div>
                                        <div class=" col-12 mt-3 mb-5 d-flex justify-content-center">
                                            <span class="h1 text-black-50 fw-bold">No Items Searched Yet...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <?php include "footer.php"; ?>


            </div>
        </div>
    </div>

</body>

</html>