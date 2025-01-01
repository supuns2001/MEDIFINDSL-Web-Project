<?php

session_start();

require "connection.php";

if(isset($_SESSION["u"])){

    $produci_id = $_GET["id"];
    $qty = $_GET["qty"];
    $user_mail = $_SESSION["u"]["email"];

    // echo($produci_id);
    // echo($qty);
    // echo($user_mail);


    $array;

    $order_id = uniqid();

    $produci_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$produci_id."' ");
    $produci_data = $produci_rs->fetch_assoc();

    $city_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='".$user_mail."' ");
    $city_num = $city_rs->num_rows;



    if($city_num == 1){



        $city_data = $city_rs->fetch_assoc();

        $city_id = $city_data["city_id"];
        $address = $city_data["line1"].",".$city_data["line2"];


        $district_rs = Database::search("SELECT * FROM `city` WHERE `id`='".$city_id."' ");
        $district_data = $district_rs->fetch_assoc();

        $district_id = $district_data["district_id"];
        $deliveryFee = "0";


        if($district_id == 3){

            $deliveryFee = $produci_data["delivery_fee_colombo"];

        }else{

            $deliveryFee = $produci_data["delivery_fee_other"];


        }

        $item = $produci_data["title"];
        $amount = ((int)$produci_data["price"] * (int)$qty) + (int)$deliveryFee;


        $fname = $_SESSION["u"]["fname"];
        $lname = $_SESSION["u"]["lname"];
        $mobile = $_SESSION["u"]["mobile"];
        $user_address = $address;
        $city = $district_data["name"];

        $merchant_secret = "MTA4Nzc4MjY0MDE5ODY3NDE3NTcxOTgyODgzMTc2MTQwNTI5NDQ3";
        // $merchant_id = "1222015";
        $currency = "LKR";
        

        $hash = strtoupper(
            md5(
                $merchant_id = "1222015" . 
                $order_id . 
                number_format($amount, 2, '.', '') . 
                $currency .  
                strtoupper(md5($merchant_secret)) 
            ) 
        );

        
        $array["id"] = $order_id;
        $array["item"] = $item;
        $array["amount"] = $amount;
        $array["fname"] = $fname;
        $array["lname"] = $lname;
        $array["mobile"] = $mobile;
        $array["address"] = $user_address;
        $array["city"] = $city;
        $array["umail"] = $user_mail;
        $array["hash"] = $hash;


        echo json_encode($array);

        // echo("okkoma harii");
       
    }else{
        echo("2");
    }

}else{
    echo("1");
}

?>