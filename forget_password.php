<?php
session_start();
include 'conn.php';

$success = "";
$error = "";

if (isset($_POST['submit_reset'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    // Check if user exists
    $check_user = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND role = '$role'");
    
    if (mysqli_num_rows($check_user) > 0) {
        $insert_req = "INSERT INTO password_resets (email, role, status) VALUES ('$email', '$role', 'Pending')";
        if (mysqli_query($conn, $insert_req)) {
            $success = "Password reset request sent to Admin successfully! Please contact support or wait for admin approval.";
        } else {
            $error = "Failed to submit request. Please try again.";
        }
    } else {
        $error = "No registered account found with this email and role.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password - e-Vaccination</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">

    <div class="container" style="max-width: 480px;">
        <div class="card shadow-lg border-0 rounded-4 p-4 p-md-5 bg-white">
            <div class="text-center mb-4">
                <div class="icon-wrapper text-white rounded-3 d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" style="width: 50px; height: 50px; background-color: #20c997;">
                    <i class="fas fa-key fs-4"></i>
                </div>
                <h4 class="fw-bold text-dark mb-1">Reset Password</h4>
                <p class="text-muted small">Enter your registered email to request password assistance from Admin</p>
            </div>

            <?php if(!empty($success)): ?>
                <div class="alert alert-success rounded-3 small shadow-sm"><?php echo $success; ?></div>
            <?php endif; ?>

            <?php if(!empty($error)): ?>
                <div class="alert alert-danger rounded-3 small shadow-sm"><?php echo $error; ?></div>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Select Account Role</label>
                    <select name="role" class="form-select" required>
                        <option value="parent">Parent</option>
                        <option value="hospital">Hospital</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Registered Email</label>
                    <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                </div>

                <button type="submit" name="submit_reset" class="btn text-white w-100 py-2 fw-bold shadow-sm" style="background-color: #20c997;">
                    Send Request to Admin
                </button>
            </form>

            <div class="text-center mt-4">
                <a href="login.php" class="text-decoration-none small fw-semibold" style="color: #20c997;">
                    <i class="fas fa-arrow-left me-1"></i> Back to Login
                </a>
            </div>
        </div>
    </div>

</body>
</html>