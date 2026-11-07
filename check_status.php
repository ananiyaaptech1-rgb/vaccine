<?php
session_start();
include 'conn.php';

$reset_info = null;
$error = "";

if (isset($_POST['check_status'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $role  = mysqli_real_escape_string($conn, $_POST['role']);

    // Fetch latest request for this email and role
    $query = mysqli_query($conn, "SELECT * FROM password_resets WHERE email = '$email' AND role = '$role' ORDER BY id DESC LIMIT 1");
    
    if ($query && mysqli_num_rows($query) > 0) {
        $reset_info = mysqli_fetch_assoc($query);
    } else {
        $error = "No password reset request found for this email and role.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Password Reset Status - e-Vaccination</title>
    <!-- Bootstrap 5 CSS & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #f8fafc !important;
            min-height: 100vh;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center py-5">

    <div class="container" style="max-width: 480px;">
        <div class="card shadow-lg border-0 rounded-4 p-4 p-md-5 bg-white">
            <div class="text-center mb-4">
                <div class="icon-wrapper text-white rounded-3 d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" style="width: 50px; height: 50px; background-color: #20c997;">
                    <i class="fas fa-search-location fs-4"></i>
                </div>
                <h4 class="fw-bold text-dark mb-1">Check Reset Status</h4>
                <p class="text-muted small">Enter your email to view your password reset progress</p>
            </div>

            <?php if(!empty($error)): ?>
                <div class="alert alert-danger rounded-3 small shadow-sm"><?php echo $error; ?></div>
            <?php endif; ?>

            <?php if($reset_info): ?>
                <?php if($reset_info['status'] == 'Processed'): ?>
                    <div class="alert alert-success rounded-3 shadow-sm p-3 mb-4">
                        <div class="d-flex align-items-center mb-1">
                            <i class="fas fa-check-circle fs-5 me-2"></i>
                            <h6 class="fw-bold mb-0">Request Approved!</h6>
                        </div>
                        <p class="small mb-2">Admin has processed your request. Your new temporary password is:</p>
                        <div class="bg-white border rounded p-2 text-center fw-bold fs-5 text-dark shadow-sm">
                            <?php echo htmlspecialchars($reset_info['new_password']); ?>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning text-dark rounded-3 shadow-sm p-3 mb-4">
                        <div class="d-flex align-items-center mb-1">
                            <i class="fas fa-clock fs-5 me-2"></i>
                            <h6 class="fw-bold mb-0">Status: Pending</h6>
                        </div>
                        <p class="small mb-0">Your request has been received by the Admin and is currently pending review. Please check back shortly.</p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Select Account Role</label>
                    <select name="role" class="form-select" required>
                        <option value="" selected disabled>Select your role...</option>
                        <option value="parent">Parent</option>
                        <option value="hospital">Hospital</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Registered Email</label>
                    <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                </div>

                <button type="submit" name="check_status" class="btn text-white w-100 py-2 fw-bold shadow-sm" style="background-color: #20c997;">
                    Check Status
                </button>
            </form>

            <div class="text-center mt-4 d-flex justify-content-between">
                <a href="forget_password.php" class="text-decoration-none small fw-semibold" style="color: #20c997;">
                    <i class="fas fa-paper-plane me-1"></i> Send Request
                </a>
                <a href="login.php" class="text-decoration-none small fw-semibold" style="color: #20c997;">
                    <i class="fas fa-sign-in-alt me-1"></i> Back to Login
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>