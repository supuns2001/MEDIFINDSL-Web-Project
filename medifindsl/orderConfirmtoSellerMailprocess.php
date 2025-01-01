<?php

require "connection.php";

// require "SMTP.php";
// require "PHPMailer.php";
// require "Exception.php";

// use PHPMailer\PHPMailer\PHPMailer;



$orderId = $_POST["oId"];
$email = $_POST["email"];

echo ($orderId);
echo ($email);


// $order_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $orderId . "' ");
// $order_num  = $order_rs->num_rows;
// $order_data  = $order_rs->fetch_assoc();

// $sellerDetails_rs = Database::search("SELECT * FROM `sellers` WHERE `id` = '" . $order_data["sellers_id"] . "'");
// $sellerDetails_data = $sellerDetails_rs->fetch_assoc();

// $sellerEmail = $sellerDetails_data["user_email"];


// $buyerDetails_rs = Database::search("SELECT * FROM `user` 
// INNER JOIN `user_has_address` ON `user_has_address`.`user_email` = `user`.`email`  WHERE `email` = '" . $email . "'");

// $buyerDetails_data = $buyerDetails_rs->fetch_assoc();

// $buyerName = $buyerDetails_data["fname"] + " " + $buyerDetails_data["lname"];
// $buyAddress = $buyerDetails_data["line1"] + " " + $buyerDetails_data["line2"];
// $buyerPostalCode = $buyerDetails_data["postal_code"];

// echo ($buyerDetails_data["fname"] + " " + $buyerDetails_data["lname"]);
// //  $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email`='".$email."'");
// //  $admin_num = $admin_rs->num_rows;

// if ($order_num > 0) {

//     // $code = uniqid();

//     // Database::iud("UPDATE `admin` SET `verification_code`='".$code."' WHERE `email`='".$email."' ");

//     $mail = new PHPMailer;
//     $mail->IsSMTP();
//     $mail->Host = 'smtp.gmail.com';
//     $mail->SMTPAuth = true;
//     $mail->Username = 'supunsulakshana2001@gmail.com';
//     $mail->Password = 'ihyghuprmvdgqjmr';
//     $mail->SMTPSecure = 'ssl';
//     $mail->Port = 465;
//     $mail->setFrom('supunsulakshana2001@gmail.com', 'Admin Verification');
//     $mail->addReplyTo('supunsulakshana2001@gmail.com', 'Admin Verification');
//     $mail->addAddress($sellerEmail);
//     $mail->isHTML(true);
//     $mail->Subject = 'MedifindSL New Order';
//     $bodyContent = '<div style="width: 100%; height: 80vh; ">
//         <div style="width: 100%; display: flex; justify-content: center; align-items: center;  ">
//             <div style="width: 100%; display: flex; justify-content: center; ">
//                <div style="width: 200px; height: 100px;  background-image: url(resources/medifindsl.png); background-size: contain; background-repeat: no-repeat; background-position: center;"> </div>          
//             </div>
//         </div>
//         <div  style="width: 100%; height: 60px; display: flex; align-items: center; padding-left: 10px; background-color: rgb(2, 119, 137);">
//             <label style="font-size: 30px; color: wheat;">New Order :</label><label style="font-size: 20px; padding-left: 5px; color: wheat;"> #1234</label>
//         </div>

//         <style>
//             table, th, td {
//               border: 1px solid rgb(114, 112, 112);
//               border-collapse: collapse;
//               padding-top: 10px;
//               padding-bottom: 10px;
//             }
//         </style>

//         <div style="width: 80%; padding: 20px; display: flex; justify-content: center; flex-direction: column;">
//             <table style="width: 100%;">
//                 <tr>
//                   <th>Product</th>
//                   <th>Quantity</th>
//                   <th>Price</th>
//                 </tr>
//                 <tr>
//                   <td>Sport Wheelchair</td>
//                   <td style="display: flex; justify-content: center;">1</td>
//                   <td>20000.00</td>
//                 </tr>
//               </table>
//               <div style="width: 100%; display: flex; ">
//                 <div style="width: 70%;"> <p style="font-size: 15px; font-weight: bold;">SUBTOTAL</p></div>
//                 <div style="width: 30%; background-color: aquamarine;"></div>
//               </div>
//               <div style="width: 100%; display: flex; ">
//                 <div style="width: 70%;"> <p style="font-size: 15px; font-weight: bold;">Shipping</p></div>
//                 <div style="width: 30%; background-color: aquamarine;"></div>
//               </div>
//               <div style="width: 100%; display: flex; ">
//                 <div style="width: 70%;"> <p style="font-size: 15px; font-weight: bold;">Total</p></div>
//                 <div style="width: 30%; background-color: aquamarine;"></div>
//               </div>
//         </div>

//         <div style="width: 100%; padding-left: 20px;">
//             <p style="font-size: 17px; font-weight: bold; color:rgb(2, 119, 137) ;">Shipping Address</p>
//             <p style=" font-size: 15px; "> Ampe Kotiyakunbura</p>
//             <hr/>


//         </div>
//     </div>';
//     $mail->Body    = $bodyContent;

//     if (!$mail->send()) {
//         echo ("verification code sending failes");
//     } else {
//         echo ("success");
//     }
// } else {
//     echo ("You are Not Valid user");
// }


?>


