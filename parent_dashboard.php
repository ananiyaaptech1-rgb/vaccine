<?php
// Start session and include database connection
session_start();
include 'conn.php';

// Check if parent is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'parent') {
    header("Location: login.php");
    exit();
}

$parent_id = $_SESSION['user_id'];
$parent_name = $_SESSION['user_name'];
$success = "";
$error = "";

// Handle Add Child Form Submission
if (isset($_POST['add_child'])) {
    $child_name = mysqli_real_escape_string($conn, $_POST['child_name']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $grade = mysqli_real_escape_string($conn, $_POST['grade']);

    $insert_query = "INSERT INTO children (parent_id, child_name, age, gender, grade) VALUES ('$parent_id', '$child_name', '$age', '$gender', '$grade')";
    
    if (mysqli_query($conn, $insert_query)) {
        $success = "Child record added successfully!";
    } else {
        $error = "Failed to add child record. Please try again.";
    }
}

// Handle Update Child Form Submission
if (isset($_POST['update_child'])) {
    $child_id = mysqli_real_escape_string($conn, $_POST['child_id']);
    $child_name = mysqli_real_escape_string($conn, $_POST['child_name']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $grade = mysqli_real_escape_string($conn, $_POST['grade']);

    $update_query = "UPDATE children SET child_name='$child_name', age='$age', gender='$gender', grade='$grade' WHERE id='$child_id' AND parent_id='$parent_id'";
    
    if (mysqli_query($conn, $update_query)) {
        $success = "Child details updated successfully!";
    } else {
        $error = "Failed to update child details.";
    }
}

// Handle Delete Child Request
if (isset($_GET['delete_child'])) {
    $child_id = mysqli_real_escape_string($conn, $_GET['delete_child']);
    
    // Delete associated child record safely
    $delete_query = "DELETE FROM children WHERE id='$child_id' AND parent_id='$parent_id'";
    if (mysqli_query($conn, $delete_query)) {
        $success = "Child record deleted successfully!";
    } else {
        $error = "Failed to delete child record.";
    }
}

// Fetch children belonging to this parent
$children_query = mysqli_query($conn, "SELECT * FROM children WHERE parent_id = '$parent_id'");

// Fetch appointments booked by this parent along with child and hospital names
$appointments_query = mysqli_query($conn, "SELECT appointments.*, children.child_name, hospitals.hospital_name 
    FROM appointments 
    JOIN children ON appointments.child_id = children.id 
    JOIN hospitals ON appointments.hospital_id = hospitals.id 
    WHERE appointments.parent_id = '$parent_id'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Dashboard - e-Vaccination</title>
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

    <!-- Professional Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm bg-white">
        <div class="container py-2">
            <!-- Brand / Logo -->
            <a class="navbar-brand d-flex align-items-center fw-bold fs-4 text-dark" href="parent_dashboard.php">
                <div class="icon-wrapper text-white rounded-3 d-flex align-items-center justify-content-center me-2 shadow-sm" style="width: 40px; height: 40px; background-color: #20c997;">
                    <i class="fas fa-shield-alt"></i>
                </div>
                e-Vaccination <span class="badge ms-2 fs-6 fw-semibold px-2 py-1" style="background-color: #e6fcf5; color: #20c997; border: 1px solid #20c997;">Parent Portal</span>
            </a>
            
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Nav Links -->
                <ul class="navbar-nav mx-auto align-items-center">
                    <li class="nav-item"><a class="nav-link px-3 active fw-semibold" style="color: #20c997 !important;" href="parent_dashboard.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="hospitals.php">Hospitals & Booking</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="index.php">Home</a></li>
                </ul>
                
                <!-- User Info & Logout Button -->
                <div class="d-flex align-items-center gap-3 mt-3 mt-lg-0">
                    <span class="text-secondary fw-medium"><i class="fas fa-user-circle me-1" style="color: #20c997;"></i> Welcome, <?php echo htmlspecialchars($parent_name); ?></span>
                    <a href="logout.php" class="btn btn-outline-danger px-3 py-2 rounded-2 fw-semibold">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Dashboard Content -->
    <div class="container my-5" style="min-height: 70vh;">
        
        <?php if(!empty($success)): ?>
            <div class="alert alert-success rounded-3 shadow-sm"><?php echo $success; ?></div>
        <?php endif; ?>

        <?php if(!empty($error)): ?>
            <div class="alert alert-danger rounded-3 shadow-sm"><?php echo $error; ?></div>
        <?php endif; ?>

        <!-- Quick Action Banner for Hospital Booking -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card text-white border-0 rounded-4 p-4 shadow-sm" style="background: linear-gradient(135deg, #20c997, #138496);">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                        <div class="mb-3 mb-md-0">
                            <h3 class="fw-bold mb-1">Book Vaccine Appointments</h3>
                            <p class="mb-0 text-white-50">Explore registered hospitals and schedule timely vaccination slots for your children.</p>
                        </div>
                        <a href="hospitals.php" class="btn btn-light fw-bold px-4 py-3 rounded-3 shadow-sm" style="color: #20c997;">
                            <i class="fas fa-hospital me-2"></i> View Hospitals & Book
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Left Side: Add Child Form -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 rounded-4 p-4 bg-white">
                    <h4 class="fw-bold mb-4 text-dark"><i class="fas fa-child me-2" style="color: #20c997;"></i>Add New Child</h4>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Child's Name</label>
                            <input type="text" name="child_name" class="form-control" required placeholder="Enter child name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Age (Years/Months)</label>
                            <input type="number" name="age" class="form-control" required placeholder="Enter age">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Gender</label>
                            <select name="gender" class="form-select" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Grade / Class</label>
                            <input type="text" name="grade" class="form-control" required placeholder="e.g. Preschool / Grade 1">
                        </div>
                        <button type="submit" name="add_child" class="btn w-100 py-2 fw-bold text-white shadow-sm mt-2" style="background-color: #20c997;">Add Child</button>
                    </form>
                </div>
            </div>

            <!-- Right Side: Registered Children List -->
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded-4 p-4 bg-white">
                    <h4 class="fw-bold mb-4 text-dark"><i class="fas fa-users me-2" style="color: #20c997;"></i>My Registered Children</h4>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Grade</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (mysqli_num_rows($children_query) > 0): ?>
                                    <?php while ($row = mysqli_fetch_assoc($children_query)): ?>
                                        <tr>
                                            <td class="fw-semibold"><?php echo htmlspecialchars($row['child_name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['age']); ?></td>
                                            <td><?php echo htmlspecialchars($row['gender']); ?></td>
                                            <td><?php echo htmlspecialchars($row['grade']); ?></td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center gap-2">
                                                    <!-- Edit Button triggers Bootstrap Modal -->
                                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editChildModal<?php echo $row['id']; ?>">
                                                        <i class="fas fa-edit me-1"></i>Edit
                                                    </button>
                                                    
                                                    <!-- Delete Button -->
                                                    <a href="parent_dashboard.php?delete_child=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this child record?');">
                                                        <i class="fas fa-trash-alt me-1"></i>Delete
                                                    </a>
                                                </div>

                                                <!-- Edit Child Modal Popup -->
                                                <div class="modal fade text-start" id="editChildModal<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content rounded-4 border-0 shadow">
                                                            <div class="modal-header border-bottom-0">
                                                                <h5 class="modal-title fw-bold text-dark"><i class="fas fa-user-edit me-2" style="color: #20c997;"></i>Edit Child Details</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="" method="POST">
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="child_id" value="<?php echo $row['id']; ?>">
                                                                    
                                                                    <div class="mb-3">
                                                                        <label class="form-label fw-semibold">Child's Name</label>
                                                                        <input type="text" name="child_name" class="form-control" value="<?php echo htmlspecialchars($row['child_name']); ?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label fw-semibold">Age</label>
                                                                        <input type="number" name="age" class="form-control" value="<?php echo htmlspecialchars($row['age']); ?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label fw-semibold">Gender</label>
                                                                        <select name="gender" class="form-select" required>
                                                                            <option value="Male" <?php if($row['gender']=='Male') echo 'selected'; ?>>Male</option>
                                                                            <option value="Female" <?php if($row['gender']=='Female') echo 'selected'; ?>>Female</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label fw-semibold">Grade / Class</label>
                                                                        <input type="text" name="grade" class="form-control" value="<?php echo htmlspecialchars($row['grade']); ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer border-top-0">
                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit" name="update_child" class="btn text-white fw-bold" style="background-color: #20c997;">Save Changes</button>
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
                                        <td colspan="5" class="text-center text-muted py-4">No children registered yet.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Appointments History Section -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card shadow-sm border-0 rounded-4 p-4 bg-white">
                    <h4 class="fw-bold mb-4 text-dark"><i class="fas fa-calendar-check me-2" style="color: #20c997;"></i>My Booked Appointments</h4>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Child Name</th>
                                    <th>Hospital Name</th>
                                    <th>Vaccine Name</th>
                                    <th>Appointment Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (mysqli_num_rows($appointments_query) > 0): ?>
                                    <?php while ($app = mysqli_fetch_assoc($appointments_query)): ?>
                                        <tr>
                                            <td class="fw-semibold"><?php echo htmlspecialchars($app['child_name']); ?></td>
                                            <td><?php echo htmlspecialchars($app['hospital_name']); ?></td>
                                            <td><?php echo htmlspecialchars($app['vaccine_name']); ?></td>
                                            <td><i class="far fa-calendar-alt me-1 text-secondary"></i><?php echo htmlspecialchars($app['appointment_date']); ?></td>
                                            <td>
                                                <?php if ($app['status'] == 'Approved'): ?>
                                                    <span class="badge bg-success px-3 py-2">Approved</span>
                                                <?php elseif ($app['status'] == 'Rejected'): ?>
                                                    <span class="badge bg-danger px-3 py-2">Rejected</span>
                                                <?php else: ?>
                                                    <span class="badge bg-warning text-dark px-3 py-2">Pending</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">No appointments booked yet.</td>
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
