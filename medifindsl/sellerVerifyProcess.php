<?php

require "connection.php";

$email = $_POST["email"];
$vcode = $_POST["vcode"];

if(empty($vcode)){
    echo("Please Enter Your Verification Code. (Check your Emails.)");
}else{
    $vc_rs = Database::search("SELECT * FROM `sellers` WHERE `verification_code`='".$vcode."' AND `user_email`='".$email."' ");
    $vc_num = $vc_rs->num_rows;

    if($vc_num == 1){
        $vc_data = $vc_rs->fetch_assoc();
        // $_SESSION["sr"] = $vc_data;
        echo("success");


    }else{
        echo("Invalid Email OR verification Code.");
    }
}

// echo($email);
// echo($vcode);


?>