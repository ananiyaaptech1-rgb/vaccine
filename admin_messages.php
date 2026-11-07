<?php
// Start session and include database connection
session_start();
include 'conn.php';

// Check if admin is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

$admin_name = $_SESSION['user_name'];
$success = "";
$error = "";

// Delete Support Message Action
if (isset($_GET['delete_id'])) {
    $del_id = intval($_GET['delete_id']);
    if (mysqli_query($conn, "DELETE FROM admin_messages WHERE id = $del_id")) {
        $success = "Support message deleted successfully!";
    } else {
        $error = "Failed to delete support message.";
    }
}

// Delete Password Reset Request Action
if (isset($_GET['delete_reset_id'])) {
    $del_reset_id = intval($_GET['delete_reset_id']);
    if (mysqli_query($conn, "DELETE FROM password_resets WHERE id = $del_reset_id")) {
        $success = "Password reset request deleted successfully!";
    } else {
        $error = "Failed to delete password reset request.";
    }
}

// Handle Update Password Action by Admin
if (isset($_POST['update_user_password'])) {
    $reset_req_id = intval($_POST['reset_request_id']);
    $user_email   = mysqli_real_escape_string($conn, $_POST['user_email']);
    $user_role    = mysqli_real_escape_string($conn, $_POST['user_role']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);

    // 1. Update password and set notice flag in users table
    $update_user_query = "UPDATE users SET password = '$new_password', password_updated_notice = 1 WHERE email = '$user_email' AND role = '$user_role'";
    
    if (mysqli_query($conn, $update_user_query)) {
        // 2. Mark request as Processed AND save the new password in password_resets table
        mysqli_query($conn, "UPDATE password_resets SET status = 'Processed', new_password = '$new_password' WHERE id = $reset_req_id");
        $success = "Password for $user_email updated successfully to '$new_password'!";
    } else {
        $error = "Failed to update user password. Please try again.";
    }
}

// Fetch all support messages
$all_messages = mysqli_query($conn, "SELECT * FROM admin_messages ORDER BY id DESC");

