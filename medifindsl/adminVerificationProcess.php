<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST["email"])) {

    $email = $_POST["email"];

    $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $email . "'");
    $admin_num = $admin_rs->num_rows;

    if ($admin_num > 0) {

        $code = uniqid();

        Database::iud("UPDATE `admin` SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "' ");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'supunsulakshana2001@gmail.com';
        $mail->Password = 'ihyghuprmvdgqjmr';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('supunsulakshana2001@gmail.com', 'Admin Verification');
        $mail->addReplyTo('supunsulakshana2001@gmail.com', 'Admin Verification');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'MedifindSL Admin login Code';
        $bodyContent = '<div style="width: 100%;">
        <div style="width: 100%; height: 80px; display: flex; justify-content: center;">
            <div style="width: 200px; height: 80px; background-image: url(resource/medifindsl.png); background-repeat: no-repeat; background-position: center; background-size: cover;"></div>
        </div>
        <div style="width: 100%;">
            <p> Dear Admin,</p>
            <label style="font-size: 17px; padding-top: 10px;">Your Verification code is :</label><label style="font-size: 20px; font-weight: bold; margin-left: 5px; color: rgb(3, 80, 111);">' . $code . '</label>
        </div>

    </div>';
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo ("verification code sending failes");
        } else {
            echo ("success");
        }
    } else {
        echo ("You are Not Valid user");
    }
} else {
    echo ("Please Enter Youe Email");
}
