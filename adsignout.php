<?php
ob_start();
include "connection.php";
session_start();

session_unset();
session_destroy();
header("location:signin.php");

mysqli_close($con);

?>