<?php

require "connection.php";

session_start();

if (isset($_SESSION["au"])) {
    $Uemail = $_SESSION["au"]["email"];

    $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='".$Uemail."'");
    $user_data = $user_rs->fetch_assoc();


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User Profile | MEDIFINDSL</title>

    <link rel="stylesheet" href="style2.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


    <link rel="icon" class="mainicon" href="resource/icon.png" />

</head>

<body>

    <div class="container-fluid">
        <div class="col-12">
            <div class="row">
                <!-- heder -->
                <div class="col-12 border mt-2 bg-light ">
                    <div class="row">

                        <div class="col-12 col-lg-2 adminhomelogo"></div>

                        <div class="col-3 ">
                            <p class="fs-5 mb-1 mt-4 font5 fw-bold">Hii <?php echo $user_data["fname"]; ?>. Welcome To Admin Panel </p>
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

                <!-- Menu -->
                <div class="col-12">
                    <div class="row">

                        <div class="col-12 col-lg-2 adminmenuclr shadow mt-4" style="height: 700px;">
                            <div class="row ">
                                <div class="col-12  mt-5 d-flex align-content-center">
                                    <a href="adminPanel.php" class="mt-2 mx-3 mt-3 mb-3 fs-6 text-white text-decoration-none   font5"><i class="bi bi-speedometer me-1"></i> DASHBORD</a>
                                </div>

                                <div class="col-12  mt-3 d-flex align-content-center">
                                    <p class="mt-2 mx-3 mt-3 mb-3 fs-6 text-white  font5"><i class="bi bi-house-heart me-1"></i> HOME</p>
                                </div>

                                <div class="col-12  selectmenu mt-3 d-flex align-content-center">
                                    <a href="adminUserProfile.php" class="mt-3 mx-3   mb-3 text-decoration-none  fs-6 text-white  font5"><i class="bi bi-person-fill me-1"></i> MY PROFILE</a>
                                </div>

                                <div class="col-12  mt-3 d-flex align-content-center">
                                    <a href="adminManageProduct.php" class="mt-2 mx-3 mt-3 mb-3 fs-6 text-decoration-none text-white  font5"><i class="bi bi-basket2 me-1"></i> MANAGE PRODUCT</a>
                                </div>

                                <div class="col-12  mt-3 d-flex align-content-center">
                                    <a href="adminManageUsers.php" class="mt-2 mx-3 mt-3 mb-3 text-decoration-none fs-6 text-white  font5"><i class="bi bi-people-fill me-1"></i> MANAGE USERS</a>
                                </div>

                                <div class="col-12 mt-5 ">
                                    <hr class="text-white border-1" />
                                </div>

                                <div class="col-12  mt-3 d-flex align-content-center">
                                        <a class="mx-3 mt-3 mb-3 fs-6 text-white text-decoration-none font5" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i class="bi bi-box-arrow-left me-1 "></i> SIGN OUT</a>
                                    </div>


                                    <!-- log out Modal -->
                                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content modelClr ">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fw-bold fs-4 font5" id="exampleModalLabel">Sign Out to buyer Account</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <p class="fs-4 font5">Are you sure you want Sign Out to Admin Account</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                    <button type="button" class="btn btn-primary" onclick="adminSignout();"> Yes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- log out Modal -->

                            </div>
                        </div>

                        <!-- Menu -->


                        <div class="col-12 col-lg-10 px-lg-5  mt-4 ">
                            <div class="row">
                                <div class="col-12 border shadow   rounded rounded-4 ">
                                    <div class="row ">

                                        <div class="col-12 col-lg-3 mx-lg-4 mt-3 ">
                                            <div class="row d-flex justify-content-center ">
                                                <div class="col-12   rounded-5 p-4">
                                                    <div class="col-12  rounded-5 shadow" style="height: 300px;">
                                                    <?php
                                                    if ($user_num == 1) {
                                                        $uimag_data = $uimag_rs->fetch_assoc();
                
                                                    ?>
                                                        <img src="<?php echo $uimag_data["path"]; ?>" class="rounded-circle mt-2 mb-1" style="width: 300px ; height: 300px;" />
                
                                                    <?php
                
                
                                                    } else {
                                                    ?>
                                                        <img src="resource/profile_img/newUser.svg" class="rounded-circle mt-2 mb-1" style=" height: 300px;" />
                
                                                    <?php
                
                                                    }
                                                    ?>
                                                    </div>
                                                </div>

                                                <!-- <div class="col-12 ">
                                                    <div class="row text-center">
                                                        <label class="fs-2 fw-bold font5 text-white">Supun Sulakshana</label>
                                                        <p>supunsulakshana@gmail.com</p>
                                                    </div>

                                                </div> -->
                                            </div>

                                        </div>

                                        <div class="col-12 col-lg-8  p-4 mt-3 mb-5">
                                            <div class="col-12 ">
                                                <div class="row">
                                                    <div class="col-12 col-lg-8 mx-5 mb-3 ">
                                                        <p class="fs-1 fw-bold mt-4 font5 text-warning mb-1">Spun Sulakshana</p>
                                                        <p class="fs-5 mb-3">supnsulakshana2001@gmail.com</p>
                                                        <p class="fs-5 mb-1">0716029210</p>



                                                    </div>

                                                    <!-- <div class="col-12 col-lg-6 mb-3">
                                                        <label class="fs-5 mb-1">Last Name</label>
                                                        <input type="text" class="form-control"/>
                                                    </div>

                                                    <div class="col-12 col-lg-6 mb-3">
                                                        <label class="fs-5 mb-1">Mobile No</label>
                                                        <input type="text" class="form-control"/>
                                                    </div>

                                                    <div class="col-12 col-lg-6 mb-3">
                                                        <label class="fs-5 mb-1">Gender</label>
                                                        <input type="text" class="form-control"/>
                                                    </div>

                                                    <div class="col-12 col-lg-12 mb-3">
                                                        <label class="fs-5 mb-1">Email</label>
                                                        <input type="text" class="form-control"/>
                                                    </div>

                                                    <div class="col-12 col-lg-12 mb-3">
                                                        <label class="fs-5 mb-1">Password</label>
                                                        <input type="text" class="form-control"/>
                                                    </div>

                                                    <div class="col-12 col-lg-12 mb-3">
                                                        <label class="fs-5 mb-1">Address</label>
                                                        <input type="text" class="form-control"/>
                                                    </div> -->

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
    echo ("Invalid User");
}
?>