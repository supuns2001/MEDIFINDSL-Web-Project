<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invocing | MedifindSL</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="icon.png" />
</head>

<body onload="openConfirmOrder();">

    <div class="container-fluid">
        <div class="col-12">
            <div class="row">

                <?php include "heder.php"; ?>

                <?php

                require "connection.php";



                if (isset($_SESSION["u"])) {
                    $email = $_SESSION["u"]["email"];

                    $order_id = $_GET["id"];

                    // echo ($email);
                    // echo ($order_id);


                ?>



                    <div class="col-12 col-lg-12 bg-light">
                        <div class="col-12 d-flex justify-content-end px-5 py-2">
                            <button class="btn btn-danger me-4 mt-3 mb-5 download_but"><i class="bi bi-file-earmark-pdf-fill"></i> PDF</button>
                        </div>
                        <div class="row d-flex justify-content-center" id="download_div">

                            <div class="col-12  mb-5 col-lg-11 border rounded-bottom shadow rounded-4">
                                <div class="row">

                                    <div class="col-12 bg-info rounded-bottom rounded-4">
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center py-1">
                                                <div class="invoicelogo" style="width: 300px; height: 100px;"></div>
                                            </div>

                                            <div class="col-12 col-lg-6 ">
                                                <div class="row">
                                                    <!-- <div class="col-8 d-flex justify-content-start invoicelogo" style="height: 90px;"></div> -->
                                                    <?php
                                                    $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $order_id . "'");
                                                    $invoice_data = $invoice_rs->fetch_assoc();

                                                    $seller_rs = Database::search("SELECT * FROM `sellers` WHERE `id`='" . $invoice_data["sellers_id"] . "' ");
                                                    $seller_num = $seller_rs->num_rows;
                                                    // echo($seller_num);
                                                    $seller_data = $seller_rs->fetch_assoc();
                                                    ?>

                                                    <div class="col-12 ">
                                                        <h1 class="mx-4 text-decoration-underline text-white invoice">INVOICE 0<?php echo $invoice_data["id"]; ?></h1>
                                                        <span class="mx-4 fw-bold">Date Time to Invoice : <?php echo $invoice_data["date"]; ?></span>




                                                    </div>

                                                </div>



                                            </div>



                                            <div class="col-12 col-lg-6">


                                                <div class="col-12 btn-toolbar justify-content-end ">
                                                    <!-- <button class="btn btn-dark me-2 mt-3 mb-5"><i class="bi bi-printer-fill"></i> Print</button> -->
                                                    <!-- <button class="btn btn-danger me-4 mt-3 mb-5 download_but" ><i class="bi bi-file-earmark-pdf-fill"></i> PDF</button> -->
                                                </div>
                                                <div class="col-12 text-decoration-underline text-end ">
                                                    <label class="me-3 font5 fw-bold fs-1  ">MedifindSL</label>

                                                </div>
                                                <div class="col-12 fw-bold text-end  mb-2 ">
                                                    <span class="me-3">Maradhana Colombo 10 , Srilanka.</span><br />
                                                    <span class="me-3">+0113453432</span><br />
                                                    <span class="me-3">medifindsl@gmail.com</span><br />

                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <?php

                                    $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $email . "' ");
                                    $address_data = $address_rs->fetch_assoc();

                                    $city_rs = Database::search("SELECT * FROM `city` WHERE `id`='" . $address_data["city_id"] . "'");
                                    $city_data = $city_rs->fetch_assoc();

                                    $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
                                    $user_data = $user_rs->fetch_assoc();


                                    ?>

                                    <div class="col-12 mb-2">
                                        <div class="row">
                                            <div class="col-12 col-lg-4 text-start ">
                                                <label class="fs-6 ">Shop Name :</label>
                                                <span class="mx-4 fw-bold font5 fs-5"><?php echo $seller_data["store_name"]; ?></span><br />
                                                <span class=" fw-bold font5 fs-6"><?php echo $seller_data["user_email"]; ?></span>
                                            </div>
                                            <div class="col-12 col-lg-8  mt-3 text-end">
                                                <label class="  me-3 fs-6">INVOICE to :</label><label class="me-3 fs-5 fw-bold"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></label><br />

                                                <label class="me-3 fs-6"><?php echo $address_data["line2"]; ?>,</label>
                                                <label class="me-3 fs-6"><?php echo $city_data["name"]; ?></label><br />
                                                <span class="me-3 fs-6 text-primary text-decoration-underline"><?php echo $user_data["email"]; ?></span><br />

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-12  mt-3 ">
                                                <table class="table col-12 ">
                                                    <thead>
                                                        <tr class="">
                                                            <th>#</th>
                                                            <th class="invoiceFont7">Oder id and product Name</th>
                                                            <th class="text-end invoiceFont7">Unit Price</th>
                                                            <th class="text-end invoiceFont7">Quantity</th>

                                                        </tr>
                                                    </thead>

                                                    <?php
                                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $invoice_data["product_id"] . "'");
                                                    $product_data = $product_rs->fetch_assoc();
                                                    ?>

                                                    <tbody>
                                                        <tr>
                                                            <td class="bg-warning p-2 text-white invoiceFont7">01</td>
                                                            <td>
                                                                <samp class="fw-bold text-decoration-underline p-2 text-secondary invoiceFont7">00<?php echo $invoice_data["id"]; ?></samp><br />
                                                                <samp class="fw-bold invoiceFont7 text-center font5 p-2 text-primary"><?php echo $product_data["title"]; ?></samp>

                                                            </td>
                                                            <td class="fw-bold text-end invoiceFont7 pt-4 bg-secondary bg-opacity-50 text-dark">Rs.<?php echo $product_data["price"]; ?>.00</td>
                                                            <td class="fw-bold text-end invoiceFont7 pt-4 bg-secondary bg-opacity-50 text-dark">0<?php echo $invoice_data["qty"]; ?></td>
                                                            <td class="fw-bold text-end invoiceFont7 pt-4 bg-secondary bg-opacity-50 text-dark">Rs.<?php echo $invoice_data["total"]; ?>.00</td>
                                                            <td></td>
                                                        </tr>

                                                        <?php

                                                        $delivery = 0;
                                                        if ($city_data["district_id"] == 3) {
                                                            $delivery = $product_data["delivery_fee_colombo"];
                                                        } else {
                                                            $delivery = $product_data["delivery_fee_other"];
                                                        }

                                                        $total = $invoice_data["total"];
                                                        $g = $total - $delivery;

                                                        ?>


                                                    </tbody>


                                                </table>

                                                <div class="col-12 ">
                                                    <div class="col-12 d-flex flex-row">
                                                        <div class="col-8 col-lg-9 py-1 text-end ">
                                                            <p class="col-11 text-end col-3 fw-bold invoiceFont8">SUBTOTAL</p>
                                                        </div>
                                                        <div class="col-4 col-lg-3 py-1 text-center ">
                                                            <p class="col-11 text-end col-3 fw-bold invoiceFont8">Rs.<?php echo $g; ?>.00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex flex-row">
                                                        <div class="col-8 col-lg-9 py-1 text-end ">
                                                            <p class="col-11 text-end col-3 fw-bold invoiceFont7">Delevery fee</p>
                                                        </div>
                                                        <div class="col-4 col-lg-3 text-center ">
                                                            <p class="col-11  py-1 text-end col-3 fw-bold invoiceFont8">Rs.<?php echo $delivery; ?>.00</p>
                                                            <hr />
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex flex-row">
                                                        <div class="col-8 col-lg-9 py-2 text-end ">
                                                            <p class="col-11 text-end col-3 fw-bold invoiceFont9 border-warning text-primary">GRAND TOTAL</p>
                                                        </div>
                                                        <div class="col-4 col-lg-3 py-2 text-center ">
                                                            <p class="col-11 text-center col-3  invoiceFont9 fw-bold text-danger border-warning">Rs.<?php echo $total; ?>.00</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>



                                            <div class="col-12 text-center mb-1 border-dark border-1">

                                                <span class="fs-6 fw-bold text-secondary border-dark border-1">Tank You !</span>

                                            </div>

                                        </div>



                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Order Confirm Modal -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content modelClr ">
                                <div class="modal-header">
                                    <h1 class="modal-title fw-bold fs-4 font5" id="exampleModalLabel">Switch to buyer Account</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-dialog modal-dialog-centered">
                                    <p class="fs-4 font5">Confirm This Order</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                    <button type="button" class="btn btn-primary" onclick='sendOrder(<?php echo $order_id; ?>);'> Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Order Confirm Modal -->


                <?php
                } else {
                    echo ("Something Went wrong");
                }

                ?>


                <?php include "footer.php"; ?>


            </div>
        </div>
    </div>


    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.download_but').addEventListener('click', function() {
                var element = document.getElementById('download_div');
                html2pdf(element, {
                    margin: 0.5,
                    filename: 'invoice.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'portrait '
                    }
                });
            });
        });
    </script>




</body>

</html>