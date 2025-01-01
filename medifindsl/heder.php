<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="style2.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>


    <div class="col-12 flex-xl-fill d-none d-lg-block  ">
        <div class="row  mt-1  mb-1" style=" background-image:linear-gradient(60deg,rgb(0, 208, 255) 10%,rgb(3, 87, 118) 70%) ;">

            <?php
            session_start();
            ?>

            <div class="col-12 col-lg-3 align-self-start ">
                <div class="col-12 homelogodiv"></div>



            </div>
            <div class="col-12 col-lg-5 mt-3 mb-3  ">
                <div class="row d-flex justify-content-center">
                    <div class="col-3 mt-2 d-grid border-0 text-center">
                        <a class="hbtn text-white text-decoration-none mt-3 fw-bold border-0" onclick="homeview();">HOME</a>
                    </div>
                    <div class="col-3 mt-2 d-grid text-center ">
                        <a href="aboutus.php" class="hbtn text-white border-0 text-decoration-none mt-3  fw-bold">ABOUT US</a>
                    </div>

                    <div class="col-3 mt-2 d-grid ">
                        <button class="hbtn text-white border-0  fw-bold" onclick="watchlistView();">WATCHLIST</button>
                    </div>

                    <div class="col-3 mt-2 d-grid ">
                        <div class="btn-group">
                            <button type="button" class="hbtn fw-bold border-0 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                OPTIONS
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark " style="width: 250px;">
                                <li><a class="dropdown-item font5 fs-4" href="myProfile.php">My Profile</a></li>
                                <!-- <li><a class="dropdown-item" href="addProduct.php">Add Product</a></li>
                                <li><a class="dropdown-item" href="myProduct.php">My Product</a></li> -->
                                <li><a class="dropdown-item font5 fs-4" href="purchesingHistory.php">Purches History</a></li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item fw-bold " href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-box-arrow-left me-1 "></i> Sign Out</a></li>
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
            <div class=" col-12 col-lg-4  mt-3 mb-3 ">
                <div class="row">
                    <div class="col-10 text-end text-lg-start  col-lg-3 ms-5 ms-lg-0 mt-1 ">
                        <a href="cart.php"><i class="bi bi-cart-check-fill text-white fw-bold" style="font-size: 30px;"></i></a>
                    </div>
                    <?php

                    if (isset($_SESSION["u"])) {
                        $data = $_SESSION["u"];

                    ?>
                        <div class="col-12 col-lg-8 mt-2 d-grid text-center text-lg-end ">
                            <span class="fw-bold fs-3 text-white font3"><b>Hi, Welcome </b><?php echo ($data["fname"]); ?></span>
                        </div>

                    <?php


                    } else {
                    ?>
                        <div class="col-9 ">
                            <div class="row  d-flex justify-content-center">

                                <div class="col-5 text-end">
                                    <label class="text-white mt-2 fs-4  ">New User?</label>
                                </div>

                                <div class="col-12 col-lg-6 mt-2 d-grid  ">
                                    <!-- <button class=" offset-1 offset-lg-0 fs-4 text-center border border-1 fw-bold  rounded rounded-4 signbtn " onclick="goToSignup();">Join Us</button> -->
                                    <a class=" offset-1 offset-lg-0 fs-4 text-center border border-1 text-decoration-none fw-bold  rounded rounded-4 signbtn " data-bs-toggle="modal" data-bs-target="#exampleModalToggle">Sign In</a>

                                </div>

                            </div>

                        </div>


                        <!-- <div class=" col-12 col-lg-4 mt-2 d-grid mt-1">
                            <button class="offset-1 offset-lg-0  fs-4  text-center border border-1 fw-bold  rounded rounded-4 signbtn" onclick="goToSignIn();">Sign In</button>
                        </div> -->
                    <?php

                    }


                    ?>




                </div>
            </div>


            <!-- Button trigger modal -->
            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
            </button> -->

            <!-- log out Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content modelClr ">
                        <div class="modal-header">
                            <h1 class="modal-title fw-bold fs-4 font5" id="exampleModalLabel">Sign Out </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-dialog modal-dialog-centered">
                            <p class="fs-4 font5">Are you sure you want to Sign Out</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="button" class="btn btn-primary" onclick="signout();"> Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- log out Modal -->






        </div>
    </div>

    <div class="col-12 d-block d-lg-none  ">
        <div class="row ">
            <div class="col-2 ">
                <!-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                    ABC
                </button>

                <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="staticBackdropLabel">Offcanvas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div>
                            I will not close if you click outside of me.
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="col-8">
                <div class="col-12 homelogodiv "></div>
            </div>
            <div class="col-2">
                <!-- <div class="collapse" id="navbarToggleExternalContent">
                    <div class="bg-dark p-4">
                        <h5 class="text-white h4">Collapsed content</h5>
                        <span class="text-body-secondary">Toggleable via the navbar brand.</span>
                    </div>
                </div> -->
                <nav class="navbar ">
                    <div class="container-fluid mt-4">
                        <button class="navbar-toggler border-5 " type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                            <span class="navbar-toggler-icon fs-6 fw-bold"></span>
                        </button>
                    </div>
                </nav>

                <div class="offcanvas offcanvas-start " data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="staticBackdropLabel">Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="selectMenu mt-3" onclick="homeview();">
                            <a class=" text-decoration-none text-dark fw-bold font5 offset-1"><i class="bi bi-house-door-fill text-secondary fs-4 me-5"></i> HOME</a>
                        </div>
                        <div class="selectMenu mt-3">
                            <a href="aboutus.php" class="text-decoration-none text-dark fw-bold font5 offset-1"><i class="bi bi-file-earmark-text-fill text-secondary fs-4 me-5"></i> ABOUT US </a>
                        </div>
                        <div class="selectMenu mt-3">
                            <a href="watchlist.php " class="text-decoration-none text-dark fw-bold font5 offset-1"> <i class="bi bi-heart-fill text-secondary fs-4 me-5"></i> WATCHLIST</a>
                        </div>
                        <div class="selectMenu mt-3">
                            <!-- <a class="text-decoration-none text-dark fw-bold font5 offset-1"><i class="bi bi-gear-fill text-secondary fs-4 me-5"></i> OPTION</a> -->
                            <div class="btn-group offset-1">
                                <i class="bi bi-heart-fill text-secondary fs-4 me-5"></i>
                                <button type="button" class="optionBtn text-dark  fw-bold border-0 dropdown-toggle  font5" data-bs-toggle="dropdown" aria-expanded="false">
                                 OPTIONS
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark " style="width: 250px;">
                                    <li><a class="dropdown-item font5 fs-5" href="myProfile.php">My Profile</a></li>
                                    <!-- <li><a class="dropdown-item" href="addProduct.php">Add Product</a></li>
                                <li><a class="dropdown-item" href="myProduct.php">My Product</a></li> -->
                                    <li><a class="dropdown-item font5 fs-5" href="purchesingHistory.php">Purches History</a></li>

                                    <!-- <li><a class="dropdown-item fw-bold " href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-box-arrow-left me-1 "></i> Sign Out</a></li> -->
                                </ul>
                            </div>
                        </div>

                        <hr />

                        <div class="selectMenu mt-2">
                            <?php

                            if (isset($_SESSION["u"])) {
                                $data = $_SESSION["u"];

                            ?>
                                <a class=" offset-1 fw-bold mt-1 mb-1" href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-box-arrow-left me-1 "></i> Sign Out</a>

                            <?php


                            } else {
                            ?>

                                <a class=" offset-1 offset-lg-0 fs-6 text-center   fw-bold  rounded rounded-4  mt-1 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">Sign In / Register</a>





                            <?php

                            }


                            ?>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Sing In Model -->
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content adminbox3 rounded rounded-3 ">
                <div class="modal-header d-flex justify-content-center ">
                    <!-- <h1 class="modal-title fs-4 font5  " id="exampleModalToggleLabel">Sign In</h1> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">

                    <div class="col-12 bg-light rounded rounded-3 ">
                        <div class="row d-flex justify-content-center">
                            <div class="col-12 col-lg-11 ">
                                <div class="row">
                                    <div class=" col-12 text-center">
                                        <p class="font5 fs-4">Sign In</p>
                                    </div>
                                    <div class="col-12 mt-4 mb-1">
                                        <span class="text-danger" id="msg2"></span>
                                    </div>

                                    <div class="col-12 ">
                                        <label class="form-label">Email</label>
                                        <input type="emil" class="form-control" id="email2" value="<?php $email; ?>" />
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password2" value="<?php $password; ?>" />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="rememberme" />
                                            <label class="form-check-label"> Remember me </label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-end mb-3">
                                        <a href="#" class="link-primary">Forgot Password</a>
                                    </div>
                                    <div class="col-12 pb-5 mt-3">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-12 col-lg-8 d-grid pb-2">
                                                <button class="btn homeSignInBoxbtn text-white fw-bold font5 shadow border-0 rounded-3 " onclick="signIn();">Sign In</button>
                                                <!-- onclick="signIn();" -->
                                            </div>
                                            <div class="col-12 col-lg-8 d-grid pb-2 text-center">
                                                <a href="index.php" class=" text-dark">New to medifind? Sign Up</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>









                </div>
                <!-- <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button>
                        </div> -->
            </div>
        </div>
    </div>
    <!-- Sing In Model -->




    <!-- <script src="bootstrap.bundle.js"></script> -->
    <script src="script.js"></script>
</body>

</html>