<?php

session_start();

require "connection.php";

if(isset($_SESSION["p"])){
    // echo($_SESSION["p"]["title"]);

    $title = $_POST["title"];

    if(empty($title)){
        echo("Please Enter Your Product title");
    }else{
        echo("Success");
    }

}

?>