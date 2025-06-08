<?php
    include("connect.php");
    session_start();

    $IA1_1A = null;
    $IA1_1A_CO = 0;
    $IA1_1A_LV = 0;
    $IA1_1B = null;
    $IA1_1B_CO = 0;
    $IA1_1B_LV = 0;

    $IA1_2A = null;
    $IA1_2A_CO =  0;
    $IA1_2A_LV = 0;
    $IA1_2B = null;
    $IA1_2B_CO = 0;
    $IA1_2B_LV = 0;

    $IA2_1A = null;
    $IA2_1A_CO =  0;
    $IA2_1A_LV = 0;
    $IA2_1B = null;
    $IA2_1B_CO = 0;
    $IA2_1B_LV = 0;

    $IA2_2A = null;
    $IA2_2A_CO =  0;
    $IA2_2A_LV = 0;
    $IA2_2B = null;
    $IA2_2B_CO = 0;
    $IA2_2B_LV = 0;

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

        $id = $_SESSION['username'];

      $sql = "INSERT INTO internals (subject, IA1_1A,IA1_1A_CO,IA1_1A_LV,IA1_1B,IA1_1B_CO,IA1_1B_LV,IA1_2A,IA1_2A_CO,IA1_2A_LV,IA1_2B,IA1_2B_CO,IA1_2B_LV,IA2_1A,IA2_1A_CO,IA2_1A_LV,IA2_1B,IA2_1B_CO,IA2_1B_LV,IA2_2A,IA2_2A_CO,IA2_2A_LV,IA2_2B,IA2_2B_CO,IA2_2B_LV) VALUES('$id', '$IA1_1A', '$IA1_1A_CO', '$IA1_1A_LV', '$IA1_1B', '$IA1_1B_CO', '$IA1_1B_LV', '$IA1_2A', '$IA1_2A_CO', '$IA1_2A_LV', '$IA1_2B', '$IA1_2B_CO', '$IA1_2B_LV' , '$IA2_1A', '$IA2_1A_CO','$IA2_1A_LV', '$IA2_1B','$IA2_1B_CO', '$IA2_1B_LV','$IA2_2A', '$IA2_2A_CO','$IA2_2A_LV', '$IA2_2B', '$IA2_2B_CO', '$IA2_2B_LV')";
      $result = mysqli_query($conn, $sql);
      if($result){
        header('location:home.php');
      }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert questions</title>
    <link rel="stylesheet" href="../static/css/home.css">
    <link rel="stylesheet" href="../static/css/user_op2.css">

