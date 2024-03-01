<?php
  $hostName = "localhost";
  $userName = "root";
  $password = "";
  $dbName = "login-register";
  $connection = mysqli_connect($hostName, $userName, $password, $dbName);
  if(!$connection)
    echo "SomeThing Went Wrong";
?>