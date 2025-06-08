<?php
 include("connect.php");
 session_start();
 if (isset($_GET['deleteid'])) {
   $id = $_GET['deleteid'];
   $sql = "DELETE FROM `students` WHERE usn = '$id'";
   $result = mysqli_query($conn,$sql);
   if($result){
    $sql1 = "SELECT * FROM `login`";
    $result1 = mysqli_query($conn,$sql1);
    while($row = mysqli_fetch_assoc($result1)){
      $sub = $row['username'];
      $sql2 = "DELETE FROM `marks` WHERE usn = '$id' and subject = '$sub'";
      $result2 = mysqli_query($conn,$sql2); 
   }
   header('location:students.php');
 }
}
 ?>