// Fetch password reset requests
$all_resets = mysqli_query($conn, "SELECT * FROM password_resets ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Messages & Reset Requests - Admin Portal</title>
    <!-- Bootstrap 5 CSS & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #f8fafc !important;
            min-height: 100vh;
        }
        .custom-navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top custom-navbar px-4 py-3 bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center fw-bold fs-4 text-dark" href="admin_dashboard.php">
                <div class="icon-wrapper text-white rounded-3 d-flex align-items-center justify-content-center me-2 shadow-sm" style="width: 40px; height: 40px; background-color: #20c997;">
                    <i class="fas fa-user-shield"></i>
                </div>
                e-Vaccination <span class="badge ms-2 fs-6 fw-semibold px-2 py-1" style="background-color: #e6fcf5; color: #20c997; border: 1px solid #20c997;">Admin Portal</span>
            </a>
            
            <div class="d-flex align-items-center ms-auto gap-3">
                <a href="admin_dashboard.php" class="btn btn-outline-secondary btn-sm px-3 fw-semibold"><i class="fas fa-arrow-left me-1"></i> Back to Dashboard</a>
                <span class="fw-semibold text-secondary small d-none d-md-inline">Admin: <?php echo htmlspecialchars($admin_name); ?></span>
                <a href="logout.php" class="btn btn-danger btn-sm px-3 rounded-2 fw-semibold shadow-sm text-white">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container my-5">

        <?php if(!empty($success)): ?>
            <div class="alert alert-success rounded-3 alert-dismissible fade show shadow-sm"><?php echo $success; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
        <?php endif; ?>

        <?php if(!empty($error)): ?>
            <div class="alert alert-danger rounded-3 alert-dismissible fade show shadow-sm"><?php echo $error; ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
        <?php endif; ?>

        <!-- SECTION 1: Password Reset Requests Card -->
        <div class="card shadow-sm border-0 rounded-4 p-4 bg-white mb-5">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="fw-bold text-dark mb-0">
                    <i class="fas fa-key me-2" style="color: #20c997;"></i>Password Reset Requests
                </h4>
                <span class="badge px-3 py-2 fs-6" style="background-color: #20c997; color: #fff;">
                    <?php echo ($all_resets) ? mysqli_num_rows($all_resets) : 0; ?> Requests
                </span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Requested Email</th>
                            <th>Role</th>
                            <th>Request Date</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($all_resets && mysqli_num_rows($all_resets) > 0): ?>
                            <?php while ($reset = mysqli_fetch_assoc($all_resets)): ?>
                                <tr>
                                    <td class="fw-semibold"><?php echo htmlspecialchars($reset['email']); ?></td>
                                    <td>
                                        <span class="badge bg-secondary px-3 py-2"><?php echo ucfirst(htmlspecialchars($reset['role'])); ?></span>
                                    </td>
                                    <td class="text-muted small">
                                        <?php echo isset($reset['request_date']) ? date('M d, Y - h:i A', strtotime($reset['request_date'])) : 'Recent'; ?>
                                    </td>
                                    <td>
                                        <?php if ($reset['status'] == 'Processed'): ?>
                                            <span class="badge bg-success px-3 py-2">Processed</span>
                                        <?php else: ?>
                                            <span class="badge bg-warning text-dark px-3 py-2">Pending</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-end">
                                        <?php if ($reset['status'] != 'Processed'): ?>
                                            <button type="button" class="btn btn-sm text-white me-1 fw-semibold" style="background-color: #20c997;" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#resetModal<?php echo $reset['id']; ?>">
                                                <i class="fas fa-edit me-1"></i>Reset Password
                                            </button>
                                        <?php else: ?>
                                            <span class="text-muted small me-2">Completed</span>
                                        <?php endif; ?>

                                        <a href="admin_messages.php?delete_reset_id=<?php echo $reset['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this reset request?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>

                                        <!-- Password Reset Modal -->
                                        <div class="modal fade text-start" id="resetModal<?php echo $reset['id']; ?>" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content rounded-4 border-0 shadow">
                                                    <div class="modal-header border-0 pb-0">
                                                        <h5 class="modal-title fw-bold text-dark">
                                                            <i class="fas fa-unlock-alt me-2" style="color: #20c997;"></i>Reset Password for User
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form action="" method="POST">
                                                        <div class="modal-body py-3">
                                                            <input type="hidden" name="reset_request_id" value="<?php echo $reset['id']; ?>">
                                                            <input type="hidden" name="user_email" value="<?php echo htmlspecialchars($reset['email']); ?>">
                                                            <input type="hidden" name="user_role" value="<?php echo htmlspecialchars($reset['role']); ?>">

                                                            <div class="mb-3">
                                                                <label class="form-label fw-semibold">Target User Email</label>
                                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($reset['email']); ?>" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label fw-semibold">Account Role</label>
                                                                <input type="text" class="form-control text-capitalize" value="<?php echo htmlspecialchars($reset['role']); ?>" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label fw-semibold">Enter New Password</label>
                                                                <input type="text" name="new_password" class="form-control" placeholder="Enter new password (e.g. 123456)" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer border-0 pt-0">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" name="update_user_password" class="btn text-white fw-bold" style="background-color: #20c997;">
                                                                Update Password
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">No password reset requests received yet.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- SECTION 2: General Support Messages Table Card -->
        <div class="card shadow-sm border-0 rounded-4 p-4 bg-white">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="fw-bold text-dark mb-0">
                    <i class="fas fa-envelope-open-text me-2" style="color: #20c997;"></i>Received Inquiries & Support Messages
                </h4>
                <span class="badge bg-secondary fs-6">
                    <?php echo ($all_messages) ? mysqli_num_rows($all_messages) : 0; ?> Messages
                </span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Sender Name</th>
                            <th>Email Address</th>
                            <th>Role / Type</th>
                            <th>Message</th>
                            <th>Received At</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($all_messages && mysqli_num_rows($all_messages) > 0): ?>
                            <?php while ($msg = mysqli_fetch_assoc($all_messages)): ?>
                                <tr>
                                    <td class="fw-semibold"><?php echo htmlspecialchars($msg['sender_name']); ?></td>
                                    <td><a href="mailto:<?php echo htmlspecialchars($msg['sender_email']); ?>" class="text-decoration-none" style="color: #20c997;"><?php echo htmlspecialchars($msg['sender_email']); ?></a></td>
                                    <td>
                                        <?php if ($msg['sender_role'] == 'Parent'): ?>
                                            <span class="badge bg-info text-dark px-3 py-2">Parent</span>
                                        <?php elseif ($msg['sender_role'] == 'Hospital'): ?>
                                            <span class="badge bg-success px-3 py-2">Hospital</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary px-3 py-2">Visitor</span>
                                        <?php endif; ?>
                                    </td>
                                    <td style="max-width: 300px;"><?php echo nl2br(htmlspecialchars($msg['sender_message'])); ?></td>
                                    <td class="text-muted small"><?php echo date('M d, Y - h:i A', strtotime($msg['created_at'])); ?></td>
                                    <td class="text-end">
                                        <a href="admin_messages.php?delete_id=<?php echo $msg['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this message?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No support messages received yet.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Modern & Professional Footer -->
    <footer class="bg-dark text-white pt-5 pb-4 border-top border-secondary mt-5">
        <div class="container text-center text-md-start">
            <div class="row text-center text-md-start">
                
                <!-- Column 1: Project Info & Social Links -->
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold" style="color: #20c997;">
                        <i class="fas fa-shield-alt me-2"></i>e-Vaccination
                    </h5>
                    <p class="text-white-50 small mb-3">
                        A Web-Based Child Immunization and Appointment Management Solution designed to streamline child vaccination records and hospital appointments seamlessly.
                    </p>

                    <!-- Social Media Links -->
                    <div class="d-flex align-items-center gap-2 mb-3 justify-content-center justify-content-md-start">
                        <a href="https://facebook.com" target="_blank" class="btn btn-sm btn-outline-light rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; border-color: rgba(255,255,255,0.2);">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://instagram.com" target="_blank" class="btn btn-sm btn-outline-light rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; border-color: rgba(255,255,255,0.2);">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://linkedin.com" target="_blank" class="btn btn-sm btn-outline-light rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; border-color: rgba(255,255,255,0.2);">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://wa.me/" target="_blank" class="btn btn-sm btn-outline-light rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; border-color: rgba(255,255,255,0.2);">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Quick Links -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold text-warning">Quick Links</h6>
                    <p class="mb-2"><a href="index.php" class="text-white text-decoration-none small"><i class="fas fa-angle-right me-2" style="color: #20c997;"></i>Home</a></p>
                    <p class="mb-2"><a href="admin_info.php" class="text-white text-decoration-none small"><i class="fas fa-angle-right me-2" style="color: #20c997;"></i>Admin Info</a></p>
                    <p class="mb-2"><a href="admin_contact.php" class="text-white text-decoration-none small"><i class="fas fa-angle-right me-2" style="color: #20c997;"></i>Contact Admin</a></p>
                    <p class="mb-2"><a href="about.php" class="text-white text-decoration-none small"><i class="fas fa-angle-right me-2" style="color: #20c997;"></i>About Us</a></p>
                    <p class="mb-2"><a href="faqs.php" class="text-white text-decoration-none small"><i class="fas fa-angle-right me-2" style="color: #20c997;"></i>FAQs</a></p>
                </div>

                <!-- Column 3: Project Support -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold text-warning">Project Support</h6>
                    <p class="small text-white-50 mb-2"><i class="fas fa-university me-2" style="color: #20c997;"></i>Aptech North Karachi</p>
                    <p class="small text-white-50 mb-2"><i class="fas fa-users me-2" style="color: #20c997;"></i>Batch: 2601F1</p>
                    <p class="small text-white-50 mb-2">
                        <i class="fas fa-headset me-2" style="color: #20c997;"></i>
                        <a href="admin_contact.php" class="text-decoration-none fw-semibold" style="color: #20c997;">Send Inquiry to Admin</a>
                    </p>
                </div>

            </div>

            <hr class="my-4 border-secondary">

            <!-- Bottom Copyright Row -->
            <div class="row align-items-center">
                <div class="col-lg-9 col-md-8 text-center text-md-start">
                    <div class="d-md-flex align-items-center flex-wrap gap-3">
                        <p class="small mb-0 text-white-50">
                            &copy; 2026 <strong>e-Vaccination Management System</strong>. Developed as Aptech eProject.
                        </p>
                        <span class="text-white-50 d-none d-md-inline">|</span>
                        <div class="d-inline-flex gap-3 small mt-2 mt-md-0">
                            <a href="privacy.php" class="text-white-50 text-decoration-none">Privacy Policy</a>
                            <a href="terms.php" class="text-white-50 text-decoration-none">Terms & Conditions</a>
                            <a href="help.php" class="text-white-50 text-decoration-none">Help Center</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 text-center text-md-end mt-2 mt-md-0">
                    <span class="badge px-3 py-2 rounded-pill" style="background-color: #20c997; color: #fff;">v2.0 Active</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
