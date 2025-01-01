<?php

require "connection.php";

if(isset($_GET["id"])){
    $prodct_id = $_GET["id"];

    

    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$prodct_id."'");
    $prodct_num = $product_rs->num_rows;

    

    if($prodct_num == 1){
        $prodct_data = $product_rs->fetch_assoc();

        if($prodct_data["status_id"]== 1){
            Database::iud("UPDATE `product` SET `status_id`= '2' WHERE `id`='".$prodct_id."' ");
            echo("Blocked");
        }else if($prodct_data["status_id"]== 2){
            Database::iud("UPDATE `product` SET `status_id`= '1' WHERE `id`='".$prodct_id."' ");
            echo("Unblocked");
        }
    }else{
        echo ("Cannot fine the Product please try agin leter. ");
    }

}else{
    echo ("Something went wrong");
}

?>