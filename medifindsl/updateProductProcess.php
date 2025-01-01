<?php

session_start();

require "connection.php";

if(isset($_SESSION["p"])){
    $pid = $_SESSION["p"]["id"]; 

    // echo("Hello");


    $title = $_POST["title"];
    $qty = $_POST["qty"];
    $delivery_fee_col = $_POST["dwc"];
    $delivery_fee_other = $_POST["doc"];
    $discription = $_POST["dis"];


    Database::iud("UPDATE `product` SET `title`='".$title."',`qty`='".$qty."',`delivery_fee_colombo`='".$delivery_fee_col."',
    `delivery_fee_other`='".$delivery_fee_other."', `discription`='".$discription."' WHERE `id`='".$pid."'");

    // echo("prodct has been updeted");


    $length = sizeof($_FILES);
    $allowed_img_extention = array("image/jpg","image/jpeg","image/png","image/svg+xml");

    Database::iud("DELETE FROM `images` WHERE `product_id`='".$pid."'");


    if($length <= 3 && $length > 0){

        for($x = 0; $x < $length; $x++){

            if(isset($_FILES["img".$x])){

                $img_file = $_FILES["img".$x];
                $file_type = $img_file["type"];

                if(in_array($file_type,$allowed_img_extention)){

                    $new_img_extention;

                    if($file_type == "image/jpg"){
                        $new_img_extention = ".jpg";
                    }else if($file_type == "image/jpeg"){
                        $new_img_extention = ".jpeg";
                    }else if($file_type == "image/png"){
                        $new_img_extention = ".png";
                    }else if($file_type == "image/svg+xml"){
                        $new_img_extention = ".svg";
                    }

                    $file_name = "resource//productImg//".$title."_".$x."_".uniqid().$new_img_extention;
                    move_uploaded_file($img_file["tmp_name"],$file_name);


                    Database::iud("INSERT INTO `images`(`code`,`product_id`) VALUES ('".$file_name."','".$pid."')");

                    echo ("success");

                }else{
                    echo("File type not allowed!");
                }

            }

        }

    }else{
        echo("invalid image count");
    }


    

}else{
    echo("Something went wrong");
}

?>