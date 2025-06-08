<?php

include("connect.php");
session_start();

$id = $_GET['updateid'];
$sql = "SELECT * FROM `internals` WHERE subject='$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$IA1_1A = $row['IA1_1A'];
$IA1_1A_CO = $row['IA1_1A_CO'];
$IA1_1A_LV = $row['IA1_1A_LV'];
$IA1_1B = $row['IA1_1B'];
$IA1_1B_CO = $row['IA1_1B_CO'];
$IA1_1B_LV = $row['IA1_1B_LV'];

$IA1_2A = $row['IA1_2A'];
$IA1_2A_CO = $row['IA1_2A_CO'];
$IA1_2A_LV = $row['IA1_2A_LV'];
$IA1_2B = $row['IA1_2B'];
$IA1_2B_CO = $row['IA1_2B_CO'];
$IA1_2B_LV = $row['IA1_2B_LV'];

$IA2_1A = $row['IA2_1A'];
$IA2_1A_CO = $row['IA2_1A_CO'];
$IA2_1A_LV = $row['IA2_1A_LV'];
$IA2_1B = $row['IA2_1B'];
$IA2_1B_CO = $row['IA2_1B_CO'];
$IA2_1B_LV = $row['IA2_1B_LV'];

$IA2_2A = $row['IA2_2A'];
$IA2_2A_CO = $row['IA2_2A_CO'];
$IA2_2A_LV = $row['IA2_2A_LV'];
$IA2_2B = $row['IA2_2B'];
$IA2_2B_CO = $row['IA2_2B_CO'];
$IA2_2B_LV = $row['IA2_2B_LV'];



