<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | medifindsl</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="resource/icon.png" />


</head>

<body class="">
    <div class="container-fluid">

        <?php include "heder.php"; ?>
        <?php
        require "connection.php";

        if (isset($_SESSION["u"])) {
            $email = $_SESSION["u"]["email"];

            $details_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON
            gender.id=user.gender_id WHERE `email`='" . $email . "' ");

            $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "' ");

            $address_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON
            user_has_address.city_id=city.id INNER JOIN `district` ON
            city.district_id=district.id INNER JOIN `province` ON 
            district.province_id=province.id WHERE `user_email`='" . $email . "' ");

            $image_num = $image_rs->num_rows;


            $details_data = $details_rs->fetch_assoc();
            $image_data = $image_rs->fetch_assoc();
            $address_data = $address_rs->fetch_assoc();




        ?>
            <div class="col-12 ">
                <div class="row d-flex justify-content-center mb-5">

                    <div class="col-12 col-lg-10 mt-5  rounded rounded-4 myshadow1 bg-secondary bg-opacity-10 b">

                        <div class="col-12 profilebackimg" style="height: 200px;">
                            <div class="row px-2 d-flex justify-content-end">
                                <!-- <div class="col-12 col-lg-10">
                                    <h1 class="col-12 text-center font4 fw-bold mb-6 mt-4 myprofile">My Profile</h1>
                                </div> -->
                                <div class="col-3 col-lg-1  d-flex justify-content-center justify-content-lg-center bg-dark  bg-opacity-75 me-lg-4  shadow " style="border-bottom-left-radius: 14px; border-bottom-right-radius: 14px;">
                                    <a class="fs-4 text-white me-2 fw-bold mt-1 text-decoration-none mb-2" data-bs-toggle="modal" data-bs-target="#editeDeatailsBox1" style="cursor: pointer;">Edit</a>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 ">
                            <div class="row ">

                                <div class=" d-none d-md-none d-lg-block rounded-4" style="width: 250px; height: 250px; position: absolute; margin-top: -50px; margin-left: 100px; box-shadow: 3px 3px 10px 1px rgb(0, 0, 0); ">
                                    <div class="d-flex flex-column align-items-center text-center rounded rounded-3 ">
                                        <?php

                                        if (empty($image_data["path"])) {

                                        ?>
                                            <img src="resource/profile_img/newUser.svg" class="rounded-4  " style="width:250px ; height: 250px;" id="" />

                                        <?php

                                        } else {
                                        ?>
                                            <img src="<?php echo $image_data["path"]; ?>" class="rounded-4" style="width:250px ; height: 250px;" id="" />

                                        <?php
                                        }

                                        ?>

                                    </div>
                                </div>

                                <div class="mx-lg-5 col-0 col-md-0 col-lg-3 d-none d-md-none  d-lg-block  ">
                                    <div class="col-12 " style="height: 200px;"></div>
                                    <div class="col-12 mt-3">
                                        <h1 class="col-12 text-center font5 fw-bold  mt-3 myprofile">My Profile</h1>

                                    </div>

                                    <div class="col-12 d-flex justify-content-center align-content-center" style="height: 100px;">
                                        <div class="text-center text-md-start">
                                            <ul class="list-unstyled list-inline d-flex ">

                                                <li class="list-inline-item">
                                                    <a href="#" class="form-floating text-primary"><i class="bi bi-facebook socailIcon"></i></a>
                                                </li>

                                                <li class="list-inline-item">
                                                    <a href="#" class="form-floating text-primary"><i class="bi bi-instagram mx-2 socailIcon"></i></a>
                                                </li>

                                                <li class="list-inline-item">
                                                    <a href="#" class="form-floating text-primary"><i class="bi bi-twitter mx-2 socailIcon"></i></a>
                                                </li>



                                                <li class="list-inline-item">
                                                    <a href="#" class="form-floating text-primary"><i class="bi bi-linkedin mx-2 socailIcon"></i></a>
                                                </li>


                                            </ul>
                                        </div>

                                    </div>

                                    <?php

                                    $seller_rs = Database::search("SELECT * FROM `sellers` WHERE `user_email`='" . $email . "'");
                                    $seller_num = $seller_rs->num_rows;
                                    $seller_data = $seller_rs->fetch_assoc();

                                    if ($seller_num == 1) {

                                        if ($seller_data["seller_status_id"] == "2") {
                                            echo ("your Accont hass been log out");
                                        } else {
                                    ?>
                                            <div class="col-12 d-flex justify-content-lg-center justify-content-center">
                                                <a href="#sellerACbox" class="btn text-decoration-none text-white font5 fw-bold swithAccounbtn rounded-3  me-4" onclick="allradyhaveAccount();">Switch to Seller Account</a>
                                            </div>
                                        <?php

                                        }
                                    } else {
                                        ?>
                                        <div class="col-12 d-flex justify-content-lg-center justify-content-center">
                                            <a href="#sellerACbox" class="btn text-decoration-none text-white font5 fw-bold swithAccounbtn rounded-3  me-4" onclick="switchSellerAccont();">Create a Seller Account</a>
                                        </div>
                                    <?php
                                    }

                                    ?>

                                    <!-- <div class="col-12 d-flex justify-content-lg-center justify-content-center">
                                        <a href="#sellerACbox" class="btn text-decoration-none text-white font5 fw-bold swithAccounbtn rounded-3  me-4" onclick="switchSellerAccont();">Switch to Seller Account</a>
                                    </div> -->

                                </div>



                                <div class=" mx-lg-5 col-12 col-lg-2 mt-4  d-lg-none d-md-block d-block">
                                    <div class="col-12 mt-3">
                                        <h1 class="col-12 text-center font5 fw-bold  mt-3 myprofile">My Profile</h1>

                                    </div>
                                    <div class="d-flex flex-column align-items-center text-center rounded rounded-3 ">
                                        <?php

                                        if (empty($image_data["path"])) {

                                        ?>
                                            <img src="resource/profile_img/newUser.svg" class="rounded  " style="width:150px ;" id="" />

                                        <?php

                                        } else {
                                        ?>
                                            <img src="<?php echo $image_data["path"]; ?>" class="rounded  " style="width:150px ;" id="" />

                                        <?php
                                        }

                                        ?>

                                    </div>

                                    <?php

                                    // $seller_rs = Database::search("SELECT * FROM `sellers` WHERE `user_email`='" . $email . "'");
                                    // $seller_num = $seller_rs->num_rows;
                                    // $seller_data = $seller_rs->fetch_assoc();
                                    if ($seller_num == 1) {

                                        if ($seller_data["seller_status_id"] == "2") {
                                            echo ("your Accont hass been log out");
                                        } else {
                                    ?>
                                            <div class="col-12 mt-3 mx-2 d-flex justify-content-lg-end justify-content-center">
                                                <a href="#sellerACbox" class="btn  text-decoration-none text-white font5 fw-bold swithAccounbtn rounded-3  me-4" onclick="allradyhaveAccount();">Switch to Seller Account</a>
                                            </div>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="col-12 mt-3 mx-2 d-flex justify-content-lg-end justify-content-center">
                                            <a href="#sellerACbox" class="btn  text-decoration-none text-white font5 fw-bold swithAccounbtn rounded-3  me-4" onclick="switchSellerAccont();">Create a Seller Account</a>
                                        </div>
                                    <?php

                                    }


                                    ?>


                                </div>
                                <div class="col-12 col-lg-6 mx-lg-5 mt-4">
                                    <div class="row d-flex justify-content-center justify-content-md-start justify-content-lg-start">
                                        <div class="col-12 row mt-2">

                                            <p class="col-12 fs-2 font5 fw-bold"><?php echo $details_data["fname"] . " " . $details_data["lname"]; ?></p>

                                        </div>

                                        <hr />



                                        <div class="col-12 mt-2">
                                            <div class="d-flex flex-column flex-lg-row ">
                                                <div class="col-12 col-lg-3">
                                                    <label class="form-label fs-5 text-primary fw-bold">Email :</label>
                                                </div>
                                                <div class="col-12 col-lg-6 ">
                                                    <!-- <label class="fs-5 font5"><?php echo $details_data["email"]; ?></label> -->
                                                    <input type="text" class="form-control mt-lg-2 " readonly value="<?php echo $details_data["email"]; ?>" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-2">
                                            <div class="d-flex flex-column flex-lg-row">
                                                <div class="col-12 col-lg-3">
                                                    <label class="form-label fs-5 text-primary  fw-bold  mt-2">Password :</label>
                                                </div>
                                                <div class="col-12 col-lg-6 ">
                                                    <input type="password" class=" form-control mt-2 " readonly value="<?php echo $details_data["password"]; ?>" />
                                                </div>
                                            </div>

                                        </div>


                                        <div class="col-12 mt-2">
                                            <div class="row">
                                                <div class="col-5 col-lg-3">
                                                    <label class="form-label fs-5 text-primary  fw-bold  mt-2">Mobile No :</label>
                                                </div>
                                                <div class="col-6 col-lg-6 ">
                                                    <label class="fs-5 font5 mt-2"><?php echo $details_data["mobile"]; ?></label>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="col-12 mt-2 ">
                                            <div class="row">
                                                <div class="col-5 col-lg-3 ">
                                                    <label class="form-label fs-5 text-primary fw-bold">Gender :</label>
                                                </div>
                                                <div class="col-6 ">
                                                    <label class="fs-5 font5"> <?php echo $details_data["gender_name"]; ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-2 ">
                                            <div class="d-flex flex-column flex-lg-row">
                                                <div class="col-12 col-lg-3 ">
                                                    <label class="form-label fs-5 text-primary fw-bold">Register Date :</label>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <label class="fs-5 font5"> <?php echo $details_data["join_date"]; ?></label>
                                                </div>
                                            </div>
                                        </div>



                                        <?php
                                        if (!empty($address_data["line1"])) {
                                        ?>
                                            <div class="col-12 mt-2">
                                                <div class="d-flex flex-column flex-lg-row">
                                                    <div class="col-12 col-lg-3">
                                                        <label class="form-label fs-5 text-primary fw-bold">Address 1 :</label>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <label class="fs-5 font5"> <?php echo $address_data["line1"]; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php

                                        } else {
                                        ?>
                                            <div class="col-12 mt-2">
                                                <div class="d-flex flex-column flex-lg-row">
                                                    <div class="col-12 col-lg-3">
                                                        <label class="form-label fs-5 text-primary fw-bold">Address 1 :</label>
                                                    </div>
                                                    <div class="col-12 col-lg-6 ">
                                                        <label class="fs-5 text-secondary font5"> Address line 1</label>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }

                                        ?>


                                        <?php
                                        if (!empty($address_data["line2"])) {
                                        ?>
                                            <div class="col-12 mt-2 mb-5">
                                                <div class="d-flex flex-column flex-lg-row">
                                                    <div class="col-12 col-lg-3">
                                                        <label class="form-label fs-5 text-primary fw-bold">Address 2 :</label>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <label class="fs-5 font5"> <?php echo $address_data["line2"]; ?></label>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php

                                        } else {
                                        ?>
                                            <div class="col-12 mt-2 mb-5">
                                                <div class="d-flex flex-column flex-lg-row">
                                                    <div class="col-12 col-lg-3">
                                                        <label class="form-label fs-5 text-primary fw-bold">Address 2 :</label>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <label class="fs-5 font5 text-secondary"> Address Line 2</label>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php

                                        }


                                        $province_rs = Database::search("SELECT * FROM `province`");
                                        $district_rs = Database::search("SELECT * FROM `district`");
                                        $city_rs = Database::search("SELECT * FROM `city`");

                                        ?>



                                        <div class="col-6 mt-2">
                                            <label class="form-label ">province</label>
                                            <select class="form-select" id="">
                                                <option>Select Province</option>
                                                <?php
                                                $province_num = $province_rs->num_rows;
                                                for ($x = 0; $x < $province_num; $x++) {
                                                    $province_data = $province_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $province_data["id"]; ?>" <?php
                                                                                                        if (!empty($address_data["province_id"])) {

                                                                                                            if ($province_data["id"] == $address_data["province_id"]) {
                                                                                                        ?>selected<?php
                                                                                                                }
                                                                                                            }

                                                                                                                    ?>><?php echo $province_data["name"]; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-6 mt-2">
                                            <label class="form-label ">District</label>
                                            <select class="form-select" id="">
                                                <option value="0">Select District</option>
                                                <?php
                                                $district_num = $district_rs->num_rows;
                                                for ($x = 0; $x < $district_num; $x++) {
                                                    $district_data = $district_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $district_data["id"]; ?>" <?php
                                                                                                        if (!empty($address_data["district_id"])) {

                                                                                                            if ($district_data["id"] == $address_data["province_id"]) {
                                                                                                        ?>selected<?php
                                                                                                                }
                                                                                                            }

                                                                                                                    ?>><?php echo $district_data["name"]; ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>

                                        <div class="col-6 mt-2 mb-5">
                                            <label class="form-label ">City</label>
                                            <select class="form-select" id="">
                                                <option>Select City</option>
                                                <?php
                                                $city_num = $city_rs->num_rows;
                                                for ($x = 0; $x < $city_num; $x++) {
                                                    $city_data = $city_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $city_data["id"]; ?>" <?php
                                                                                                    if (!empty($address_data["district_id"])) {

                                                                                                        if ($city_data["id"] == $address_data["province_id"]) {
                                                                                                    ?>selected<?php
                                                                                                            }
                                                                                                        }

                                                                                                                ?>><?php echo $city_data["name"]; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <?php

                                        if (!empty($address_data["postal_code"])) {
                                        ?>
                                            <div class="col-6 mt-2 mb-5">
                                                <label class="form-label ">Postal Code</label>
                                                <input type="text" class="col-12 form-control " value="<?php echo $address_data["postal_code"]; ?>" id="" />
                                            </div>
                                        <?php

                                        } else {
                                        ?>
                                            <div class="col-6 mt-2  mb-5">
                                                <label class="form-label ">Postal Code</label>
                                                <input type="text" class="col-12 form-control " value="" id="" />
                                            </div>
                                        <?php

                                        }


                                        ?>


                                        <!-- <div class="col-12 d-grid mt-3 mb-5">
                                            <button class="btn btn-dark text-white fw-bold" onclick="updateProfile();">Update My Profile</button>
                                        </div> -->

                                        <div class="col-12  mb-4 border d-none" id="sellerACbox">
                                            <div class="row ">
                                                <div class="col-11">
                                                    <div class="row">
                                                        <div class="col-12 mb-3">
                                                            <label class="mx-lg-3 font5 fs-4">Store Name</label>
                                                            <input type="text" class="form-control mx-lg-3 font5" placeholder="Enter your Company name..." id="store_name" />
                                                        </div>

                                                        <div class="col-12 mb-3">
                                                            <label class="mx-lg-3 font5 fs-4">Business Registeration Code</label>
                                                            <input type="text" class="form-control mx-lg-3 font5" placeholder="Enter your Bsiness code..." id="BR_code" />
                                                        </div>

                                                        <div class="col-12 mb-3">
                                                            <label class="mx-lg-3 font5 fs-4">Location</label>
                                                            <input type="text" class="form-control mx-lg-3 font5" placeholder="Enter your location link..." id="location" />
                                                        </div>




                                                    </div>
                                                </div>
                                                <div class=" mt-4 mb-4 col-11 d-flex justify-content-end  rounded-3">
                                                    <a class="btn btn-warning text-decoration-none font5" onclick="verifySeller('<?php echo $email; ?>');">verifiy Seller account</a>
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Modal 1................................... -->

                        <div class="modal fade" id="sellerverifiymodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Verfication </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-11 mb-3">
                                            <label class="mx-lg-3 font5 fs-4">Verification Code</label>
                                            <input type="text" class="form-control mx-lg-3 font5" placeholder="Enter your Varification Code..." id="vcode" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="verifiycode('<?php echo $email; ?>');">Verify</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal 1................................... -->




                


                        <!-- modal  2................................................................................................................................................................................................................................................ -->


                        <div class="modal fade" id="editeDeatailsBox1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="col-11 text-center ">
                                            <h1 class="modal-title fs-4" id="staticBackdropLabel">Change your profile Details</h1>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body ">
                                        <div class="col-12">
                                            <div class="row">

                                                <div class="col-12 mb-4">
                                                    <div class="row d-flex justify-content-center">
                                                        <div class="col-12 d-flex justify-content-center">
                                                            <div class=" " style="width: 100px; height: 100px; border-radius: 80px;">

                                                                <?php

                                                                if (empty($image_data["path"])) {

                                                                ?>
                                                                    <img src="resource/profile_img/newUser.svg" style="width:100px; height: 100px; border-radius: 80px;" id="viewImg" />

                                                                <?php

                                                                } else {
                                                                ?>
                                                                    <img src="<?php echo $image_data["path"]; ?>" style="width:100px; height: 100px; border-radius: 80px;" id="viewImg" />

                                                                <?php
                                                                }
                                                                ?>

                                                            </div>
                                                        </div>

                                                        <div class="col-12 d-flex justify-content-center">
                                                            <input type="file" class="d-none" id="profileimg" accept="image/*" />
                                                            <label for="profileimg" class=" btn btn-secondary font5  mt-3 mb-5 text-white" onclick="chamgeImage();">Update Profile Image</label>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-6 mt-2">

                                                    <label class="form-label col-12 fw-bold font5 ">First Name</label>
                                                    <input type="text" class="col-12 shadow  form-control " value="<?php echo $details_data["fname"]; ?>" id="fname" />
                                                </div>

                                                <div class="col-6 mt-2">
                                                    <label class="form-label fw-bold font5">Last Name</label>
                                                    <input type="text" class="col-12 shadow form-control" value="<?php echo $details_data["lname"]; ?>" id="lname" />
                                                </div>

                                                <div class="col-6 mt-2">
                                                    <label class="form-label fw-bold font5">Mobile</label>
                                                    <input type="text" class="col-12 shadow form-control" value="<?php echo $details_data["mobile"]; ?>" id="mobile" />
                                                </div>

                                                <div class="col-6  mt-2">
                                                    <label class="form-label fw-bold font5">Gender</label>
                                                    <input type="text" class="col-12 shadow form-control" readonly value="<?php echo $details_data["gender_name"]; ?>" />
                                                </div>

                                                <div class="col-12 mt-2">
                                                    <label class="form-label fw-bold font5">Password</label>
                                                    <input type="password" class="col-12 shadow  form-control" value="<?php echo $details_data["password"]; ?>" />
                                                </div>

                                                <div class="col-12 mt-2">
                                                    <label class="form-label fw-bold font5">Email</label>
                                                    <input type="text" class="col-12 shadow  form-control" readonly value="<?php echo $details_data["email"]; ?>" />
                                                </div>


                                                <div class="col-12 mt-2">
                                                    <label class="form-label fw-bold font5">Register Date</label>
                                                    <input type="text" class="col-12 shadow  form-control" readonly value="<?php echo $details_data["join_date"]; ?>" />
                                                </div>

                                                <?php
                                                if (!empty($address_data["line1"])) {
                                                ?>
                                                    <div class="col-12 mt-2">
                                                        <label class="form-label fw-bold font5">Address 1</label>
                                                        <input type="text" class="col-12 shadow form-control" value="<?php echo $address_data["line1"]; ?>" id="line1" />
                                                    </div>
                                                <?php

                                                } else {
                                                ?>
                                                    <div class="col-12 mt-2">
                                                        <label class="form-label fw-bold font5">Address 1</label>
                                                        <input type="text" class="col-12 shadow form-control" value="" id="line1" />
                                                    </div>
                                                <?php
                                                }

                                                ?>


                                                <?php
                                                if (!empty($address_data["line2"])) {
                                                ?>
                                                    <div class="col-12 mt-2 mb-5">
                                                        <label class="form-label fw-bold font5">Address 2</label>
                                                        <input type="text" class="col-12 shadow form-control" value="<?php echo $address_data["line2"]; ?>" id="line2" />
                                                    </div>

                                                <?php

                                                } else {
                                                ?>
                                                    <div class="col-12 mt-2 mb-5">
                                                        <label class="form-label fw-bold font5">Address 2</label>
                                                        <input type="text" class="col-12 shadow form-control" value="" id="line2" />
                                                    </div>
                                                <?php

                                                }


                                                $province_rs = Database::search("SELECT * FROM `province`");
                                                $district_rs = Database::search("SELECT * FROM `district`");
                                                $city_rs = Database::search("SELECT * FROM `city`");

                                                ?>



                                                <div class="col-6 mt-2">
                                                    <label class="form-label fw-bold font5">province</label>
                                                    <select class="form-select shadow" id="province">
                                                        <option>Select Province</option>
                                                        <?php
                                                        $province_num = $province_rs->num_rows;
                                                        for ($x = 0; $x < $province_num; $x++) {
                                                            $province_data = $province_rs->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $province_data["id"]; ?>" <?php
                                                                                                                if (!empty($address_data["province_id"])) {

                                                                                                                    if ($province_data["id"] == $address_data["province_id"]) {
                                                                                                                ?>selected<?php
                                                                                                                        }
                                                                                                                    }

                                                                                                                            ?>><?php echo $province_data["name"]; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-6 mt-2">
                                                    <label class="form-label fw-bold font5">District</label>
                                                    <select class="form-select shadow" id="district">
                                                        <option value="0">Select District</option>
                                                        <?php
                                                        $district_num = $district_rs->num_rows;
                                                        for ($x = 0; $x < $district_num; $x++) {
                                                            $district_data = $district_rs->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $district_data["id"]; ?>" <?php
                                                                                                                if (!empty($address_data["district_id"])) {

                                                                                                                    if ($district_data["id"] == $address_data["province_id"]) {
                                                                                                                ?>selected<?php
                                                                                                                        }
                                                                                                                    }

                                                                                                                            ?>><?php echo $district_data["name"]; ?></option>
                                                        <?php
                                                        }
                                                        ?>

                                                    </select>
                                                </div>

                                                <div class="col-6 mt-2">
                                                    <label class="form-label fw-bold font5">City</label>
                                                    <select class="form-select shadow" id="city">
                                                        <option>Select City</option>
                                                        <?php
                                                        $city_num = $city_rs->num_rows;
                                                        for ($x = 0; $x < $city_num; $x++) {
                                                            $city_data = $city_rs->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $city_data["id"]; ?>" <?php
                                                                                                            if (!empty($address_data["district_id"])) {

                                                                                                                if ($city_data["id"] == $address_data["province_id"]) {
                                                                                                            ?>selected<?php
                                                                                                                    }
                                                                                                                }

                                                                                                                        ?>><?php echo $city_data["name"]; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <?php

                                                if (!empty($address_data["postal_code"])) {
                                                ?>
                                                    <div class="col-6 mt-2 ">
                                                        <label class="form-label fw-bold font5">Postal Code</label>
                                                        <input type="text" class="col-12 shadow form-control " value="<?php echo $address_data["postal_code"]; ?>" id="pcode" />
                                                    </div>
                                                <?php

                                                } else {
                                                ?>
                                                    <div class="col-6 mt-2 ">
                                                        <label class="form-label fw-bold font5">Postal Code</label>
                                                        <input type="text" class="col-12  shadow form-control " value="" id="pcode" />
                                                    </div>
                                                <?php

                                                }


                                                ?>





                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closemodel();">Close</button>
                                        <button type="button" class="btn btn-dark" onclick="updateProfile();">Update My profile</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- modal................................................................................................................................................................................................................................................ -->

                    </div>
                </div>
            </div>

        <?php

        } else {
        ?>
            <div class="col-12" style="height: 40vh;">
                <div class="row d-flex justify-content-center align-items-center" style="height: 40vh;">
                    <a href="index.php" class=" shadow col-6 col-lg-3 btn btn-danger text-decoration-none fs-3 text-white fw-bold ">Please Login First</a>
                </div>
            </div>
        <?php

            // header("Location:home.php");
            // echo ("Please Login First");
        }
        ?>

        <?php include "footer.php"; ?>


    </div>



    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>

</body>

</html>