<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){

    if(isset($_GET["id"])){

        $product_id = $_GET["id"];

        $watch_rs = Database::search("SELECT * FROM `watchlist` WHERE `id`='".$product_id."'");
        $watch_num = $watch_rs->num_rows;
        $watch_data = $watch_rs->fetch_assoc();

        if($watch_num == 0){
            echo("Something went wrong Please Tyr again later");
        }else{
            Database::iud("INSERT INTO `recent` (`product_id`,`user_email`) VALUES ('".$watch_data["product_id"]."','".$watch_data["user_email"]."') ");

            Database::iud("DELETE FROM `watchlist` WHERE `id`='".$product_id."' ");

            echo("success");
        }


    }else{
        echo("Please Select the Product");
    
    }

}else{
    echo("Please Loging first");
}



?>