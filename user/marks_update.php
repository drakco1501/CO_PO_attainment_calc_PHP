<?php
    include("connect.php");
    session_start();
    $usn = $_GET['updateid'];
    $sub = $_SESSION['username'];
    $sem = $_SESSION['semister'];
    $sql = "SELECT * FROM marks WHERE usn='$usn' and sem='$sem'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    if(empty($row['IA1_1A_M']) || $row['IA1_1A_M'] == 0){
        $IA1_1A_M = 0;
    }else{
        $IA1_1A_M = $row['IA1_1A_M'];
    }
    if(empty($row['IA1_1B_M']) || $row['IA1_1B_M'] == 0){
        $IA1_1B_M = 0;
    }else{
        $IA1_1B_M = $row['IA1_1B_M'];
    }
    if(empty($row['IA1_2A_M']) || $row['IA1_2A_M'] == 0){
        $IA1_2A_M = 0;
    }else{
        $IA1_2A_M = $row['IA1_2A_M'];
    }
    if(empty($row['IA1_2B_M']) || $row['IA1_2B_M'] == 0){
        $IA1_2B_M = 0;
    }else{
        $IA1_2B_M = $row['IA1_2B_M'];
    }
    if(empty($row['IA2_1A_M']) || $row['IA2_1A_M'] == 0){
        $IA2_1A_M = 0;
    }else{
        $IA2_1A_M = $row['IA2_1A_M'];
    }
    if(empty($row['IA2_1B_M']) || $row['IA2_1B_M'] == 0){
        $IA2_1B_M = 0;
    }else{
        $IA2_1B_M = $row['IA2_1B_M'];
    }
    if(empty($row['IA2_2A_M']) || $row['IA2_2A_M'] == 0){
        $IA2_2A_M = 0;
    }else{
        $IA2_2A_M = $row['IA2_2A_M'];
    }
    if(empty($row['IA2_2B_M']) || $row['IA2_2B_M'] == 0){
        $IA2_2B_M = 0;
    }else{
        $IA2_2B_M = $row['IA2_2B_M'];
    }
     
    if(isset($_POST['update'])){
        $IA1_1A_M = $_POST['IA1_1A_M'];
        $IA1_1B_M = $_POST['IA1_1B_M'];
        $IA1_2A_M = $_POST['IA1_2A_M'];
        $IA1_2B_M = $_POST['IA1_2B_M'];
        $IA2_1A_M = $_POST['IA2_1A_M'];
        $IA2_1B_M = $_POST['IA2_1B_M'];
        $IA2_2A_M = $_POST['IA2_2A_M'];
        $IA2_2B_M = $_POST['IA2_2B_M']; 
        $sql1 = "UPDATE `marks` SET IA1_1A_M='$IA1_1A_M', IA1_1B_M='$IA1_1B_M', IA1_2A_M='$IA1_2A_M', IA1_2B_M='$IA1_2B_M', IA2_1A_M='$IA2_1A_M', IA2_1B_M='$IA2_1B_M', IA2_2A_M='$IA2_2A_M', IA2_2B_M='$IA2_2B_M' WHERE subject='$sub'and usn='$usn' ";
        $result1 = mysqli_query($conn,$sql1);
        if($result1){
            header("location:marks.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../static/css/home.css">
    <link rel="stylesheet" href="../static/css/user_op2.css">
    <title>update marks</title>
</head>
<body>
    <div class="ia-form-container">
    <div class="form-header">
        <h2 class="form-title">Internal Assessment Marks</h2>
        <div class="subject-info">
            <span class="subject-label">Student USN:</span>
            <span class="subject-id"><?php echo htmlspecialchars($usn); ?></span>
        </div>
    </div>
    
    <div class="ia-main-form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="ia-section">
                <div class="section-header">
                    <h3 class="section-title">IA Marks Entry</h3>
                    <div class="section-divider"></div>
                </div>
                
                <div class="questions-grid">
                    <!-- IA1 Section -->
                    <div class="question-card">
                        <div class="question-header">
                            <h4 class="question-title">Internal Assessment 1</h4>
                        </div>
                        <div class="question-content">
                            <div class="form-group">
                                <label class="form-label">IA1 - Question 1A</label>
                                <input type="number" name="IA1_1A_M" class="form-input level-input" 
                                       value='<?php echo htmlspecialchars($IA1_1A_M); ?>' 
                                       placeholder="Enter marks for IA1-1A">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">IA1 - Question 1B</label>
                                <input type="number" name="IA1_1B_M" class="form-input level-input" 
                                       value='<?php echo htmlspecialchars($IA1_1B_M); ?>' 
                                       placeholder="Enter marks for IA1-1B">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">IA1 - Question 2A</label>
                                <input type="number" name="IA1_2A_M" class="form-input level-input" 
                                       value='<?php echo htmlspecialchars($IA1_2A_M); ?>' 
                                       placeholder="Enter marks for IA1-2A">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">IA1 - Question 2B</label>
                                <input type="number" name="IA1_2B_M" class="form-input level-input" 
                                       value='<?php echo htmlspecialchars($IA1_2B_M); ?>' 
                                       placeholder="Enter marks for IA1-2B">
                            </div>
                        </div>
                    </div>
                    
                    <!-- IA2 Section -->
                    <div class="question-card">
                        <div class="question-header">
                            <h4 class="question-title">Internal Assessment 2</h4>
                        </div>
                        <div class="question-content">
                            <div class="form-group">
                                <label class="form-label">IA2 - Question 1A</label>
                                <input type="number" name="IA2_1A_M" class="form-input co-input" 
                                       value='<?php echo htmlspecialchars($IA2_1A_M); ?>' 
                                       placeholder="Enter marks for IA2-1A">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">IA2 - Question 1B</label>
                                <input type="number" name="IA2_1B_M" class="form-input co-input" 
                                       value='<?php echo htmlspecialchars($IA2_1B_M); ?>' 
                                       placeholder="Enter marks for IA2-1B">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">IA2 - Question 2A</label>
                                <input type="number" name="IA2_2A_M" class="form-input co-input" 
                                       value='<?php echo htmlspecialchars($IA2_2A_M); ?>' 
                                       placeholder="Enter marks for IA2-2A">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">IA2 - Question 2B</label>
                                <input type="number" name="IA2_2B_M" class="form-input co-input" 
                                       value='<?php echo htmlspecialchars($IA2_2B_M); ?>' 
                                       placeholder="Enter marks for IA2-2B">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="submit-section">
                <button name="update" value="update" class="submit-btn">
                    <span class="btn-text">Update Marks</span>
                    <span class="btn-icon">✓</span>
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>