
<?php
    include("connect.php");
    session_start();

    if(empty($_SESSION['adminname']) && empty($_SESSION['adminpassword'])){
        header("Location:admin_login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/home.css">
    <link rel="stylesheet" href="../static/css/home_content.css">

    <title>admin home</title>
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
    <div class="homecontainer">
        <div class="section">
            <div class="image">
                <img src="../static/img/img1.png" alt="Placeholder Image 1" class="img">
            </div>
            <div class="text">
                <p>Welcome to our innovative CO-PO mapping platform designed specifically for colleges and universities. 
                    This platform provides an intuitive way to calculate and visualize the alignment between Course 
                    Outcomes (CO) and Program Outcomes (PO). By streamlining the complex process of educational outcome 
                    mapping, our website helps institutions enhance their curriculum's
                     effectiveness, ensuring it aligns with the objectives of higher education accreditation bodies.</p>
            </div>
        </div>

        <div class="section">
            <div class="image">
                <img src="../static/img/img2.png" alt="Placeholder Image 2" class="img">
            </div>
            <div class="text">
                <p>Our website empowers educators with easy-to-use tools to map, calculate, and analyze the relationship 
                    between COs and POs for each course. Simply input the relevant data, and the system will provide a 
                    clear matrix, graphical insights, and comprehensive reports. This data-driven approach allows 
                    departments to assess the contribution of each course toward achieving 
                    the program's overall objectives, making it easier to identify strengths and areas for improvement.</p>
            </div>
        </div>

        <div class="section">
            <div class="image">
                <img src="../static/img/img3.png" alt="Placeholder Image 3" class="img">
            </div>
            <div class="text">
                <p>Built with educators in mind, the platform is user-friendly, secure, 
                    and adaptable to diverse academic structures. Whether you are an administrator overseeing program 
                    alignment or a faculty member ensuring your course objectives meet program goals, this website provides 
                    the precision and clarity you need. 
                    Join us in transforming academic assessments with technology tailored for the future of education.</p>
            </div>
        </div>
    </div>
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

?>