</head>
<body>
<div class="ia-form-container">
        <div class="form-header">
            <h2 class="form-title">Internal Assessment Question Bank</h2>
            <div class="subject-info">
                <span class="subject-label">Subject ID:</span>
                <span class="subject-id"><?php echo"{$id}";?></span>
            </div>
        </div>

        <form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="ia-main-form">
            <!-- IA1 Section -->
            <div class="ia-section">
                <div class="section-header">
                    <h3 class="section-title">Internal Assessment 1 (IA1)</h3>
                    <div class="section-divider"></div>
                </div>
                
                <div class="questions-grid">
                    <!-- IA1 Question 1A -->
                    <div class="question-card">
                        <div class="question-header">
                            <h4 class="question-title">Question 1A</h4>
                        </div>
                        <div class="question-content">
                            <div class="form-group">
                                <label for="IA1_1A" class="form-label">Question Text</label>
                                <textarea name="IA1_1A" id="IA1_1A" class="form-input question-input" 
                                          placeholder="Enter question text" required><?php echo"{$IA1_1A}"?></textarea>
                            </div>
                            <div class="input-row">
                                <div class="form-group">
                                    <label for="IA1_1A_CO" class="form-label">CO Value</label>
                                    <input type="number" name="IA1_1A_CO" id="IA1_1A_CO" class="form-input co-input" 
                                           placeholder="CO" value='<?php echo"{$IA1_1A_CO}"?>' required min="1" max="10">
                                </div>
                                <div class="form-group">
                                    <label for="IA1_1A_LV" class="form-label">Level</label>
                                    <input type="number" name="IA1_1A_LV" id="IA1_1A_LV" class="form-input level-input" 
                                           placeholder="Level" value='<?php echo"{$IA1_1A_LV}"?>' required min="1" max="6">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- IA1 Question 1B -->
                    <div class="question-card">
                        <div class="question-header">
                            <h4 class="question-title">Question 1B</h4>
                        </div>
                        <div class="question-content">
                            <div class="form-group">
                                <label for="IA1_1B" class="form-label">Question Text</label>
                                <textarea name="IA1_1B" id="IA1_1B" class="form-input question-input" 
                                          placeholder="Enter question text" required><?php echo"{$IA1_1B}"?></textarea>
                            </div>
                            <div class="input-row">
                                <div class="form-group">
                                    <label for="IA1_1B_CO" class="form-label">CO Value</label>
                                    <input type="number" name="IA1_1B_CO" id="IA1_1B_CO" class="form-input co-input" 
                                           placeholder="CO" value='<?php echo"{$IA1_1B_CO}"?>' required min="1" max="10">
                                </div>
                                <div class="form-group">
                                    <label for="IA1_1B_LV" class="form-label">Level</label>
                                    <input type="number" name="IA1_1B_LV" id="IA1_1B_LV" class="form-input level-input" 
                                           placeholder="Level" value='<?php echo"{$IA1_1B_LV}"?>' required min="1" max="6">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- IA1 Question 2A -->
                    <div class="question-card">
                        <div class="question-header">
                            <h4 class="question-title">Question 2A</h4>
                        </div>
                        <div class="question-content">
                            <div class="form-group">
                                <label for="IA1_2A" class="form-label">Question Text</label>
                                <textarea name="IA1_2A" id="IA1_2A" class="form-input question-input" 
                                          placeholder="Enter question text" required><?php echo"{$IA1_2A}"?></textarea>
                            </div>
                            <div class="input-row">
                                <div class="form-group">
                                    <label for="IA1_2A_CO" class="form-label">CO Value</label>
                                    <input type="number" name="IA1_2A_CO" id="IA1_2A_CO" class="form-input co-input" 
                                           placeholder="CO" value='<?php echo"{$IA1_2A_CO}"?>' required min="1" max="10">
                                </div>
                                <div class="form-group">
                                    <label for="IA1_2A_LV" class="form-label">Level</label>
                                    <input type="number" name="IA1_2A_LV" id="IA1_2A_LV" class="form-input level-input" 
                                           placeholder="Level" value='<?php echo"{$IA1_2A_LV}"?>' required min="1" max="6">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- IA1 Question 2B -->
                    <div class="question-card">
                        <div class="question-header">
                            <h4 class="question-title">Question 2B</h4>
                        </div>
                        <div class="question-content">
                            <div class="form-group">
                                <label for="IA1_2B" class="form-label">Question Text</label>
                                <textarea name="IA1_2B" id="IA1_2B" class="form-input question-input" 
                                          placeholder="Enter question text" required><?php echo"{$IA1_2B}"?></textarea>
                            </div>
                            <div class="input-row">
                                <div class="form-group">
                                    <label for="IA1_2B_CO" class="form-label">CO Value</label>
                                    <input type="number" name="IA1_2B_CO" id="IA1_2B_CO" class="form-input co-input" 
                                           placeholder="CO" value='<?php echo"{$IA1_2B_CO}"?>' required min="1" max="10">
                                </div>
                                <div class="form-group">
                                    <label for="IA1_2B_LV" class="form-label">Level</label>
                                    <input type="number" name="IA1_2B_LV" id="IA1_2B_LV" class="form-input level-input" 
                                           placeholder="Level" value='<?php echo"{$IA1_2B_LV}"?>' required min="1" max="6">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- IA2 Section -->
            <div class="ia-section">
                <div class="section-header">
                    <h3 class="section-title">Internal Assessment 2 (IA2)</h3>
                    <div class="section-divider"></div>
                </div>
                
                <div class="questions-grid">
                    <!-- IA2 Question 1A -->
                    <div class="question-card">
                        <div class="question-header">
                            <h4 class="question-title">Question 1A</h4>
                        </div>
                        <div class="question-content">
                            <div class="form-group">
                                <label for="IA2_1A" class="form-label">Question Text</label>
                                <textarea name="IA2_1A" id="IA2_1A" class="form-input question-input" 
                                          placeholder="Enter question text" required><?php echo"{$IA2_1A}"?></textarea>
                            </div>
                            <div class="input-row">
                                <div class="form-group">
                                    <label for="IA2_1A_CO" class="form-label">CO Value</label>
                                    <input type="number" name="IA2_1A_CO" id="IA2_1A_CO" class="form-input co-input" 
                                           placeholder="CO" value='<?php echo"{$IA2_1A_CO}"?>' required min="1" max="10">
                                </div>
                                <div class="form-group">
                                    <label for="IA2_1A_LV" class="form-label">Level</label>
                                    <input type="number" name="IA2_1A_LV" id="IA2_1A_LV" class="form-input level-input" 
                                           placeholder="Level" value='<?php echo"{$IA2_1A_LV}"?>' required min="1" max="6">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- IA2 Question 1B -->
                    <div class="question-card">
                        <div class="question-header">
                            <h4 class="question-title">Question 1B</h4>
                        </div>
                        <div class="question-content">
                            <div class="form-group">
                                <label for="IA2_1B" class="form-label">Question Text</label>
                                <textarea name="IA2_1B" id="IA2_1B" class="form-input question-input" 
                                          placeholder="Enter question text" required><?php echo"{$IA2_1B}"?></textarea>
                            </div>
                            <div class="input-row">
                                <div class="form-group">
                                    <label for="IA2_1B_CO" class="form-label">CO Value</label>
                                    <input type="number" name="IA2_1B_CO" id="IA2_1B_CO" class="form-input co-input" 
                                           placeholder="CO" value='<?php echo"{$IA2_1B_CO}"?>' required min="1" max="10">
                                </div>
                                <div class="form-group">
                                    <label for="IA2_1B_LV" class="form-label">Level</label>
                                    <input type="number" name="IA2_1B_LV" id="IA2_1B_LV" class="form-input level-input" 
                                           placeholder="Level" value='<?php echo"{$IA2_1B_LV}"?>' required min="1" max="6">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- IA2 Question 2A -->
                    <div class="question-card">
                        <div class="question-header">
                            <h4 class="question-title">Question 2A</h4>
                        </div>
                        <div class="question-content">
                            <div class="form-group">
                                <label for="IA2_2A" class="form-label">Question Text</label>
                                <textarea name="IA2_2A" id="IA2_2A" class="form-input question-input" 
                                          placeholder="Enter question text" required><?php echo"{$IA2_2A}"?></textarea>
                            </div>
                            <div class="input-row">
                                <div class="form-group">
                                    <label for="IA2_2A_CO" class="form-label">CO Value</label>
                                    <input type="number" name="IA2_2A_CO" id="IA2_2A_CO" class="form-input co-input" 
                                           placeholder="CO" value='<?php echo"{$IA2_2A_CO}"?>' required min="1" max="10">
                                </div>
                                <div class="form-group">
                                    <label for="IA2_2A_LV" class="form-label">Level</label>
                                    <input type="number" name="IA2_2A_LV" id="IA2_2A_LV" class="form-input level-input" 
                                           placeholder="Level" value='<?php echo"{$IA2_2A_LV}"?>' required min="1" max="6">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- IA2 Question 2B -->
                    <div class="question-card">
                        <div class="question-header">
                            <h4 class="question-title">Question 2B</h4>
                        </div>
                        <div class="question-content">
                            <div class="form-group">
                                <label for="IA2_2B" class="form-label">Question Text</label>
                                <textarea name="IA2_2B" id="IA2_2B" class="form-input question-input" 
                                          placeholder="Enter question text" required><?php echo"{$IA2_2B}"?></textarea>
                            </div>
                            <div class="input-row">
                                <div class="form-group">
                                    <label for="IA2_2B_CO" class="form-label">CO Value</label>
                                    <input type="number" name="IA2_2B_CO" id="IA2_2B_CO" class="form-input co-input" 
                                           placeholder="CO" value='<?php echo"{$IA2_2B_CO}"?>' required min="1" max="10">
                                </div>
                                <div class="form-group">
                                    <label for="IA2_2B_LV" class="form-label">Level</label>
                                    <input type="number" name="IA2_2B_LV" id="IA2_2B_LV" class="form-input level-input" 
                                           placeholder="Level" value='<?php echo"{$IA2_2B_LV}"?>' required min="1" max="6">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Section -->
            <div class="submit-section">
                <button type="submit" name="submit" class="submit-btn update-btn">
                    <span class="btn-text">Update Questions</span>
                    <span class="btn-icon">✓</span>
                </button>
            </div>
        </form>
    </div>
</body>
</html>