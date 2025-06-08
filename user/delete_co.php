<?php
include("connect.php");
session_start();
$id = $_GET['updateid'];
$sub = $_SESSION['username'];
for($i = 1; $i <= 7; $i++){

    $sql = "DELETE FROM `co{$i}` WHERE subject = '$sub'";
    $result = mysqli_query($conn,$sql);

}
$sql1 = "DELETE FROM `num_co` WHERE subject = '$sub'";
$result1 = mysqli_query($conn,$sql1);
header("location:insert_co_po.php");
?>