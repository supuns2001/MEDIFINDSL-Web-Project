<?php

session_start();

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;


$email = $_POST["email"];
$store_name = $_POST["sName"];
$b_code = $_POST["bCode"];
$location = $_POST["location"];


// echo($email);
// echo($store_name);
// echo($b_code);
// echo($location);

if(empty($store_name)){
    echo("Please Enater Your Store Name.");
}else if(empty($b_code)){
    echo("Please Enater Your Business Registeration Code.");
}else if(empty($location)){
    echo("Please Enater Your Company Location.");
}else{
    
    $seller_rs = Database::search("SELECT * FROM `sellers` WHERE `user_email`='".$email."' ");
    $seller_num = $seller_rs->num_rows;

    $seller_data = $seller_rs->fetch_assoc();

    if($seller_num > 0){
        echo("User with the same Email already exists.");
    }else{

        $code = uniqid();

        // Database::iud("UPDATE `verification_tb` SET `login_verification`='".$code."' WHERE `email`='".$stemail."' ");
       


        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'supunsulakshana2001@gmail.com';
        $mail->Password = 'ihyghuprmvdgqjmr';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('supunsulakshana2001@gmail.com', 'User Seller Account Verification code');
        $mail->addReplyTo('supunsulakshana2001@gmail.com', 'User Seller Account Verification code');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Login Verifacation Code';
        $bodyContent = '<h2 style="color:red">Your Seller Account Login verification code is '.$code.'</h2>';
       
        $mail->Body    = $bodyContent;

        if(!$mail->send()){
            echo("verification code sending failes");

        }else{
            if(empty($seller_data["seller_status_id"])){
                      Database::iud("INSERT INTO `sellers` (`user_email`,`store_name`,`br_code`,`localtion`,`seller_status_id`,`verification_code`) VALUES ('".$email."','".$store_name."','".$b_code."','".$location."','1','".$code."') ");
                      echo("success1");

            }else{

                echo("success2");

                // Database::iud("INSERT INTO `verification_tb` (`email`,`login_verification`,`caractor_id`,`user_name`,`password`) VALUES ('".$email2."','".$code."','3','".$un."','".$p."') ");

            }

     
            // Database::iud("INSERT INTO `verification_tb` (`email`,`login_verification`,`caractor_id`) VALUES ('".$stemail."','".$code."','1') ");
            // echo("success1");
            
        }
    }
}



?>