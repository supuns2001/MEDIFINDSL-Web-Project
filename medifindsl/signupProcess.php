<?php

require "connection.php";



$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$password = $_POST["p"];
$mobile = $_POST["m"];
$gender = $_POST["g"];


if(empty($fname)){
    echo(" Please enter your First Name !!!");
}else if(strlen($fname) > 50){
    echo(" Firsr Name must have less than 50 charactors");
}else if(empty($lname)){
    echo(" Please enter your last Name !!!");
}else if(strlen($lname) > 50){
    echo(" Last Name must have less than 50 charactors");
}else if(empty($email)){
    echo(" Please Enter yor email !!!");
}else if(strlen($email) >= 100){
    echo(" Email must have less than 100 charactors");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo(" Invalid Email !!!");
}else if(empty($password)){
    echo(" Please Enter your password");
}else if(strlen($password) < 5 || strlen($password)>20){
    echo(" Password must be between 5 - 20 charactors ");
}else if(empty($mobile)){
    echo(" Please Enter your Mobile");
}else if(strlen($mobile) != 10){
    echo(" mobile must have 10 charactors ");
}else if(!preg_match("/07[0,1,2,,4,5,6,7,8][0-9]/",$mobile)){
    echo(" Invalid Mobile");
}else{
    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' OR `mobile`='".$mobile."'");
    $n = $rs->num_rows;

    if($n > 0){
        echo("  User with the same email or mobile allready exists");
    }else{
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `user` (`email`,`fname`,`lname`,`mobile`,`password`,`gender_id`,`join_date`,`status`)VALUES
        ('".$email."','".$fname."','".$lname."','".$mobile."','".$password."','".$gender."','".$date."','1')");

        echo " Success";
    }
}

?>