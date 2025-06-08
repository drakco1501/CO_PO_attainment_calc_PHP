<?php
include("connect.php");
session_start();

// Initialize variables
$Uname = '';
$error_message = '';
$success_message = '';

// Validate and get the ID from URL
if (!isset($_GET['updateid']) || empty($_GET['updateid']) || !is_numeric($_GET['updateid'])) {
    header('location:admin_add_admin.php');
    exit;
}

$id = (int)$_GET['updateid'];

// Fetch existing admin data using prepared statement
$sql = "SELECT * FROM `admin_login` WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $Uname = $row['adminname'];
} else {
    $error_message = "Admin not found.";
    header('location:admin_add_admin.php');
    exit;
}

// Handle form submission
if (isset($_POST['submit'])) {
    // Get and sanitize input data
    $new_username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $new_password = trim($_POST['password']);
    
    // Validate input
    if (empty($new_username)) {
        $error_message = "Admin name is required.";
    } elseif (strlen($new_username) < 3) {
        $error_message = "Admin name must be at least 3 characters long.";
    } elseif (empty($new_password)) {
        $error_message = "Password is required.";
    } elseif (strlen($new_password) < 6) {
        $error_message = "Password must be at least 6 characters long.";
    } else {
        try {
            // Check if username already exists for other admins
            $check_sql = "SELECT id FROM `admin_login` WHERE adminname = ? AND id != ?";
            $check_stmt = mysqli_prepare($conn, $check_sql);
            mysqli_stmt_bind_param($check_stmt, "si", $new_username, $id);
            mysqli_stmt_execute($check_stmt);
            $check_result = mysqli_stmt_get_result($check_stmt);
            
            if (mysqli_num_rows($check_result) > 0) {
                $error_message = "Admin name already exists. Please choose a different name.";
            } else {
                // Hash the password
                $hash = password_hash($new_password, PASSWORD_DEFAULT);
                
                // Update admin using prepared statement
                $update_sql = "UPDATE `admin_login` SET adminname = ?, adminpassword = ? WHERE id = ?";
                $update_stmt = mysqli_prepare($conn, $update_sql);
                mysqli_stmt_bind_param($update_stmt, "ssi", $new_username, $hash, $id);
                
                if (mysqli_stmt_execute($update_stmt)) {
                    $success_message = "Admin updated successfully!";
                    $Uname = $new_username; // Update display value
                    
                    // Redirect after successful update
                    echo "<script>
                        setTimeout(function() {
                            window.location.href = 'admin_add_admin.php';
                        }, 2000);
                    </script>";
                } else {
                    $error_message = "Failed to update admin. Please try again.";
                }
            }
        } catch (Exception $e) {
            $error_message = "An error occurred while updating admin.";
            error_log("Admin update error: " . $e->getMessage());
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../static/css/admin_op.css">
    <title>Update Admin</title>
</head>
<body>

<div class="user-management-container">
    <div class="add-user-form">
        <h3 class="form-title">Update Admin Information</h3>
        
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
                <label for="username" class="form-label">Admin Name:</label>
                <input type="text" 
                       placeholder="Enter admin name" 
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
            
            <button type="submit" name="submit" class="submit-btn">Update Admin</button>
        </form>
    </div>
</div>

<script src="../static/js/scripts.js"></script>
</body>
</html>