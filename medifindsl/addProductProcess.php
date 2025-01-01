<?php

session_start();
require "connection.php";

$email = $_SESSION["u"]["email"];


$category = $_POST["ca"];
$brnad = $_POST["br"];
$model = $_POST["mo"];
$title = $_POST["t"];
$condition = $_POST["con"];
$colour = $_POST["clr"];
$cost = $_POST["cos"];
$qty = $_POST["qty"];
$withing_colombo = $_POST["dwc"];
$out_of_colombo = $_POST["doc"];
$discription = $_POST["dis"];
// $img = $_POST["image"];





if(empty($cost)){
    echo ("Please Enter the Price");
}else if(!is_numeric($cost)){
    echo ("Invalid input for Cost");
}else if(empty($qty)){
    echo ("Please Enter the Quaintity"); 
}else if($qty == "0" | $qty == "e" | $qty < 0 ){
    echo ("Invalid input for Quaintity "); 
}else if(empty($withing_colombo)){
    echo ("Please Enter the delivery fee for Colombo");
}else if(!is_numeric($withing_colombo)){
    echo ("Invalid input for delivery fee for Colombo");
}else if(empty($out_of_colombo)){
    echo ("Please Enter the delivery fee for out of Colombo");
}else if(!is_numeric($out_of_colombo)){
    echo ("Invalid input for delivery fee for out of Colombo");
}else{
    
  $mhb_rs = Database::search("SELECT * FROM `model_has_brand` WHERE `brand_id`='".$brnad."' AND
  `model_id`='".$model."' ");
  
  $model_has_brand_id;

  if($mhb_rs->num_rows == 1){

    $mhb_data = $mhb_rs->fetch_assoc();

    $model_has_brand_id = $mhb_data["id"];

  }else{

    Database::iud("INSERT INTO `model_has_brand`(`brand_id`,`model_id`) VALUES
    ('".$brnad."','".$model."') ");

   $model_has_brand_id = Database::$connection->insert_id;

    
  }



   $d = new DateTime();
   $tz = new DateTimeZone("Asia/Colombo");
   $d->setTimezone($tz);
   $date = $d->format("Y-m-d H:i:s");

   $status = 1;


   Database::iud("INSERT INTO `product`(`category_id`,`model_has_brand_id`,`colour_id`,`price`,`qty`,`title`,`discription`,`condition_id`,`status_id`,`user_email`,`datetime_added`,`delivery_fee_colombo`,`delivery_fee_other`) 
   VALUES ('".$category."','".$model_has_brand_id."','".$colour."','".$cost."','".$qty."','".$title."','".$discription."','".$condition."','".$status."','".$email."','".$date."','".$withing_colombo."','".$out_of_colombo."') ");

 

$product_id = Database::$connection->insert_id;

$length = sizeof($_FILES);


if($length <= 3 && $length > 0){

    $allowd_image_extention = array ("image/jpg","image/jpeg","image/png","image/svg+xml");

    for($x = 0; $x < $length; $x++){
        if(isset($_FILES["image".$x])){

            $imgfile = $_FILES["image".$x];
            $file_extention = $imgfile["type"];

            if(in_array($file_extention,$allowd_image_extention)){

                $new_img_extention;
                
                if($file_extention == "image/jpg"){
                    $new_img_extention = ".jpg";
                 }else if($file_extention == "image/jpeg"){
                    $new_img_extention = ".jpeg";
                 }else if($file_extention == "image/png"){
                    $new_img_extention = ".png";
                 }else if($file_extention == "image/svg+xml"){
                    $new_img_extention = ".svg";
                 }

                 $file_name = "resource//productImg//".$title."_".$x."_".uniqid().$new_img_extention;
                 move_uploaded_file($imgfile["tmp_name"],$file_name);

                 Database::iud("INSERT INTO `images` (`code`,`product_id`) VALUES ('".$file_name."','".$product_id."') ");

                 echo("Prodct saved");


            }else{
                echo("Invalid Image Type");
            }

        }
    }

}else{
    echo("invalid image count");

}

  
  
    


}











?>