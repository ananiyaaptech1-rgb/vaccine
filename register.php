<?php
// Include database connection
include 'conn.php';

$error = "";
$success = "";

if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password']; 
    $role = 'parent'; // Fixed role as per requirements

    // Check if email already exists in the database
    $check_email = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($check_email) > 0) {
        $error = "This email is already registered!";
    } else {
        // Insert user data into the database
        $query = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
        if (mysqli_query($conn, $query)) {
            $success = "Registration successful! You can now <a href='login.php' class='fw-bold' style='color: #20c997;'>Login</a>.";
        } else {
            $error = "Something went wrong, please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Registration - e-Vaccination</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Separate External CSS File -->
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
                    <a href="login.php" class="btn px-3 fw-semibold" style="color: #20c997; border: 1px solid #20c997;">Login</a>
                    <a href="register.php" class="btn px-3 text-white fw-semibold active" style="background-color: #20c997;">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Registration Section -->
    <div class="container-fluid p-0">
        <div class="row g-0 split-container align-items-center">
            
            <!-- Left Side: Registration Form -->
            <div class="col-lg-6 d-flex justify-content-center align-items-center py-5">
                <div class="col-md-8 col-lg-7 px-4">
                    <div class="card shadow-sm border-0 rounded-4 p-4 bg-white">
                        <h3 class="text-center fw-bold mb-4 text-dark">Parent Register</h3>

                        <?php if(!empty($error)): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>

                        <?php if(!empty($success)): ?>
                            <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php endif; ?>

                        <form action="" method="POST">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Full Name</label>
                                <input type="text" name="name" class="form-control" required placeholder="Enter your full name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email Address</label>
                                <input type="email" name="email" class="form-control" required placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Password</label>
                                <input type="password" name="password" class="form-control" required placeholder="******">
                            </div>
                            <!-- Role is hidden and fixed as parent -->
                            <input type="hidden" name="role" value="parent">

                            <button type="submit" name="register" class="btn w-100 py-2 fw-bold text-white shadow-sm" style="background-color: #20c997;">Register Account</button>
                        </form>
                        <div class="text-center mt-3">
                            <small class="text-muted">Already have an account? <a href="login.php" style="color: #20c997;" class="fw-semibold">Login here</a></small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Image -->
            <div class="col-lg-6 d-none d-lg-block p-0">
                <img src="register1.jpg" alt="Register Illustration" class="w-100 vh-100" style="object-fit: cover;">
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
                <div class="col-md-7 col-lg-8 text-center text-md-start">
                    <p class="small mb-0 text-white-50">
                        &copy; 2026 <strong>e-Vaccination Management System</strong>. Developed as Aptech eProject.
                    </p>
                </div>
                <div class="col-md-5 col-lg-4 text-center text-md-end mt-2 mt-md-0">
                    <span class="badge px-3 py-2 rounded-pill" style="background-color: #20c997; color: #fff;">v2.0 Active</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
