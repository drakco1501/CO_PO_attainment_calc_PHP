<?php
include("connect.php");
session_start();

// Initialize variables
$usn = $name = $ac_year = $sem = '';
$error_message = '';
$success_message = '';

// Get the original ID from URL
if (!isset($_GET['updateid']) || empty($_GET['updateid'])) {
    header('location:students.php');
    exit;
}

$original_id = mysqli_real_escape_string($conn, $_GET['updateid']);

// Fetch existing student data
$sql = "SELECT * FROM `students` WHERE usn = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $original_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $usn = $row['usn'];
    $name = $row['name'];
    $ac_year = $row['acadamic_year'];
    $sem = $row['sem'];
} else {
    header('location:students.php');
    exit;
}

// Handle form submission
if (isset($_POST['submit'])) {
    // Get and sanitize input data
    $new_usn = mysqli_real_escape_string($conn, trim($_POST['usn']));
    $new_name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $new_ac_year = (int)$_POST['ac_year'];
    $new_sem = (int)$_POST['sem'];
    
    // Validate input
    if (empty($new_usn) || empty($new_name) || $new_ac_year <= 0 || $new_sem < 1 || $new_sem > 8) {
        $error_message = "All fields are required and must be valid.";
    } else {
        // Start transaction for data consistency
        mysqli_autocommit($conn, false);
        
        try {
            // Check if new USN already exists (if USN is being changed)
            if ($new_usn !== $original_id) {
                $check_sql = "SELECT usn FROM `students` WHERE usn = ? AND usn != ?";
                $check_stmt = mysqli_prepare($conn, $check_sql);
                mysqli_stmt_bind_param($check_stmt, "ss", $new_usn, $original_id);
                mysqli_stmt_execute($check_stmt);
                $check_result = mysqli_stmt_get_result($check_stmt);
                
                if (mysqli_num_rows($check_result) > 0) {
                    throw new Exception("USN already exists. Please use a different USN.");
                }
            }
            
            // Update students table
            $update_student_sql = "UPDATE `students` SET usn = ?, name = ?, acadamic_year = ?, sem = ? WHERE usn = ?";
            $student_stmt = mysqli_prepare($conn, $update_student_sql);
            mysqli_stmt_bind_param($student_stmt, "ssiss", $new_usn, $new_name, $new_ac_year, $new_sem, $original_id);
            
            if (!mysqli_stmt_execute($student_stmt)) {
                throw new Exception("Failed to update student information.");
            }
            
            // Update marks table for all subjects
            $subjects_sql = "SELECT username FROM `login`";
            $subjects_result = mysqli_query($conn, $subjects_sql);
            
            while ($subject_row = mysqli_fetch_assoc($subjects_result)) {
                $subject = $subject_row['username'];
                $update_marks_sql = "UPDATE `marks` SET usn = ?, name = ?, acadamic_year = ?, sem = ? WHERE usn = ? AND subject = ?";
                $marks_stmt = mysqli_prepare($conn, $update_marks_sql);
                mysqli_stmt_bind_param($marks_stmt, "ssisss", $new_usn, $new_name, $new_ac_year, $new_sem, $original_id, $subject);
                mysqli_stmt_execute($marks_stmt);
            }
            
            // Commit transaction
            mysqli_commit($conn);
            
            // Update local variables for display
            $usn = $new_usn;
            $name = $new_name;
            $ac_year = $new_ac_year;
            $sem = $new_sem;
            
            $success_message = "Student information updated successfully!";
            
            // Redirect after successful update
            echo "<script>
                setTimeout(function() {
                    window.location.href = 'students.php';
                }, 2000);
            </script>";
            
        } catch (Exception $e) {
            // Rollback transaction on error
            mysqli_rollback($conn);
            $error_message = $e->getMessage();
        }
        
        // Re-enable autocommit
        mysqli_autocommit($conn, true);
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Update Student</title>
    <link rel="stylesheet" href="../static/css/admin_op.css">
</head>
<body>

<div class="user-management-container">
    <div class="add-user-form">
        <h3 class="form-title">Update Student Information</h3>
        
        <?php if (!empty($error_message)): ?>
            <div class="message error-message">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($success_message)): ?>
            <div class="message success-message">
                <?php echo htmlspecialchars($success_message); ?>
            </div>
        <?php endif; ?>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?updateid=' . urlencode($original_id)); ?>">
            <div class="form-group">
                <label for="usn" class="form-label">USN:</label>
                <input type="text" 
                       placeholder="Enter USN" 
                       name="usn" 
                       id="usn"
                       class="form-input" 
                       autocomplete="off" 
                       required 
                       value="<?php echo htmlspecialchars($usn); ?>">
            </div>
            
            <div class="form-group">
                <label for="name" class="form-label">Student Name:</label>
                <input type="text" 
                       placeholder="Enter student name" 
                       name="name" 
                       id="name"
                       class="form-input" 
                       autocomplete="off" 
                       required  
                       value="<?php echo htmlspecialchars($name); ?>">
            </div>
            
            <div class="form-group">
                <label for="ac_year" class="form-label">Academic Year:</label>
                <input type="number" 
                       placeholder="Enter academic year" 
                       name="ac_year" 
                       id="ac_year"
                       class="form-input" 
                       autocomplete="off" 
                       required 
                       min="1"
                       value="<?php echo htmlspecialchars($ac_year); ?>">
            </div>
            
            <div class="form-group">
                <label for="sem" class="form-label">Semester:</label>
                <input type="number" 
                       placeholder="Enter semester (1-8)" 
                       name="sem" 
                       id="sem"
                       class="form-input" 
                       autocomplete="off" 
                       required 
                       min="1" 
                       max="8"
                       value="<?php echo htmlspecialchars($sem); ?>">
            </div>
            
            <button type="submit" name="submit" class="submit-btn">Update Student</button>
        </form>
    </div>
</div>

<script src="../static/js/scripts.js"></script>
</body>
</html>