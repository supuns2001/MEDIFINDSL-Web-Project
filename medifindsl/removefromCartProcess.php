<?php

require "connection.php";

if(isset($_GET["id"])){

    $cart_id = $_GET["id"];

    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `id`='".$cart_id."'");
    $cart_data = $cart_rs->fetch_assoc();

    $user = $cart_data["user_email"];
    $product = $cart_data["product_id"];

    Database::iud("INSERT INTO `recent`(`user_email`,`product_id`) VALUES ('".$user."','".$product."') ");
    Database::iud("DELETE FROM `cart` WHERE `id`='".$cart_id."' ");

    echo("success");

}else{
    echo("Something Went wrong");
}

?>