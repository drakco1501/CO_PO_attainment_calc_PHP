<?php
include("connect.php");
session_start();

// Initialize variables
$Uname = '';
$error_message = '';
$success_message = '';

// Validate and get the ID from URL
if (!isset($_GET['updateid']) || empty($_GET['updateid']) || !is_numeric($_GET['updateid'])) {
    header('location:admin_add_user.php');
    exit;
}

$id = (int)$_GET['updateid'];

// Fetch existing user data using prepared statement
$sql = "SELECT * FROM `login` WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $Uname = $row['username'];
} else {
    $error_message = "User not found.";
    header('location:admin_add_user.php');
    exit;
}

// Handle form submission
if (isset($_POST['submit'])) {
    // Get and sanitize input data
    $newname = mysqli_real_escape_string($conn, trim($_POST['username']));
    $Pword = trim($_POST['password']);
    
    // Validate input
    if (empty($newname)) {
        $error_message = "Username is required.";
    } elseif (strlen($newname) < 3) {
        $error_message = "Username must be at least 3 characters long.";
    } elseif (empty($Pword)) {
        $error_message = "Password is required.";
    } elseif (strlen($Pword) < 6) {
        $error_message = "Password must be at least 6 characters long.";
    } else {
        // Start transaction for data consistency
        mysqli_autocommit($conn, false);
        
        try {
            // Check if new username already exists for other users
            $check_sql = "SELECT id FROM `login` WHERE username = ? AND id != ?";
            $check_stmt = mysqli_prepare($conn, $check_sql);
            mysqli_stmt_bind_param($check_stmt, "si", $newname, $id);
            mysqli_stmt_execute($check_stmt);
            $check_result = mysqli_stmt_get_result($check_stmt);
            
            if (mysqli_num_rows($check_result) > 0) {
                throw new Exception("Username already exists. Please choose a different username.");
            }
            
            // Hash the password
            $hash = password_hash($Pword, PASSWORD_DEFAULT);
            
            // Update login table using prepared statement
            $update_login_sql = "UPDATE `login` SET username = ?, password = ? WHERE id = ?";
            $login_stmt = mysqli_prepare($conn, $update_login_sql);
            mysqli_stmt_bind_param($login_stmt, "ssi", $newname, $hash, $id);
            
            if (!mysqli_stmt_execute($login_stmt)) {
                throw new Exception("Failed to update user information.");
            }
            
            // Update marks table - change subject name from old username to new username
            $update_marks_sql = "UPDATE `marks` SET subject = ? WHERE subject = ?";
            $marks_stmt = mysqli_prepare($conn, $update_marks_sql);
            mysqli_stmt_bind_param($marks_stmt, "ss", $newname, $Uname);
            
            if (!mysqli_stmt_execute($marks_stmt)) {
                throw new Exception("Failed to update marks table.");
            }
            
            // Commit transaction
            mysqli_commit($conn);
            
            // Update display variable
            $Uname = $newname;
            $success_message = "User updated successfully!";
            
            // Redirect after successful update
            echo "<script>
                setTimeout(function() {
                    window.location.href = 'admin_add_user.php';
                }, 2000);
            </script>";
            
        } catch (Exception $e) {
            // Rollback transaction on error
            mysqli_rollback($conn);
            $error_message = $e->getMessage();
            error_log("User update error: " . $e->getMessage());
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
    <title>Update User</title>
    <link rel="stylesheet" href="../static/css/admin_op.css">
</head>
<body>

<div class="user-management-container">
    <div class="add-user-form">
        <h3 class="form-title">Update User Information</h3>
        
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
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?updateid=' . urlencode($id)); ?>">
            <div class="form-group">
                <label for="username" class="form-label">Username:</label>
                <input type="text" 
                       placeholder="Enter username" 
                       name="username" 
                       id="username"
                       class="form-input"
                       autocomplete="off" 
                       required 
                       minlength="3"
                       value="<?php echo htmlspecialchars($Uname); ?>">
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label">New Password:</label>
                <input type="password" 
                       placeholder="Enter new password" 
                       name="password" 
                       id="password"
                       class="form-input"
                       autocomplete="new-password" 
                       required
                       minlength="6">
                <small style="color: #666; font-size: 12px;">Password must be at least 6 characters long</small>
            </div>
            
            <button type="submit" name="submit" class="submit-btn">Update User</button>
        </form>
    </div>
</div>

<script src="../static/js/scripts.js"></script>
</body>
</html>