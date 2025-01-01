<?php

session_start();

require "connection.php";

if(isset($_GET["vcode"])){
    $vcode = $_GET["vcode"];

    $verification_rs = Database::search("SELECT * FROM `admin` where `verification_code`='".$vcode."' ");
    $verification_num = $verification_rs->num_rows;

    if($verification_num == 1){
        $vdata = $verification_rs->fetch_assoc();
        $_SESSION["au"] = $vdata;
        echo("success");
    }else{
        echo("invalid Email or Verification Code");

    }
}else{
    echo("Please Enter your Verification Code");
}


?>