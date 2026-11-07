<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms & Conditions - e-Vaccination System</title>
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
        .page-hero {
            background: linear-gradient(135deg, #20c997, #138496);
            color: white;
            padding: 50px 0;
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
                    <a href="register.php" class="btn px-3 text-white fw-semibold" style="background-color: #20c997;">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Header Banner -->
    <section class="page-hero text-center">
        <div class="container">
            <h1 class="fw-bold display-6 mb-2">Terms & Conditions</h1>
            <p class="lead mx-auto mb-0" style="max-width: 600px; opacity: 0.9;">
                Guidelines and rules for using the e-Vaccination management portal.
            </p>
        </div>
    </section>

    <!-- Content Section -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                    
                    <div class="mb-4">
                        <h4 class="fw-bold text-dark"><i class="fas fa-file-contract me-2" style="color: #20c997;"></i>1. Acceptance of Terms</h4>
                        <p class="text-muted leading-relaxed">
                            By accessing and using the e-Vaccination Management System, you agree to comply with and be bound by these Terms & Conditions. If you do not agree with any part of these terms, please refrain from using the platform.
                        </p>
                    </div>

                    <hr class="my-4 text-secondary opacity-25">

                    <div class="mb-4">
                        <h4 class="fw-bold text-dark"><i class="fas fa-user-check me-2" style="color: #20c997;"></i>2. User Accounts & Responsibilities</h4>
                        <p class="text-muted leading-relaxed">
                            Users (Parents, Hospital Representatives, and Administrators) are responsible for maintaining the confidentiality of their login credentials. Any appointment activity or record modification conducted under your account will be attributed to you.
                        </p>
                    </div>

                    <hr class="my-4 text-secondary opacity-25">

                    <div class="mb-4">
                        <h4 class="fw-bold text-dark"><i class="fas fa-hospital-symbol me-2" style="color: #20c997;"></i>3. Appointments & Vaccination Schedules</h4>
                        <p class="text-muted leading-relaxed">
                            Appointment requests submitted through the portal are subject to confirmation and review by the respective verified partner hospitals. The system acts as a scheduling and tracking facilitator to ensure timely immunizations.
                        </p>
                    </div>

                    <hr class="my-4 text-secondary opacity-25">

                    <div>
                        <h4 class="fw-bold text-dark"><i class="fas fa-gavel me-2" style="color: #20c997;"></i>4. Policy Modifications</h4>
                        <p class="text-muted leading-relaxed mb-0">
                            The system administrators reserve the right to update or modify these terms at any time. Continued use of the platform following any adjustments constitutes acceptance of the updated terms.
                        </p>
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
                
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
