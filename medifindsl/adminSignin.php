<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign In</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="resource/icon.png" />
</head>

<body>

    <div class="container-fluid vh-100">
        <div class="col-12">
            <div class="row">
                <div class="col-12 ">
                    <div class="row adminbv1 vh-100">
                        <div class="col-12 col-lg-4 mb-lg-5 mx-lg-5 admindv2 ">
                            <div class="row admindv4">

                                <div class="col-12 col-lg-12">
                                    <div class="row admindv3 mt-4 ">

                                        <div class="col-12 mb-3  mb-lg-3 mt-3  adminlogo"></div>



                                        <div class="col-12  ">
                                            <div class="col-12 adminiconimg  "></div>
                                        </div>

                                        <div class="col-12 text-center">
                                            <label class="fs-1 font1 ">Admin</label>
                                        </div>

                                        <div class="col-10 mb-3 text-start mb-lg-3 mt-3">
                                            <label class="fs-3 mx-lg-2 font5 fw-bold mb-2">Log In</label>
                                        </div>

                                        <div class="col-10 mb-3">
                                            <label class="fs-5 font5 mb-2">Email Address</label>
                                            <input type="text" class="form-control" placeholder="ex : supun@gmail.com" id="e" />
                                        </div>

                                        <div class="col-12 ">
                                            <div class="row d-flex justify-content-center mb-5 ">
                                                <div class="col-12 col-lg-5 d-grid mb-3">
                                                    <button  class="btn btn-info font5" onclick="adminverification();">Send verification code</button>
                                                </div>

                                                <div class="col-12 col-lg-5 d-grid mb-3">
                                                    <button class="btn btn-secondary font5">Back to Customer loging</button>
                                                </div>
                                            </div>


                                        </div>
  
                                    </div>
                                </div>



                            </div>
                        </div>

                        <!-- Modal -->

                        <div class="modal" tabindex="view" id="adminVerificationModl">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Admin Verification</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label class="mb-1 font5 fs-5">Send Verification Code.</label>
                                        <input type="text" class="form-control" placeholder="Entre the Verification Code.." id="vcode">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="verifyCode();">Verify</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->



                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>