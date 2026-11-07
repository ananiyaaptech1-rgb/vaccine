<?php
// Start session and include database connection
session_start();
include 'conn.php';

// Check if hospital is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'hospital') {
    header("Location: login.php");
    exit();
}

$hospital_user_name = $_SESSION['user_name'];
$success = "";
$error = "";

// Find the corresponding hospital ID from the hospitals table using the hospital name
$h_query = mysqli_query($conn, "SELECT id FROM hospitals WHERE hospital_name = '$hospital_user_name'");
if ($h_row = mysqli_fetch_assoc($h_query)) {
    $hospital_id = $h_row['id'];
} else {
    $hospital_id = 0;
}

// Handle Status Update (Approve / Reject)
if (isset($_POST['update_status'])) {
    $appointment_id = mysqli_real_escape_string($conn, $_POST['appointment_id']);
    $new_status = mysqli_real_escape_string($conn, $_POST['status']);

    $update_query = "UPDATE appointments SET status = '$new_status' WHERE id = '$appointment_id' AND hospital_id = '$hospital_id'";
    if (mysqli_query($conn, $update_query)) {
        $success = "Appointment status updated successfully to $new_status!";
    } else {
        $error = "Failed to update status. Please try again.";
    }
}

// Fetch appointments for this specific hospital along with parent and child details
$appointments_query = mysqli_query($conn, "SELECT appointments.*, children.child_name, users.name AS parent_name, users.email AS parent_email 
    FROM appointments 
    JOIN children ON appointments.child_id = children.id 
    JOIN users ON appointments.parent_id = users.id 
    WHERE appointments.hospital_id = '$hospital_id' 
    ORDER BY appointments.appointment_date ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Dashboard - e-Vaccination</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="dashboard-body bg-light">

    <!--  Professional Standardized Navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm bg-white py-3">
    <div class="container">
        <!-- Brand Logo & Title -->
        <a class="navbar-brand d-flex align-items-center fw-bold fs-4 text-dark text-decoration-none" href="index.php">
            <div class="icon-wrapper text-white rounded-3 d-flex align-items-center justify-content-center me-2 shadow-sm" style="width: 40px; height: 40px; background-color: #20c997;">
                <i class="fas fa-shield-alt"></i>
            </div>
            e-Vaccination
        </a>
        
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Nav Links -->
            <ul class="navbar-nav mx-auto align-items-center">
                <li class="nav-item"><a class="nav-link px-3 text-dark" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link px-3 text-dark" href="about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link px-3 text-dark" href="faqs.php">FAQs</a></li>
                <li class="nav-item"><a class="nav-link px-3 text-dark" href="hospitals.php">Hospitals</a></li>
            </ul>
            
            <!-- Auth Buttons -->
            <div class="d-flex align-items-center gap-2">
                <a href="login.php" class="btn px-3 fw-semibold" style="color: #20c997; border: 1px solid #20c997;">Login</a>
                <a href="register.php" class="btn px-3 text-white fw-semibold shadow-sm" style="background-color: #20c997;">Register</a>
            </div>
        </div>
    </div>
</nav>

    <!-- Main Content -->
    <div class="container my-5" style="min-height: 70vh;">
        
        <?php if(!empty($success)): ?>
            <div class="alert alert-success rounded-3 shadow-sm"><?php echo $success; ?></div>
        <?php endif; ?>

        <?php if(!empty($error)): ?>
            <div class="alert alert-danger rounded-3 shadow-sm"><?php echo $error; ?></div>
        <?php endif; ?>

        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm border-0 rounded-4 p-4 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h4 class="fw-bold m-0 text-dark">
                            <i class="fas fa-calendar-check me-2" style="color: #20c997;"></i>Manage Patient Appointments
                        </h4>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Parent Name</th>
                                    <th>Child Name</th>
                                    <th>Vaccine Name</th>
                                    <th>Appointment Date</th>
                                    <th>Current Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (mysqli_num_rows($appointments_query) > 0): ?>
                                    <?php while ($row = mysqli_fetch_assoc($appointments_query)): ?>
                                        <tr>
                                            <td class="fw-semibold">
                                                <?php echo htmlspecialchars($row['parent_name']); ?><br>
                                                <small class="text-muted"><?php echo htmlspecialchars($row['parent_email']); ?></small>
                                            </td>
                                            <td><?php echo htmlspecialchars($row['child_name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['vaccine_name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['appointment_date']); ?></td>
                                            <td>
                                                <?php if ($row['status'] == 'Approved'): ?>
                                                    <span class="badge bg-success px-3 py-2">Approved</span>
                                                <?php elseif ($row['status'] == 'Rejected'): ?>
                                                    <span class="badge bg-danger px-3 py-2">Rejected</span>
                                                <?php else: ?>
                                                    <span class="badge bg-warning text-dark px-3 py-2">Pending</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <form action="" method="POST" class="d-flex gap-2">
                                                    <input type="hidden" name="appointment_id" value="<?php echo $row['id']; ?>">
                                                    <select name="status" class="form-select form-select-sm" style="width: 120px;" required>
                                                        <option value="Pending" <?php if($row['status']=='Pending') echo 'selected'; ?>>Pending</option>
                                                        <option value="Approved" <?php if($row['status']=='Approved') echo 'selected'; ?>>Approved</option>
                                                        <option value="Rejected" <?php if($row['status']=='Rejected') echo 'selected'; ?>>Rejected</option>
                                                    </select>
                                                    <button type="submit" name="update_status" class="btn btn-sm text-white fw-semibold" style="background-color: #20c997;">Update</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">No appointment requests found for this hospital.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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