<?php
include("connect.php");
session_start();
if(empty($_SESSION['username']) && empty($_SESSION['password'])){
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/home.css">
    <link rel="stylesheet" href="../static/css/user_op2.css">


    <title>stud marks</title>
</head>
<body>
    <nav>
        <div class="nav_elements">
            <a href="./home.php" class="logo"><img src="../static/img/logo.png" alt=""></a>
        </div>
        <div class="nav_elements">
            <a href="./home.php">home</a>
            <a href="./internal_qa.php">internal_qa</a>
            <a href="./marks.php">student marks</a>
            <a href="./mapping.php">co-po mapping</a>
        </div>

        <div class="log_out_btn">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <button name="logout" value="logout">log out</button>
            </form>   
        </div>
    </nav>

<?php
$name = $_SESSION['username'];
$sem = $_SESSION['semister'];
$sql = "SELECT * FROM `marks` WHERE subject ='$name' and sem = '$sem'";
$result = mysqli_query($conn,$sql);

echo '<div class="ia-form-container">';
echo '<div class="form-header">';
echo '<h2 class="form-title">Student Marks Overview</h2>';
echo '<div class="subject-info">';
echo '<span class="subject-label">Subject:</span>';
echo '<span class="subject-id">' . htmlspecialchars($name) . '</span>';
echo '<span class="subject-label">Semester:</span>';
echo '<span class="subject-id">' . htmlspecialchars($sem) . '</span>';
echo '</div>';
echo '</div>';

echo '<div class="ia-main-form">';

if(mysqli_num_rows($result) > 0){
    echo '<div class="ia-section">';
    echo '<div class="section-header">';
    echo '<h3 class="section-title">Internal Assessment Marks</h3>';
    echo '<div class="section-divider"></div>';
    echo '</div>';
    
    echo '<div class="question-card">';
    echo '<div class="question-header">';
    echo '<h4 class="question-title">Student Performance Data</h4>';
    echo '</div>';
    echo '<div class="question-content">';
    
    // Enhanced table with responsive design
    echo '<div style="overflow-x: auto; margin-bottom: 20px;">';
    echo '<table style="width: 100%; border-collapse: collapse; min-width: 1000px;">';
    
    // Table Header
    echo '<tr style="background: linear-gradient(135deg, #667eea, #764ba2); color: white;">';
    echo '<th style="padding: 15px 10px; border: 1px solid #ddd; text-align: center; font-weight: 600; font-size: 0.9rem; min-width: 60px;">Sl No</th>';
    echo '<th style="padding: 15px 10px; border: 1px solid #ddd; text-align: center; font-weight: 600; font-size: 0.9rem; min-width: 120px;">USN</th>';
    echo '<th style="padding: 15px 10px; border: 1px solid #ddd; text-align: center; font-weight: 600; font-size: 0.9rem; min-width: 150px;">Student Name</th>';
    
    // IA1 Headers with different color
    echo '<th style="padding: 15px 8px; border: 1px solid #ddd; text-align: center; font-weight: 600; font-size: 0.85rem; background: linear-gradient(135deg, #ff6b6b, #ee5a6f); min-width: 70px;">IA1<br>1A</th>';
    echo '<th style="padding: 15px 8px; border: 1px solid #ddd; text-align: center; font-weight: 600; font-size: 0.85rem; background: linear-gradient(135deg, #ff6b6b, #ee5a6f); min-width: 70px;">IA1<br>1B</th>';
    echo '<th style="padding: 15px 8px; border: 1px solid #ddd; text-align: center; font-weight: 600; font-size: 0.85rem; background: linear-gradient(135deg, #ff6b6b, #ee5a6f); min-width: 70px;">IA1<br>2A</th>';
    echo '<th style="padding: 15px 8px; border: 1px solid #ddd; text-align: center; font-weight: 600; font-size: 0.85rem; background: linear-gradient(135deg, #ff6b6b, #ee5a6f); min-width: 70px;">IA1<br>2B</th>';
    
    // IA2 Headers with different color
    echo '<th style="padding: 15px 8px; border: 1px solid #ddd; text-align: center; font-weight: 600; font-size: 0.85rem; background: linear-gradient(135deg, #20b2aa, #4682b4); min-width: 70px;">IA2<br>1A</th>';
    echo '<th style="padding: 15px 8px; border: 1px solid #ddd; text-align: center; font-weight: 600; font-size: 0.85rem; background: linear-gradient(135deg, #20b2aa, #4682b4); min-width: 70px;">IA2<br>1B</th>';
    echo '<th style="padding: 15px 8px; border: 1px solid #ddd; text-align: center; font-weight: 600; font-size: 0.85rem; background: linear-gradient(135deg, #20b2aa, #4682b4); min-width: 70px;">IA2<br>2A</th>';
    echo '<th style="padding: 15px 8px; border: 1px solid #ddd; text-align: center; font-weight: 600; font-size: 0.85rem; background: linear-gradient(135deg, #20b2aa, #4682b4); min-width: 70px;">IA2<br>2B</th>';
    
    echo '<th style="padding: 15px 10px; border: 1px solid #ddd; text-align: center; font-weight: 600; font-size: 0.9rem; min-width: 100px;">Action</th>';
    echo '</tr>';
    
    // Table Rows
    $i = 1;
    while($row = mysqli_fetch_assoc($result)){
        $row_color = ($i % 2 == 0) ? '#f8f9fa' : 'white';
        echo '<tr style="background: ' . $row_color . '; transition: background-color 0.3s ease;">';
        echo '<td style="padding: 12px 10px; border: 1px solid #ddd; text-align: center; font-weight: 600; background: linear-gradient(135deg, #87ceeb, #4682b4); color: white;">' . $i . '</td>';
        
        $usn = htmlspecialchars($row['usn']);
        $student = htmlspecialchars($row['name']);
        $IA1_1A = htmlspecialchars($row['IA1_1A_M']);
        $IA1_1B = htmlspecialchars($row['IA1_1B_M']);
        $IA1_2A = htmlspecialchars($row['IA1_2A_M']);
        $IA1_2B = htmlspecialchars($row['IA1_2B_M']);
        $IA2_1A = htmlspecialchars($row['IA2_1A_M']);
        $IA2_1B = htmlspecialchars($row['IA2_1B_M']);
        $IA2_2A = htmlspecialchars($row['IA2_2A_M']);
        $IA2_2B = htmlspecialchars($row['IA2_2B_M']);
        
        echo '<td style="padding: 12px 10px; border: 1px solid #ddd; text-align: center; font-weight: 600; font-family: monospace;">' . $usn . '</td>';
        echo '<td style="padding: 12px 10px; border: 1px solid #ddd; text-align: left; font-weight: 500;">' . $student . '</td>';
        
        // IA1 marks with red accent
        echo '<td style="padding: 12px 8px; border: 1px solid #ddd; text-align: center; font-weight: 600; border-left: 3px solid #ff6b6b;">' . $IA1_1A . '</td>';
        echo '<td style="padding: 12px 8px; border: 1px solid #ddd; text-align: center; font-weight: 600; border-left: 3px solid #ff6b6b;">' . $IA1_1B . '</td>';
        echo '<td style="padding: 12px 8px; border: 1px solid #ddd; text-align: center; font-weight: 600; border-left: 3px solid #ff6b6b;">' . $IA1_2A . '</td>';
        echo '<td style="padding: 12px 8px; border: 1px solid #ddd; text-align: center; font-weight: 600; border-left: 3px solid #ff6b6b;">' . $IA1_2B . '</td>';
        
        // IA2 marks with teal accent
        echo '<td style="padding: 12px 8px; border: 1px solid #ddd; text-align: center; font-weight: 600; border-left: 3px solid #20b2aa;">' . $IA2_1A . '</td>';
        echo '<td style="padding: 12px 8px; border: 1px solid #ddd; text-align: center; font-weight: 600; border-left: 3px solid #20b2aa;">' . $IA2_1B . '</td>';
        echo '<td style="padding: 12px 8px; border: 1px solid #ddd; text-align: center; font-weight: 600; border-left: 3px solid #20b2aa;">' . $IA2_2A . '</td>';
        echo '<td style="padding: 12px 8px; border: 1px solid #ddd; text-align: center; font-weight: 600; border-left: 3px solid #20b2aa;">' . $IA2_2B . '</td>';
        
        echo '<td style="padding: 12px 10px; border: 1px solid #ddd; text-align: center;">';
        echo '<a href="marks_update.php?updateid=' . urlencode($usn) . '" class="submit-btn" style="display: inline-flex; padding: 8px 16px; text-decoration: none; font-size: 0.85rem;">';
        echo '<span class="btn-text">Update</span>';
        echo '<span class="btn-icon">✏️</span>';
        echo '</a>';
        echo '</td>';
        echo '</tr>';
        
        $i++;
    }
    echo '</table>';
    echo '</div>'; // Close overflow container
    
    echo '</div>'; // Close question-content
    echo '</div>'; // Close question-card
    echo '</div>'; // Close ia-section
    
    // Add summary section
    echo '<div class="submit-section" style="text-align: center; margin-top: 20px;">';
    echo '<p style="font-size: 1.1rem; color: #4a5568; margin: 0;">Total Students: <strong>' . ($i - 1) . '</strong></p>';
    echo '</div>';
}
else{
    echo '<div class="ia-section">';
    echo '<div class="section-header">';
    echo '<h3 class="section-title">No Data Found</h3>';
    echo '<div class="section-divider"></div>';
    echo '</div>';
    
    echo '<div class="question-card">';
    echo '<div class="question-content" style="text-align: center; padding: 40px;">';
    echo '<h3 style="color: #4a5568; margin-bottom: 15px;">No student marks data available</h3>';
    echo '<p style="color: #718096; font-size: 1.1rem;">Please check if marks have been entered for this subject and semester.</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

echo '</div>'; // Close ia-main-form
echo '</div>'; // Close ia-form-container
?>
</body>
</html>
<?php 

    if(isset($_POST['logout'])){
        $_SESSION['username'] = null;
        $_SESSION['password'] = null;
        $_SESSION['semister'] = null;
       if(empty($_SESSION['adminname']) && empty($_SESSION['adminpassword']) && empty($_SESSION['semisters'])){
        session_destroy();
        header("Location:login.php");
    }
    }  

?>