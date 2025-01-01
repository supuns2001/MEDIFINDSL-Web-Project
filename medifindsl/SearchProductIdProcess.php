<?php

require "connection.php";

if(isset($_GET["pid"])){
    $pid =$_GET["pid"];
    
    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$pid."' ");
    $product_num = $product_rs->num_rows;

    if($product_num == 1){


        ?>

<div class="row" >

<table class="table">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">ID</th>
            <th scope="col" class="d-none d-lg-block">Product image</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Registed date</th>


        </tr>
    </thead>
    <tbody>
        <?php
          
           for ($x = 0; $x < $product_num; $x++) {
            $product_data = $product_rs->fetch_assoc();

           ?>
            <tr>
                <td>
                    <div class="form-check">
                        <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                    </div>
                </td>
                <th scope="row"><?php echo $product_data["id"]; ?></th>
                <td class="d-none d-lg-block">
                    <div class=" mx-lg-3 adminProdctImg">
                        <?php
                           $imag_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                           $imag_num = $imag_rs->num_rows;
                           $imag_data = $imag_rs->fetch_assoc();

                           ?>
                        <img src="<?php echo $imag_data["code"]; ?>" onclick="block();" style="width: 60px; height: 60px;" />
                    </div>
                </td>
                <td><?php echo $product_data["title"]; ?></td>
                <td><?php echo $product_data["price"]; ?></td>
                <td><?php echo $product_data["qty"]; ?></td>
                <td><?php echo $product_data["datetime_added"]; ?></td>
                <td class="">

                <!-- <button onclick="block();">buy now</button> -->
                    <div class="col-12 col-lg-12 bg-white py-2 d-grid">
                        <?php

                           if ($product_data["status_id"] == 1) {
                           ?>
                            <button class="tBlockbtn" onclick="blockProduct('<?php echo $product_data['id']; ?>');" id="mp<?php echo $product_data["id"] ?>">Block</button>
                        <?php

                           } else {
                           ?>
                            <button class="tUnblockbtn" onclick="blockProduct('<?php echo $product_data['id']; ?>');" id="mp<?php echo $product_data["id"] ?>">Unblock</button>
                        <?php

                           }

                           ?>

                    </div>
                </td>


            </tr>
        <?php


           }





           ?>


    </tbody>
</table>



</div>
        <?php

    }else{
        echo("Invalid Product ID");
    }

}

?>