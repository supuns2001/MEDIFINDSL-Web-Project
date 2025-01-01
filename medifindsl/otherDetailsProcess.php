<?php

require "connection.php";


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


if($category == "0"){
    echo ("Please Select a category");
}else if($brnad == "0"){
    echo ("Please Select a Brand");
}else if($model == "0"){
    echo ("Please Select a Model");
}else if(empty($title)){
    echo ("Please Enter the Product title");
}else if(strlen($title <= 100)){
    echo ("Title shold have lover thn 100 carachtores");
}else if($colour == "0"){
    echo ("Please select a colour");
}else if(empty($discription)){
    echo ("Please Enter the Discription");
}else {
    echo ("success1"); 
}

?>