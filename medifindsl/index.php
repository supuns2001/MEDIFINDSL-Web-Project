<?php

require "connection.php";

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Medifindsl</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="resource/icon.png" />

</head>

<body class=" main-body  ">
    <div class="container-fluid vh-100   d-flex justify-content-center">
        <div class="row d-flex justify-content-center  ">

            <div class="col-12 col-lg-7  backgroundSecond ">

                <!-- content -->
                <div class="col-12 p-3  main_d2">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-lg-11">
                            <div class="row gap-5">
                                <div class="  main-d col-lg-11">

                                    <div class="col-12 col-lg-11 " id="signupbox">
                                        <div class="row g-2 p-3  ">
                                            <div class="col-12 ">
                                                <div class="col-12 logo"></div>
                                                <div class="col-12 text-center">
                                                    <p class="fs-3 fw-bold font6">Welcome to MedifindSL</p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <p class="topic2 font5">Sign Up</p>
                                            </div>
                                            <div class="col-12 d-none" id="msgdiv">
                                                <div class="alert alert-warning fw-bold" role="alert" id="alertdiv">
                                                    <i class="bi bi-exclamation-triangle-fill fs-5" id="msg"></i>

                                                </div>

                                            </div>
                                            <div class="col-6">
                                                <label class="form-label fs-5 font5">First Name</label>
                                                <input type="text" class="form-control font5" id="f" placeholder="ex:Supun"/>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label fs-5 font5">Last Name</label>
                                                <input type="text" class="form-control font5" id="l" placeholder="ex:Sulakshana"/>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label fs-5 font5">Email</label>
                                                <input type="email" class="form-control font5" id="e" placeholder="ex:supun@gmail.com"/>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label fs-5 font5">Password</label>
                                                <input type="password" class="form-control font5" id="p" placeholder="*********" />
                                            </div>
                                            <div class="col-12 pb-4">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label class="form-label fs-5 font5">Mobile</label>
                                                        <input type="text" class="form-control font5" id="m" placeholder="*********"/>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label fs-5 font5">Gender</label>
                                                        <select class="form-select" id="g">
                                                            <?php

                                                            $gender_rs = Database::search("SELECT * FROM `gender` ");

                                                            $gender_num = $gender_rs->num_rows;

                                                            for ($x = 0; $x < $gender_num; $x++) {

                                                                $gender_data = $gender_rs->fetch_assoc();

                                                            ?>

                                                                <option value="<?php echo $gender_data["id"]; ?>"><?php echo $gender_data["gender_name"]; ?></option>

                                                            <?php

                                                            }


                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-6 d-grid px-3 pb-4">
                                                <button class="myProductbluebtn rounded-2 " onclick="signup();">Sign Up</button>
                                            </div>
                                            <div class="col-12 col-lg-6 d-grid px-3 pb-4">
                                                <button class="btn btn-dark  " onclick="changeSigninViwe();">Allready have an accont? Sign in</button>
                                            </div>



                                        </div>


                                    </div>




                                    <div class=" col-12 col-lg-11 p-5 d-none" id="signinbox">
                                        <div class="row g-2">
                                            <div class="col-12 ">
                                                <div class="col-12 logo"></div>
                                                <div class="col-12 text-center">
                                                    <p class="fs-3 fw-bold font6">Welcome to MedifindSL</p>
                                                </div>
                                            </div>
                                            <div class="col-12  pt-5">
                                                <p class="topic2">Sign In </p>
                                                <span class="text-danger" id="msg2"></span>
                                            </div>

                                            <?php

                                            $email = "";
                                            $password = "";

                                            if (isset($_COOKIE["email"])) {
                                                $email = $_COOKIE["email"];
                                            }
                                            if (isset($_COOKIE["password"])) {
                                                $password = $_COOKIE["password"];
                                            }

                                            ?>



                                            <div class="col-12">
                                                <label class="form-label fs-5 font5">Email</label>
                                                <input type="emil" class="form-control" id="email2" value="<?php echo $email; ?>" placeholder="ex:supun@gmail.com"/>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label fs-5 font5">Password</label>
                                                <input type="password" class="form-control" id="password2" value="<?php echo $password; ?>"  placeholder="**********"/>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="rememberme" />
                                                    <label class="form-check-label fs-5 font5"> Remember me </label>
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <a href="#" class="link-primary fs-5 font5" onclick="forogotPasssword();">Forgot Password</a>
                                            </div>
                                            <div class="col-12 pb-5">
                                                <div class="row">
                                                    <div class="col-12 col-lg-6 d-grid pb-2">
                                                        <btton class="myProductbluebtn rounded-2  text-center pt-2" onclick="signIn();">Sign In</btton>
                                                    </div>
                                                    <div class="col-12 col-lg-6 d-grid pb-2">
                                                        <btton class="btn btn-secondary " onclick="changeSigninViwe();">New to medifind? Join Now</btton>
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



                <!-- content -->


                 <!-- footer -->
                 <div class="col-12 flex-bottom mb-4 d-none d-lg-block">
                        <p class="text-center">&copy; 2022 medifindsl.lk || All Right Reserved</p>
                    </div>
                <!-- footer -->

            </div>
            <div class="col-12 col-lg-4 d-flex justify-content-end align-items-center ">

                <div id="carouselExampleFade" class="carousel  slide carousel-fade shadow d-none d-lg-block" data-bs-ride="carousel" >
                    <div class="carousel-inner">
                        <div class="carousel-item active registerCarosalImg1" data-bs-interval="5000">
                            <img src="resource/mediai4.png" class="d-block w-100 rImg1  " alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="5000">
                            <img src="resource/mediAi5.png" class="d-block w-100 registerCarosalImg1" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="5000">
                            <img src="resource/mediAi1.png" class="d-block w-100 registerCarosalImg1" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal" tabindex="forgotpasswordodal" id="forgotpasswordodal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reset Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">

                                <div class="col-6">
                                    <lable class="home-lable">New Password</lable>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="npi">
                                        <button class="btn btn-outline-secondary" type="button" id="npb"><i id="e1" onclick="showPassword();" class="bi bi-eye-fill"></i></button>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <lable class="home-lable">Re type Password</lable>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="rpi">
                                        <button class="btn btn-outline-secondary" type="button" id="rpb"><i id="e2" onclick="showPassword2();" class="bi bi-eye-fill"></i></button>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <lable class="home-lable">verification code</lable>
                                    <input type="text" class="form-control" id="vc">
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="resetpassword();">Reset Password</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->




        </div>

    </div>


    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>

</body>

</html>