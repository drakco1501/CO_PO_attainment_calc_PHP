<?php
    include("connect.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/login.css">
    <title>user login</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <label>USER NAME :</label>
        <input type="text" name="username" required><br><br>
        <label>SEM :</label>
        <input type="text" name="semister" required><br><br>
        <label>PASSWORD :</label>
        <input type="password" name="password" required><br><br><br>
        <button name="confrim" value="log in">login</button>
        <button type="reset">reset</button>
    </form>
</body>
</html>
<?php
    if(isset($_POST["confrim"])){
        $name = $_POST["username"];
        $password = $_POST["password"];
        $sem = $_POST['semister'];
        $sql = "SELECT * FROM login";
        $result = mysqli_query($conn,$sql);
        $flag = 0;
        while($row = mysqli_fetch_assoc($result)){
            if($row["username"] == $name && password_verify($password, $row["password"]) ){
                $flag = 1;
            }
        }
        if($flag == 1){
            $_SESSION['username'] = $name;
            $_SESSION['password'] = $password;
            $_SESSION['semister'] = $sem;
            header("Location:home.php");
        }
        
        else{   
            echo"
            <script>
                alert('password and user id is not matched');
            </script>";
        }
         
    }
?>