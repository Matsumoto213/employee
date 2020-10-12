<?php
session_start();
if (!$_SESSION['name']);{
    header("location:login.php");
}

include 'conn.php';


$id= $_SESSION['id'];
$q="DELETE FROM employee where id = '$id'";

mysqli_query($conn,$q);
header("location:display.php");
?>