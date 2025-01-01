<?php

require "connection.php";

$email = $_POST["email"];
$np = $_POST["newpw"];
$rnp = $_POST["repw"];
$vcode = $_POST["vcode"];


if(empty($email)){
    echo("Missing Email Address");
}else if(empty($np)){
    echo("Please insert the new Password");
}else if(strlen($np)<5 || strlen($np)>20){
    echo("Ivalid Password");
}else if(empty($rnp)){
    echo("Please Re-type Password your new Password");
}else if($np != $rnp){
    echo("Password does not matched");
}else if(empty($vcode)){
    echo("Please Enter your verification code");
}else{

   $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND 
    `verification_code`='".$vcode."' ");
    $n = $rs->num_rows;

    if($n = 1){

        Database::iud("UPDATE `user` SET `password`='".$np."' WHERE `email`='".$email."'");
        echo("Success");

    }else{
        echo("Invalid Email or Verification Code");
    }

}

?>