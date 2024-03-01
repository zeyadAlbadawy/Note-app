<?php
include "database.php";
$id = $_GET["id"];
$deleteQuery ="DELETE FROM users WHERE id = '$id'";
$res= mysqli_query($connection, $deleteQuery);
header("Location: dashboard.php");
?>