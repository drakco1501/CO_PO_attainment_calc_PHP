<?php
    include ("connect.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/login.css">
    <title>admin login</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <label>ADMIN ID :</label><br>
        <input type="text" name="adminname" required><br>
        <label>ADMIN PASSWORD :</label><br>
        <input type="password" name="adminpassword" required><br>
        <button name="confrim" value="log in">login</button>
    </form>
</body>
</html>
<?php
    if(isset($_POST["confrim"])){
        $adminname = $_POST["adminname"];
        $adminpassword = $_POST["adminpassword"];
        $sql = "SELECT * FROM admin_login";
        $result = mysqli_query($conn,$sql);
        $flag = 0;
        while($row = mysqli_fetch_assoc($result)){
            if($row["adminname"] == $adminname && password_verify($adminpassword, $row["adminpassword"]) ){
                $flag = 1;
            }
        }
        if($flag == 1){
            $_SESSION['adminname'] = $adminname;
            $_SESSION['adminpassword'] = $adminpassword;
            header("Location:admin_home.php");
        }
        /*
        else{   
            echo"
            <script>
                alert('password and user id is not matched');
            </script>";
        }
        */ 
    }
?>