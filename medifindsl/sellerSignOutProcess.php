<?php

session_start();

if(isset($_SESSION["u"])){

  $email = $_SESSION["u"]["email"];
  $status = 2;

  echo($email);
  echo($status);


  Database::iud("UPDATE `sellers` SET `seller_status_id`='". $status."' WHERE `email`='".$email."' ");

  echo("success");


}

?>