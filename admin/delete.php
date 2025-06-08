<?php
 include("connect.php");
 session_start();
 if (isset($_GET['deleteid'])) {
  try{
    $id = $_GET['deleteid'];
    $sql1 = "SELECT * FROM `login` WHERE id=$id";
    $result1 = mysqli_query($conn,$sql1);
    $name = mysqli_fetch_assoc($result1);
    $sub = $name['username'];
    $sql2 = "DELETE FROM `marks` WHERE subject='$sub'";
    $result2 = mysqli_query($conn,$sql2);
    $sql3 = "DELETE FROM `login` WHERE id=$id";
    $result3 = mysqli_query($conn,$sql3);
    if ($result3) {
      header('location:admin_add_user.php');
    }
  }catch(mysqli_sql_exception){
    echo"<script>
      alert('student usn exist add any other');
    </script>";
  }
 }
 ?>
