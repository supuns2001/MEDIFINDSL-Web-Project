 <?php

    session_start();

    require "connection.php";

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
         <title>Manage Product | MEDIFINDSL</title>


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

                             <div class="col-12 col-lg-3 ">
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
                                         <p class="fs-4 font5 mb-2 mt-3"><?php echo $user_data["fname"]." ".$user_data["lname"]; ?></p>
                                     </div>

                                     <div class="col-2 me-2">
                                        <?php

                                        $uimag_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='".$Uemail."' ");
                                        $user_num = $uimag_rs->num_rows;

                                       

                                        if($user_num == 1){
                                            $uimag_data = $uimag_rs->fetch_assoc();
                                           
                                            ?>
                                            <img src="<?php echo $uimag_data["path"]; ?>" class="rounded-circle mt-2 mb-1" style="width: 50px; height: 50px;" />

                                           <?php

                                           
                                        }else{
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

                             <div class="col-12 col-lg-2 adminmenuclr shadow mt-4">
                                 <div class="row ">
                                     <div class="col-12  mt-5 d-flex align-content-center">
                                         <a href="adminPanel.php" class="mt-2 mx-3 mt-3 mb-3 fs-6 text-white text-decoration-none   font5"><i class="bi bi-speedometer me-1"></i> DASHBORD</a>
                                     </div>

                                     <div class="col-12  mt-3 d-flex align-content-center">
                                         <p class="mt-2 mx-3 mt-3 mb-3 fs-6 text-white  font5"><i class="bi bi-house-heart me-1"></i> HOME</p>
                                     </div>

                                     <div class="col-12   mt-3 d-flex align-content-center">
                                         <a href="adminUserProfile.php" class="mt-3 mx-3   mb-3 text-decoration-none  fs-6 text-white  font5"><i class="bi bi-person-fill me-1"></i> MY PROFILE</a>
                                     </div>

                                     <div class="col-12  mt-3 d-flex align-content-center selectmenu">
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

                                     <div class="col-12 border shadow px-4  rounded rounded-4 ">
                                         <div class="row ">

                                             <div class="col-12 text-center mt-3 mb-4">
                                                 <h1 class="text-warning">Manage Product</h1>
                                             </div>

                                             <div class="col-12 mt-3 mb-5">
                                                 <div class="row d-flex justify-content-center gap-5 ">
                                                     <div class="col-12 col-lg-4">
                                                         <input type="text" class="form-control shadow fs-5 input" placeholder="Product ID.." id="search_id" onkeyup=""/>
                                                     </div>

                                                     <div class="col-12 col-lg-4">
                                                         <input type="text" class="form-control shadow  fs-5 input" placeholder="Product Name.." id="search_name"/>
                                                     </div>

                                                     <!-- <div class="col-12 col-lg-3">
                                                     <input type="text" class="form-control  fs-5 input" placeholder="Search By Grade.." />
                                                 </div> -->

                                                     <div class="col-12 col-lg-2 d-grid">
                                                         <button class="btn btn-info  fs-4 rounded-3 fw-bold" onclick="manageSearchProduct();">Search</button>
                                                     </div>
                                                 </div>
                                             </div>


                                             <div class="col-12 px-4 overflow-scroll mb-4" style="height: 500px;" >
                                                 <div class="row" id="MP_table">

                                                     <table class="table">
                                                         <thead>
                                                             <tr>
                                                                 <th scope="col"></th>
                                                                 <th scope="col">ID</th>
                                                                 <th scope="col" class="d-none d-lg-block">Product image</th>
                                                                 <th scope="col">Product Name</th>
                                                                 <th scope="col">Price</th>
                                                                 <th scope="col">Quantity</th>
                                                                 <th scope="col">Registed date</th>


                                                             </tr>
                                                         </thead>
                                                         <tbody>
                                                             <?php
                                                                $query = "SELECT * FROM `product`";
                                                                $pageno;

                                                                if (isset($_GET["page"])) {
                                                                    $pageno = $_GET["page"];
                                                                } else {
                                                                    $pageno = 1;
                                                                }

                                                                $product_rs = Database::search($query);
                                                                $product_num = $product_rs->num_rows;

                                                                $results_per_page = 20;
                                                                $number_of_pages = ceil($product_num / $results_per_page);

                                                                $page_results = ($pageno - 1) * $results_per_page;
                                                                $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                                                                $selected_num = $selected_rs->num_rows;

                                                                for ($x = 0; $x < $selected_num; $x++) {
                                                                    $selected_data = $selected_rs->fetch_assoc();
                                                                ?>
                                                                 <tr>
                                                                     <td>
                                                                         <div class="form-check">
                                                                             <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                                                                         </div>
                                                                     </td>
                                                                     <th scope="row"><?php echo $selected_data["id"]; ?></th>
                                                                     <td class="d-none d-lg-block">
                                                                         <div class=" mx-lg-3 adminProdctImg">
                                                                             <?php
                                                                                $imag_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $selected_data["id"] . "'");
                                                                                $imag_num = $imag_rs->num_rows;
                                                                                $imag_data = $imag_rs->fetch_assoc();

                                                                                ?>
                                                                             <img src="<?php echo $imag_data["code"]; ?>" onclick="block();" style="width: 60px; height: 60px;" />
                                                                         </div>
                                                                     </td>
                                                                     <td><?php echo $selected_data["title"]; ?></td>
                                                                     <td><?php echo $selected_data["price"]; ?></td>
                                                                     <td><?php echo $selected_data["qty"]; ?></td>
                                                                     <td><?php echo $selected_data["datetime_added"]; ?></td>
                                                                     <td class="">

                                                                     <!-- <button onclick="block();">buy now</button> -->
                                                                         <div class="col-12 col-lg-12 bg-white py-2 d-grid">
                                                                             <?php

                                                                                if ($selected_data["status_id"] == 1) {
                                                                                ?>
                                                                                 <button class="tBlockbtn" onclick="blockProduct('<?php echo $selected_data['id']; ?>');" id="mp<?php echo $selected_data["id"] ?>">Block</button>
                                                                             <?php

                                                                                } else {
                                                                                ?>
                                                                                 <button class="tUnblockbtn" onclick="blockProduct('<?php echo $selected_data['id']; ?>');" id="mp<?php echo $selected_data["id"] ?>">Unblock</button>
                                                                             <?php

                                                                                }

                                                                                ?>

                                                                         </div>
                                                                     </td>


                                                                 </tr>
                                                             <?php


                                                                }





                                                                ?>


                                                         </tbody>
                                                     </table>

                                                    

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
        echo ("inavalid User");
    }


    ?>