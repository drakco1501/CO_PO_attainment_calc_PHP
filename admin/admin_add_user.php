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
    <link rel="stylesheet" href="../static/css/admin_op.css">

    <title>add user</title>
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
    <br>

<div class="user-management-container"  style="height: auto; min-height : 500px;">
    <?php
        $sql = "SELECT * FROM login";
        $result = mysqli_query($conn,$sql);
        $i = 1;
        echo'<table class="user-table">';
        echo'<tr>
                <th>SL No</th>
                <th>User Name</th>
                <th>Manage User</th>
            </tr>';
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            echo'<tr>';
            echo'<td>'.$i.'</td>';
            echo'<td>'.$row['username'].'</td>';
            echo'<td class="action-buttons">
                    <button class="action-btn update-btn"><a href="update.php?updateid='.$id.'">Update</a></button>
                    <button class="action-btn delete-btn"><a href="delete.php?deleteid='.$id.'">Delete</a></button>
                </td>';
            echo'</tr>';
            $i += 1;
        }
        echo'</table>';
    ?>

    <div class="add-user-form">
        <h3 class="form-title">Add New User</h3>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label class="form-label">User Name:</label>
                <input type="text" name="newuser" class="form-input" required>
            </div>
            <div class="form-group">
                <label class="form-label">Password:</label>
                <input type="password" name="newuserpassword" class="form-input" required>
            </div>
            <button name="adduser" value="add" class="submit-btn">Add User</button>
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
            
        try{
            $sql = "INSERT INTO login (username, password) VALUES('$username','$hash')";
            $result = mysqli_query($conn,$sql);
            if($result){
                $sql1 = "SELECT * FROM `students`";
                $result1 = mysqli_query($conn, $sql1);
                while($row = mysqli_fetch_assoc($result1)){
                    $username = $_POST['newuser'];
                    $usn = $row['usn'];
                    $name = $row['name'];
                    $acadamic_year = $row['acadamic_year'];
                    $sem = $row['sem'];
                    $sql2 = "INSERT INTO marks (subject, usn, name, acadamic_year, sem, IA1_1A_M, IA1_1B_M, IA1_2A_M, IA1_2B_M, IA2_1A_M, IA2_1B_M, IA2_2A_M, IA2_2B_M) VALUES('$username','$usn','$name','$acadamic_year','$sem','0','0','0','0','0','0','0','0')";
                    $result2 = mysqli_query($conn,$sql2);
                }
                echo"
                    <script>
                        alert('user added');
                    </script>";
            }
        }catch(mysqli_sql_exception){
            echo"<script>
                alert('user exist add any other');
                </script>";
        }

    }
?>