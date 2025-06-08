<?php

include("connect.php");
session_start();
$sub = $_SESSION['username'];
$id = $_GET['updateid'];
$sql = "SELECT * FROM `co{$id}` WHERE subject='$sub'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$po1 = $row['po1'];
$po2 = $row['po2'];
$po3 = $row['po3'];
$po4 = $row['po4'];
$po5 = $row['po5'];
$po6 = $row['po6'];
$po7 = $row['po7'];
$po8 = $row['po8'];
$po9 = $row['po9'];
$po10 = $row['po10'];
$po11 = $row['po11'];
$po12 = $row['po12'];
$pso1 = $row['pso1'];
$pso2 = $row['pso2'];
$pso3 = $row['pso3'];
$pso4 = $row['pso4'];

if(isset($_POST['update'])){
    $po1 = $_POST['po1'];
    $po2 = $_POST['po2'];
    $po3 = $_POST['po3'];
    $po4 = $_POST['po4'];
    $po5 = $_POST['po5'];
    $po6 = $_POST['po6'];
    $po7 = $_POST['po7'];
    $po8 = $_POST['po8'];
    $po9 = $_POST['po9'];
    $po10 = $_POST['po10'];
    $po11 = $_POST['po11'];
    $po12 = $_POST['po12'];
    $pso1 = $_POST['pso1'];
    $pso2 = $_POST['pso2'];
    $pso3 = $_POST['pso3'];
    $pso4 = $_POST['pso4'];

    $sql1 = "UPDATE `co{$id}` SET subject='$sub', po1='$po1', po2='$po2', po3='$po3', po4='$po4', po5='$po5', po6='$po6', po7='$po7', po8='$po8', po9='$po9', po10='$po10', po11='$po11', po12='$po12', pso1='$pso1', pso2='$pso2', pso3='$pso3', pso4='$pso4'  WHERE subject='$sub'";
    $result1 = mysqli_query($conn,$sql1);
    header("location:mapping.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CO update</title>
    
    <link rel="stylesheet" href="../static/css/home.css">
    <link rel="stylesheet" href="../static/css/user_op2.css">
</head>
<body>
<div class="ia-form-container">
    <div class="form-header">
        <h1 class="form-title">Course Outcomes Form</h1>
        <div class="subject-info">
            <span class="subject-label">Course ID:</span>
            <span class="subject-id"><?php echo"co{$id}";?></span>
        </div>
    </div>

    <form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="ia-main-form">
        <div class="ia-section">
            <div class="section-header">
                <h2 class="section-title">Program Outcomes (PO)</h2>
                <div class="section-divider"></div>
            </div>
            
            <div class="questions-grid">
                <div class="question-card">
                    <div class="question-header">
                        <h3 class="question-title">PO1 - PO4</h3>
                    </div>
                    <div class="question-content">
                        <div class="input-row">
                            <div class="form-group">
                                <label class="form-label">PO1</label>
                                <input type="number" class="form-input co-input" name="po1" value=<?php echo"{$po1}";?> required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">PO2</label>
                                <input type="number" class="form-input co-input" name="po2" value=<?php echo"{$po2}";?> required>
                            </div>
                        </div>
                        <div class="input-row">
                            <div class="form-group">
                                <label class="form-label">PO3</label>
                                <input type="number" class="form-input co-input" name="po3" value=<?php echo"{$po3}";?> required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">PO4</label>
                                <input type="number" class="form-input co-input" name="po4" value=<?php echo"{$po4}";?> required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question-card">
                    <div class="question-header">
                        <h3 class="question-title">PO5 - PO8</h3>
                    </div>
                    <div class="question-content">
                        <div class="input-row">
                            <div class="form-group">
                                <label class="form-label">PO5</label>
                                <input type="number" class="form-input co-input" name="po5" value=<?php echo"{$po5}";?> required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">PO6</label>
                                <input type="number" class="form-input co-input" name="po6" value=<?php echo"{$po6}";?> required>
                            </div>
                        </div>
                        <div class="input-row">
                            <div class="form-group">
                                <label class="form-label">PO7</label>
                                <input type="number" class="form-input co-input" name="po7" value=<?php echo"{$po7}";?> required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">PO8</label>
                                <input type="number" class="form-input co-input" name="po8" value=<?php echo"{$po8}";?> required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question-card">
                    <div class="question-header">
                        <h3 class="question-title">PO9 - PO12</h3>
                    </div>
                    <div class="question-content">
                        <div class="input-row">
                            <div class="form-group">
                                <label class="form-label">PO9</label>
                                <input type="number" class="form-input co-input" name="po9" value=<?php echo"{$po9}";?> required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">PO10</label>
                                <input type="number" class="form-input co-input" name="po10" value=<?php echo"{$po10}";?> required>
                            </div>
                        </div>
                        <div class="input-row">
                            <div class="form-group">
                                <label class="form-label">PO11</label>
                                <input type="number" class="form-input co-input" name="po11" value=<?php echo"{$po11}";?> required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">PO12</label>
                                <input type="number" class="form-input co-input" name="po12" value=<?php echo"{$po12}";?> required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ia-section">
            <div class="section-header">
                <h2 class="section-title">Program Specific Outcomes (PSO)</h2>
                <div class="section-divider"></div>
            </div>
            
            <div class="questions-grid">
                <div class="question-card">
                    <div class="question-header">
                        <h3 class="question-title">PSO1 - PSO4</h3>
                    </div>
                    <div class="question-content">
                        <div class="input-row">
                            <div class="form-group">
                                <label class="form-label">PSO1</label>
                                <input type="number" class="form-input level-input" name="pso1" value=<?php echo"{$pso1}";?> required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">PSO2</label>
                                <input type="number" class="form-input level-input" name="pso2" value=<?php echo"{$pso2}";?> required>
                            </div>
                        </div>
                        <div class="input-row">
                            <div class="form-group">
                                <label class="form-label">PSO3</label>
                                <input type="number" class="form-input level-input" name="pso3" value=<?php echo"{$pso3}";?> required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">PSO4</label>
                                <input type="number" class="form-input level-input" name="pso4" value=<?php echo"{$pso4}";?> required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="submit-section">
            <button type="submit" name="update" value="update" class="submit-btn">
                <span class="btn-text">Update</span>
                <span class="btn-icon">✓</span>
            </button>
        </div>
    </form>
</div>
</body>
</html>