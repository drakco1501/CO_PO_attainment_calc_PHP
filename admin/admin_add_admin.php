<?php
    include("connect.php");
    session_start();
    /*
    if(empty($_SESSION['adminname']) && empty($_SESSION['adminpassword'])){
        header("Location:admin_login.php");
    }
    */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add admin</title>
    <link rel="stylesheet" href="../static/css/admin_op.css">
</head>
<body>
    <nav>
        <div class="nav_elements">
            <a href="./admin_home.php" class="logo"><img src="../static/img/logo.png" alt=""></a>
        </div>
        <div class="nav_elements">
            <a href="./admin_home.php">home</a>
            <a href="./admin_add_user.php">add user</a>
            <a href="./admin_add_admin.php">add admin</a>
            <a href="./students.php">students</a>
        </div>
        <div class="log_out_btn">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <button name="logout" value="logout">log out</button>
            </form>   
        </div>
    </nav>

<div class="user-management-container">
    <?php
        $sql = "SELECT * FROM admin_login";
        $result = mysqli_query($conn,$sql);
        $i = 1;
        echo'<table class="user-table">';
        echo'<tr>
                <th>SL No</th>
                <th>Admin ID</th>
                <th>Manage User</th>
            </tr>';
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            echo'<tr>';
            echo'<td>'.$i.'</td>';
            echo'<td>'.$row['adminname'].'</td>';
            echo'<td class="action-buttons">
                    <button class="action-btn update-btn"><a href="adminupdate.php?updateid='.$id.'">Update</a></button>
                    <button class="action-btn delete-btn"><a href="admindelete.php?deleteid='.$id.'">Delete</a></button>
                </td>';
            echo'</tr>';
            $i += 1;
        }
        echo'</table>';
    ?>

    <div class="add-user-form">
        <h3 class="form-title">Add New Admin</h3>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label class="form-label">Admin Name:</label>
                <input type="text" name="newuser" class="form-input" required>
            </div>
            <div class="form-group">
                <label class="form-label">Password:</label>
                <input type="password" name="newuserpassword" class="form-input" required>
            </div>
            <button name="adduser" value="add" class="submit-btn">Add Admin</button>
        </form>
    </div>
</div>

<script src="../static/js/scripts.js"></script>
</body>
</html>
<?php 
    if(isset($_POST['logout'])){
        $_SESSION['adminname'] = null;
        $_SESSION['adminpassword'] = null;
       if(empty($_SESSION['adminname']) && empty($_SESSION['adminpassword'])){
        session_destroy();
        header("Location:admin_login.php");
        }
    }
    if(isset($_POST['adduser'])){
        $username = $_POST['newuser'];
        $password = $_POST['newuserpassword'];
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO admin_login (adminname, adminpassword) VALUES('$username','$hash')";
        try{
            $result = mysqli_query($conn,$sql);
            if($result){
                echo"
                    <script>
                        alert('user added');
                    </script>
                ";
            }
        }catch(mysqli_sql_exception){
            echo"
                    <script>
                        alert('user name exist add any other');
                    </script>
                ";
        }

    }  

?>