if (isset($_POST['submit'])) {
    $IA1_1A = $_POST['IA1_1A'];
    $IA1_1A_CO = $_POST['IA1_1A_CO'];
    $IA1_1A_LV = $_POST['IA1_1A_LV'];
    $IA1_1B = $_POST['IA1_1B'];
    $IA1_1B_CO = $_POST['IA1_1B_CO'];
    $IA1_1B_LV = $_POST['IA1_1B_LV'];
    
    $IA1_2A = $_POST['IA1_2A'];
    $IA1_2A_CO = $_POST['IA1_2A_CO'];
    $IA1_2A_LV = $_POST['IA1_2A_LV'];
    $IA1_2B = $_POST['IA1_2B'];
    $IA1_2B_CO = $_POST['IA1_2B_CO'];
    $IA1_2B_LV = $_POST['IA1_2B_LV'];
    
    $IA2_1A = $_POST['IA2_1A'];
    $IA2_1A_CO = $_POST['IA2_1A_CO'];
    $IA2_1A_LV = $_POST['IA2_1A_LV'];
    $IA2_1B = $_POST['IA2_1B'];
    $IA2_1B_CO = $_POST['IA2_1B_CO'];
    $IA2_1B_LV = $_POST['IA2_1B_LV'];
    
    $IA2_2A = $_POST['IA2_2A'];
    $IA2_2A_CO = $_POST['IA2_2A_CO'];
    $IA2_2A_LV = $_POST['IA2_2A_LV'];
    $IA2_2B = $_POST['IA2_2B'];
    $IA2_2B_CO = $_POST['IA2_2B_CO'];
    $IA2_2B_LV = $_POST['IA2_2B_LV'];
  $sql = "UPDATE `internals` SET subject='$id', IA1_1A='$IA1_1A', IA1_1A_CO='$IA1_1A_CO', IA1_1A_LV='$IA1_1A_LV',IA1_1B='$IA1_1B', IA1_1B_CO='$IA1_1B_CO', IA1_1B_LV='$IA1_1B_LV',IA1_2A='$IA1_2A', IA1_2A_CO='$IA1_2A_CO', IA1_2A_LV='$IA1_2A_LV',IA1_2B='$IA1_2B', IA1_2B_CO='$IA1_2B_CO', IA1_2B_LV='$IA1_2B_LV',IA2_1A='$IA2_1A', IA2_1A_CO='$IA2_1A_CO', IA2_1A_LV='$IA2_1A_LV', IA2_1B='$IA2_1B', IA2_1B_CO='$IA2_1B_CO', IA2_1B_LV='$IA2_1B_LV',IA2_2A='$IA2_2A', IA2_2A_CO='$IA2_2A_CO', IA2_2A_LV='$IA2_2A_LV', IA2_2B='$IA2_2B',IA2_2B_CO='$IA2_2B_CO', IA2_2B_LV='$IA2_2B_LV' WHERE subject='$id'";
  $result = mysqli_query($conn, $sql);
  if($result){
    header('location:internal_qa.php');
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
    <title>update question</title>
</head>
<body>
    <div class="ia-form-container">
    <div class="form-header">
        <h1 class="form-title">Internal Assessment Form</h1>
        <div class="subject-info">
            <span class="subject-label">Subject ID:</span>
            <span class="subject-id"><?php echo"{$id}";?></span>
        </div>
    </div>

    <form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="ia-main-form">
        <div class="ia-section">
            <div class="section-header">
                <h2 class="section-title">IA1 Questions</h2>
                <div class="section-divider"></div>
            </div>
            
            <div class="questions-grid">
                <div class="question-card">
                    <div class="question-header">
                        <h3 class="question-title">IA1_1A</h3>
                    </div>
                    <div class="question-content">
                        <div class="form-group">
                            <label class="form-label">Question</label>
                            <textarea class="form-input question-input" placeholder="Enter question" name="IA1_1A" required><?php echo"{$IA1_1A}"?></textarea>
                        </div>
                        <div class="input-row">
                            <div class="form-group">
                                <label class="form-label">CO Value</label>
                                <input type="number" class="form-input co-input" placeholder="Enter value" name="IA1_1A_CO" value='<?php echo"{$IA1_1A_CO}"?>' required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Level</label>
                                <input type="number" class="form-input level-input" placeholder="Enter level" name="IA1_1A_LV" value='<?php echo"{$IA1_1A_LV}"?>' required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question-card">
                    <div class="question-header">
                        <h3 class="question-title">IA1_1B</h3>
                    </div>
                    <div class="question-content">
                        <div class="form-group">
                            <label class="form-label">Question</label>
                            <textarea class="form-input question-input" placeholder="Enter question" name="IA1_1B" required><?php echo"{$IA1_1B}"?></textarea>
                        </div>
                        <div class="input-row">
                            <div class="form-group">
                                <label class="form-label">CO Value</label>
                                <input type="number" class="form-input co-input" placeholder="Enter value" name="IA1_1B_CO" value='<?php echo"{$IA1_1B_CO}"?>' required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Level</label>
                                <input type="number" class="form-input level-input" placeholder="Enter level" name="IA1_1B_LV" value='<?php echo"{$IA1_1B_LV}"?>' required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question-card">
                    <div class="question-header">
                        <h3 class="question-title">IA1_2A</h3>
                    </div>
                    <div class="question-content">
                        <div class="form-group">
                            <label class="form-label">Question</label>
                            <textarea class="form-input question-input" placeholder="Enter question" name="IA1_2A" required><?php echo"{$IA1_2A}"?></textarea>
                        </div>
                        <div class="input-row">
                            <div class="form-group">
                                <label class="form-label">CO Value</label>
                                <input type="number" class="form-input co-input" placeholder="Enter value" name="IA1_2A_CO" value='<?php echo"{$IA1_2A_CO}"?>' required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Level</label>
                                <input type="number" class="form-input level-input" placeholder="Enter level" name="IA1_2A_LV" value='<?php echo"{$IA1_2A_LV}"?>' required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question-card">
                    <div class="question-header">
                        <h3 class="question-title">IA1_2B</h3>
                    </div>
                    <div class="question-content">
                        <div class="form-group">
                            <label class="form-label">Question</label>
                            <textarea class="form-input question-input" placeholder="Enter question" name="IA1_2B" required><?php echo"{$IA1_2B}"?></textarea>
                        </div>
                        <div class="input-row">
                            <div class="form-group">
                                <label class="form-label">CO Value</label>
                                <input type="number" class="form-input co-input" placeholder="Enter value" name="IA1_2B_CO" value='<?php echo"{$IA1_2B_CO}"?>' required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Level</label>
                                <input type="number" class="form-input level-input" placeholder="Enter level" name="IA1_2B_LV" value='<?php echo"{$IA1_2B_LV}"?>' required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ia-section">
            <div class="section-header">
                <h2 class="section-title">IA2 Questions</h2>
                <div class="section-divider"></div>
            </div>
            
            <div class="questions-grid">
                <div class="question-card">
                    <div class="question-header">
                        <h3 class="question-title">IA2_1A</h3>
                    </div>
                    <div class="question-content">
                        <div class="form-group">
                            <label class="form-label">Question</label>
                            <textarea class="form-input question-input" placeholder="Enter question" name="IA2_1A" required><?php echo"{$IA2_1A}"?></textarea>
                        </div>
                        <div class="input-row">
                            <div class="form-group">
                                <label class="form-label">CO Value</label>
                                <input type="number" class="form-input co-input" placeholder="Enter value" name="IA2_1A_CO" value='<?php echo"{$IA2_1A_CO}"?>' required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Level</label>
                                <input type="number" class="form-input level-input" placeholder="Enter level" name="IA2_1A_LV" value='<?php echo"{$IA2_1A_LV}"?>' required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question-card">
                    <div class="question-header">
                        <h3 class="question-title">IA2_1B</h3>
                    </div>
                    <div class="question-content">
                        <div class="form-group">
                            <label class="form-label">Question</label>
                            <textarea class="form-input question-input" placeholder="Enter question" name="IA2_1B" required><?php echo"{$IA2_1B}"?></textarea>
                        </div>
                        <div class="input-row">
                            <div class="form-group">
                                <label class="form-label">CO Value</label>
                                <input type="number" class="form-input co-input" placeholder="Enter value" name="IA2_1B_CO" value='<?php echo"{$IA2_1B_CO}"?>' required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Level</label>
                                <input type="number" class="form-input level-input" placeholder="Enter level" name="IA2_1B_LV" value='<?php echo"{$IA2_1B_LV}"?>' required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question-card">
                    <div class="question-header">
                        <h3 class="question-title">IA2_2A</h3>
                    </div>
                    <div class="question-content">
                        <div class="form-group">
                            <label class="form-label">Question</label>
                            <textarea class="form-input question-input" placeholder="Enter question" name="IA2_2A" required><?php echo"{$IA2_2A}"?></textarea>
                        </div>
                        <div class="input-row">
                            <div class="form-group">
                                <label class="form-label">CO Value</label>
                                <input type="number" class="form-input co-input" placeholder="Enter value" name="IA2_2A_CO" value='<?php echo"{$IA2_2A_CO}"?>' required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Level</label>
                                <input type="number" class="form-input level-input" placeholder="Enter level" name="IA2_2A_LV" value='<?php echo"{$IA2_2A_LV}"?>' required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question-card">
                    <div class="question-header">
                        <h3 class="question-title">IA2_2B</h3>
                    </div>
                    <div class="question-content">
                        <div class="form-group">
                            <label class="form-label">Question</label>
                            <textarea class="form-input question-input" placeholder="Enter question" name="IA2_2B" required><?php echo"{$IA2_2B}"?></textarea>
                        </div>
                        <div class="input-row">
                            <div class="form-group">
                                <label class="form-label">CO Value</label>
                                <input type="number" class="form-input co-input" placeholder="Enter value" name="IA2_2B_CO" value='<?php echo"{$IA2_2B_CO}"?>' required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Level</label>
                                <input type="number" class="form-input level-input" placeholder="Enter level" name="IA2_2B_LV" value='<?php echo"{$IA2_2B_LV}"?>' required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="submit-section">
            <button type="submit" name="submit" class="submit-btn">
                <span class="btn-text">Update</span>
                <span class="btn-icon">✓</span>
            </button>
        </div>
    </form>
</div>
</body>
</html>