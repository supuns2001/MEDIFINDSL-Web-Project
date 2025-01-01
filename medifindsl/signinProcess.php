<?php

session_start();
require "connection.php";

$email = $_POST["e"];
$password = $_POST["p"];
$rememberme = $_POST["r"];


if(empty($email)){
    echo("Please enter your Email");
}else if(strlen($email) > 100){
    echo("Email must have less than 100 chararactors");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo("Invalid Email");
}else if(empty($password)){
    echo("Please Enter your Password");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo("Password must have betveen 5-20 chararactors");
}else{

    // echo("success");
    $signin_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' AND `password`='" . $password . "'");

    $signin_num = $signin_rs->num_rows;
     
    if($signin_num == 1){

        echo("success");
        $signin_data = $signin_rs->fetch_assoc();
        $_SESSION["u"] = $signin_data;

        if($rememberme == "true"){

            setcookie("email",$email,time()+(60*60*24*365));
            setcookie("password",$password,time()+(60*60*24*365)); 

        }else{

            setcookie("email","", -1);
            setcookie("password","", -1); 


        }

        

    }else{
        echo("Invalid Username or Password");
    }
}


?>