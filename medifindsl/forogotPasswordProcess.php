<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["email"])){

    $email = $_GET["email"];

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."'");
    $n = $rs->num_rows;

    if($n == 1){

        $code =uniqid();

        Database::iud("UPDATE `user` SET `verification_code`='".$code."' WHERE
        `email` = '".$email."'");

            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'supunsulakshana2001@gmail.com';
            $mail->Password = 'ihyghuprmvdgqjmr';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('supunsulakshana2001@gmail.com', 'Reset Password');
            $mail->addReplyTo('supunsulakshana2001@gmail.com', 'Reset Password');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'MEDIFINDSL Forgot Password Verifacation Code';
            $bodyContent = '<h1 style="color:green">Your verification code is '.$code.'</h1>';
            $mail->Body    = $bodyContent;

            if(!$mail->send()){
                echo("verification code sending failes");

            }else{
                echo("success");
            }

    }else{
        echo("Invalid Email Address");
    }

    
}
?>