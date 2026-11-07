<?php
// Start session and include database connection
session_start();
include 'conn.php';

$error = "";

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $selected_role = $_POST['role']; // Get role from dropdown

    // Check if user exists in the database with the selected role
    $query = "SELECT * FROM users WHERE email = '$email' AND role = '$selected_role'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        
        // Verify password
        if ($password == $user['password']) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            // Redirect based on user role
            if ($user['role'] == 'parent') {
                header("Location: parent_dashboard.php");
                exit();
            } elseif ($user['role'] == 'hospital') {
                header("Location: hospital_dashboard.php");
                exit();
            } elseif ($user['role'] == 'admin') {
                header("Location: admin_dashboard.php");
                exit();
            } else {
                $error = "Invalid user role assigned.";
            }

        } else {
            $error = "Invalid password, please try again.";
        }
    } else {
        $error = "No account found with this email for the selected role.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - e-Vaccination</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-white shadow-sm">
        <div class="container">
            <!-- Brand / Logo -->
            <a class="navbar-brand d-flex align-items-center fw-bold" href="index.php">
                <i class="fas fa-shield-alt fs-4 me-2" style="color: #20c997 !important;"></i> e-Vaccination
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Nav Links -->
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="hospital_info.php">Hospitals</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="faqs.php">FAQs</a></li>
                </ul>
                
                <!-- Auth Buttons -->
                <div class="d-flex align-items-center gap-2">
                    <a href="login.php" class="btn px-3 fw-semibold active" style="color: #20c997; border: 1px solid #20c997;">Login</a>
                    <a href="register.php" class="btn px-3 text-white fw-semibold" style="background-color: #20c997;">Register</a>
                </div>

            </div>
        </div>
    </nav>

    <!-- Main Login Section -->
    <div class="container-fluid p-0">
        <div class="row g-0 split-container align-items-center">
            
            <!-- Left Side: Login Form with Dropdown -->
            <div class="col-lg-6 d-flex justify-content-center align-items-center py-5">
                <div class="col-md-8 col-lg-7 px-4">
                    <div class="card shadow-sm border-0 rounded-4 p-4 bg-white">
                        <h3 class="text-center fw-bold mb-4 text-dark">Portal Login</h3>

                        <?php if(!empty($error)): ?>
                            <div class="alert alert-danger rounded-3 small shadow-sm"><?php echo $error; ?></div>
                        <?php endif; ?>

                        <form action="" method="POST">
                            <!-- Role Dropdown -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Login As</label>
                                <select name="role" class="form-select" required>
                                    <option value="" selected disabled>Select your role...</option>
                                    <option value="parent">Parent</option>
                                    <option value="hospital">Hospital Representative</option>
                                    <option value="admin">System Administrator</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email Address</label>
                                <input type="email" name="email" class="form-control" required placeholder="name@example.com">
                            </div>
                            
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label class="form-label fw-semibold mb-0">Password</label>
                                    <div class="d-flex gap-2">
                                        <a href="forget_password.php" class="text-decoration-none small fw-semibold" style="color: #20c997;">Forgot Password?</a>
                                        <span class="text-muted">|</span>
                                        <a href="check_status.php" class="text-decoration-none small fw-semibold" style="color: #20c997;">Check Status</a>
                                    </div>
                                </div>
                                <input type="password" name="password" class="form-control" required placeholder="******">
                            </div>

                            <button type="submit" name="login" class="btn w-100 py-2 fw-bold text-white shadow-sm mt-2" style="background-color: #20c997;">Login to Portal</button>
                        </form>

                        <div class="text-center mt-3">
                            <small class="text-muted">Don't have a parent account? <a href="register.php" style="color: #20c997;" class="fw-semibold">Register here</a></small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Image -->
            <div class="col-lg-6 d-none d-lg-block p-0">
                <img src="login1.jpeg" alt="Login Illustration" class="w-100 vh-100" style="object-fit: cover;">
            </div>

        </div>
    </div>

    <!-- Modern & Professional Footer -->
    <footer class="bg-dark text-white pt-5 pb-4 border-top border-secondary">
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
