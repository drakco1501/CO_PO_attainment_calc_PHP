
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
    <title>students page</title>
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
    <div class="user-management-container" style="height: auto; min-height : 800px;">
    <?php
        $sql = "SELECT * FROM students";
        $result = mysqli_query($conn,$sql);
        $i = 1;
        echo'<table class="user-table">';
        echo'<tr>
                <th>SL No</th>
                <th>USN</th>
                <th>Student Name</th>
                <th>Academic Year</th>
                <th>Semester</th>
                <th>Operations</th>
            </tr>';
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['usn'];
            echo'<tr>';
            echo'<td>'.$i.'</td>';
            echo'<td>'.$row['usn'].'</td>';
            echo'<td>'.$row['name'].'</td>';
            echo'<td>'.$row['acadamic_year'].'</td>';
            echo'<td>'.$row['sem'].'</td>';
            echo'<td class="action-buttons">
                    <button class="action-btn update-btn"><a href="stuupdate.php?updateid='.$id.'">Update</a></button>
                    <button class="action-btn delete-btn"><a href="studelete.php?deleteid='.$id.'">Delete</a></button>
                </td>';
            echo'</tr>';
            $i += 1;
        }
        echo'</table>';
    ?>

    <div class="add-user-form">
        <h3 class="form-title">Add New Student</h3>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label class="form-label">USN:</label>
                <input type="text" name="newusn" class="form-input" required>
            </div>
            <div class="form-group">
                <label class="form-label">Student Name:</label>
                <input type="text" name="newstudent" class="form-input" required>
            </div>
            <div class="form-group">
                <label class="form-label">Academic Year:</label>
                <input type="number" name="newyear" class="form-input" required>
            </div>
            <div class="form-group">
                <label class="form-label">Semester:</label>
                <input type="number" name="newsem" class="form-input" required min="1" max="8">
            </div>
            <button name="adduser" value="add" class="submit-btn">Add Student</button>
        </form>
    </div>
</div>

<script src="../static/js/scripts.js"></script>
    
</body>
</html>
<?php 
    /*
    if(isset($_POST['logout'])){
        $_SESSION['adminname'] = null;
        $_SESSION['adminpassword'] = null;
       if(empty($_SESSION['adminname']) && empty($_SESSION['adminpassword'])){
        session_destroy();
        header("Location:admin_login.php");
    }
    }  
    */
    if(isset($_POST['adduser'])){
        $newusn = $_POST['newusn'];
        $newstudent = $_POST['newstudent'];
        $newyear = $_POST['newyear'];
        $newsem = $_POST['newsem'];

        $sql = "INSERT INTO students (usn, name, acadamic_year, sem) VALUES('$newusn','$newstudent','$newyear','$newsem')";
        try{
            $result = mysqli_query($conn,$sql);
            if($result){
                $sql1 = "SELECT * FROM `login`";
                $result1 = mysqli_query($conn,$sql1);
                while($row = mysqli_fetch_assoc($result1)){
                $sub = $row['username'];
                $newusn = $_POST['newusn'];
                $newstudent = $_POST['newstudent'];
                $newyear = $_POST['newyear'];
                $newsem = $_POST['newsem'];
                $sql2 = "INSERT INTO marks (subject, usn, name,	acadamic_year, sem,	IA1_1A_M, IA1_1B_M, IA1_2A_M, IA1_2B_M, IA2_1A_M, IA2_1B_M, IA2_2A_M, IA2_2B_M) VALUES('$sub','$newusn','$newstudent','$newyear','$newsem','','','','','','','','')";
                $result2 = mysqli_query($conn,$sql2); 
                }
                echo"
                    <script>
                        alert('user added');
                    </script>
                ";
            }
        }catch(mysqli_sql_exception){
            echo"
                    <script>
                        alert('student data exist add any other');
                    </script>
                ";
        }

    }
?>