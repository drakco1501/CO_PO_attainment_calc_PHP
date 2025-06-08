<?php
 include("connect.php");
 session_start();
 if (isset($_GET['deleteid'])) {
   $id = $_GET['deleteid'];

   $sql = "DELETE FROM `admin_login` WHERE id=$id";
   $result = mysqli_query($conn,$sql);
   if ($result) {
     header('location:admin_add_admin.php');
   }
 }
 ?>
