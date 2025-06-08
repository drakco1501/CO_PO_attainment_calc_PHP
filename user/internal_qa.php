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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../static/css/home.css">
    <link rel="stylesheet" href="../static/css/user_op2.css">
    <title>internal_qa</title>
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
$id = $_SESSION['username'];
$sql = "SELECT * FROM `internals` WHERE subject ='$id'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0) {
    // No questions found - show add option
    echo '<div class="ia-form-container">';
    echo '<div class="form-header">';
    echo '<h1 class="form-title">Internal Assessment Questions</h1>';
    echo '<div class="subject-info">';
    echo '<span class="subject-label">Subject:</span>';
    echo '<span class="subject-id">' . htmlspecialchars($id) . '</span>';
    echo '</div>';
    echo '</div>';
    
    echo '<div class="ia-main-form">';
    echo '<div class="ia-section">';
    echo '<div class="section-header">';
    echo '<h2 class="section-title">No Questions Found</h2>';
    echo '<div class="section-divider"></div>';
    echo '</div>';
    
    echo '<div class="question-card">';
    echo '<div class="question-header">';
    echo '<h3 class="question-title">Add New Questions</h3>';
    echo '</div>';
    echo '<div class="question-content">';
    echo '<p style="text-align: center; margin-bottom: 20px; color: #666; font-size: 1.1rem;">No internal assessment questions have been added for this subject yet.</p>';
    echo '<div class="submit-section">';
    echo '<a href="insert_qa.php?insertid=' . urlencode($id) . '" class="submit-btn">';
    echo '<span class="btn-text">Add Internal Questions</span>';
    echo '<span class="btn-icon">+</span>';
    echo '</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
} else {
    // Questions found - display table
    $row = mysqli_fetch_assoc($result);
    
    echo '<div class="ia-form-container">';
    echo '<div class="form-header">';
    echo '<h1 class="form-title">Internal Assessment Questions</h1>';
    echo '<div class="subject-info">';
    echo '<span class="subject-label">Subject:</span>';
    echo '<span class="subject-id">' . htmlspecialchars($id) . '</span>';
    echo '</div>';
    echo '</div>';
    
    echo '<div class="ia-main-form">';
    echo '<div class="ia-section">';
    echo '<div class="section-header">';
    echo '<h2 class="section-title">Question Paper Details</h2>';
    echo '<div class="section-divider"></div>';
    echo '</div>';
    
    // Questions table with modern styling
    echo '<div class="questions-table-container">';
    echo '<table class="questions-table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th class="table-header">Sl No</th>';
    echo '<th class="table-header">Internal Question</th>';
    echo '<th class="table-header">Question Text</th>';
    echo '<th class="table-header">CO Value</th>';
    echo '<th class="table-header">CO Level</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
    // Question rows with corrected labels
    $questions = [
        ['IA1_1A', $row['IA1_1A'], $row['IA1_1A_CO'], $row['IA1_1A_LV']],
        ['IA1_1B', $row['IA1_1B'], $row['IA1_1B_CO'], $row['IA1_1B_LV']],
        ['IA1_2A', $row['IA1_2A'], $row['IA1_2A_CO'], $row['IA1_2A_LV']],
        ['IA1_2B', $row['IA1_2B'], $row['IA1_2B_CO'], $row['IA1_2B_LV']],
        ['IA2_1A', $row['IA2_1A'], $row['IA2_1A_CO'], $row['IA2_1A_LV']],
        ['IA2_1B', $row['IA2_1B'], $row['IA2_1B_CO'], $row['IA2_1B_LV']],
        ['IA2_2A', $row['IA2_2A'], $row['IA2_2A_CO'], $row['IA2_2A_LV']],
        ['IA2_2B', $row['IA2_2B'], $row['IA2_2B_CO'], $row['IA2_2B_LV']]
    ];
    
    for($i = 0; $i < count($questions); $i++) {
        echo '<tr class="table-row">';
        echo '<td class="table-cell serial-cell">' . ($i + 1) . '</td>';
        echo '<td class="table-cell question-code-cell">' . htmlspecialchars($questions[$i][0]) . '</td>';
        echo '<td class="table-cell question-text-cell">' . htmlspecialchars($questions[$i][1]) . '</td>';
        echo '<td class="table-cell co-cell">' . htmlspecialchars($questions[$i][2]) . '</td>';
        echo '<td class="table-cell level-cell">' . htmlspecialchars($questions[$i][3]) . '</td>';
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    
    // Update button section
    echo '<div class="submit-section">';
    echo '<a href="qa_update.php?updateid=' . urlencode($id) . '" class="submit-btn">';
    echo '<span class="btn-text">Update Questions</span>';
    echo '<span class="btn-icon">✎</span>';
    echo '</a>';
    echo '</div>';
    
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
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