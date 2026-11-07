<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Center - e-Vaccination System</title>
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
        .help-card {
            border: none;
            border-radius: 12px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .help-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
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
            <h1 class="fw-bold display-6 mb-2">Help Center</h1>
            <p class="lead mx-auto mb-0" style="max-width: 600px; opacity: 0.9;">
                Need assistance with accounts, vaccination tracking, or hospital bookings? We're here to help.
            </p>
        </div>
    </section>

    <!-- Help Cards Section -->
    <div class="container my-5">
        <div class="row g-4 mb-5">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card help-card shadow-sm bg-white p-4 text-center h-100">
                    <div class="icon-wrapper mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px; background-color: #e6fcf5; color: #20c997;">
                        <i class="fas fa-user-plus fs-4"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Parent Account Setup</h5>
                    <p class="text-muted small leading-relaxed">
                        Learn how to register your parent profile, add your children's birth records, and manage personal information securely.
                    </p>
                    <div class="mt-auto">
                        <a href="register.php" class="fw-semibold text-decoration-none" style="color: #20c997;">Create Account <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card help-card shadow-sm bg-white p-4 text-center h-100">
                    <div class="icon-wrapper mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px; background-color: #e6fcf5; color: #20c997;">
                        <i class="fas fa-calendar-alt fs-4"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Appointment Scheduling</h5>
                    <p class="text-muted small leading-relaxed">
                        Find verified partner hospitals near you, select preferred dates, and track real-time approval status for vaccination appointments.
                    </p>
                    <div class="mt-auto">
                        <a href="faqs.php" class="fw-semibold text-decoration-none" style="color: #20c997;">View FAQs <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card help-card shadow-sm bg-white p-4 text-center h-100">
                    <div class="icon-wrapper mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px; background-color: #e6fcf5; color: #20c997;">
                        <i class="fas fa-headset fs-4"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Direct Administrator Support</h5>
                    <p class="text-muted small leading-relaxed">
                        Encountering technical issues or role-assignment queries? Submit an inquiry ticket directly to system management.
                    </p>
                    <div class="mt-auto">
                        <a href="admin_contact.php" class="fw-semibold text-decoration-none" style="color: #20c997;">Contact Support <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Callout Banner -->
        <div class="card border-0 rounded-4 p-4 p-md-5 bg-white shadow-sm">
            <div class="row align-items-center">
                <div class="col-md-8 text-center text-md-start mb-3 mb-md-0">
                    <h4 class="fw-bold text-dark mb-2">Still need help with your vaccination records?</h4>
                    <p class="text-muted mb-0">Our support team and hospital administrators are ready to assist you anytime.</p>
                </div>
                <div class="col-md-4 text-center text-md-end">
                    <a href="admin_contact.php" class="btn text-white fw-semibold px-4 py-2" style="background-color: #20c997;">Send Support Request</a>
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
