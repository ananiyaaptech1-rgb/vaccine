<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - e-Vaccination Management System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css?v=2">
    <style>
        html {
            scroll-behavior: smooth;
        }
        .about-hero {
            background: linear-gradient(135deg, #20c997, #138496);
            color: white;
            padding: 70px 0;
        }
        .counter-card {
            border: none;
            border-radius: 12px;
            transition: transform 0.3s ease;
        }
        .counter-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
            <i class="fas fa-shield-alt text-primary fs-4 me-2" style="color: #20c997 !important;"></i> e-Vaccination
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
                    <li class="nav-item"><a class="nav-link active fw-semibold" style="color: #20c997 !important;" href="about.php">About Us</a></li>
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

    <!-- About Hero Section -->
    <section class="about-hero text-center">
        <div class="container">
            <h1 class="fw-bold display-5 mb-3">About e-Vaccination System</h1>
            <p class="lead mx-auto" style="max-width: 700px; opacity: 0.9;">
                Securing tomorrow's generation by bridging the gap between families and healthcare providers through smart digital immunization tracking.
            </p>
        </div>
    </section>

    <!-- Main Content Section -->
    <div class="container my-5">
        
        <!-- Mission & Purpose Row -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                    <h3 class="fw-bold mb-3" style="color: #20c997;"><i class="fas fa-bullseye me-2"></i>Our Core Purpose</h3>
                    <p class="text-muted leading-relaxed">
                        The <strong>e-Vaccination Management System</strong> was conceptualized to eradicate missed immunization schedules and streamline child healthcare records across hospitals. We empower parents with precise reminders and instant appointment booking tools.
                    </p>
                    <p class="text-muted leading-relaxed mb-0">
                        Our platform eliminates cumbersome paperwork, allowing hospitals and system administrators to manage vaccine supplies, patient queues, and digital immunization histories seamlessly in real-time.
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                    <h3 class="fw-bold mb-3 text-dark"><i class="fas fa-hands-helping me-2 text-warning"></i>Why Choose Us?</h3>
                    <ul class="list-unstyled text-muted mb-0">
                        <li class="mb-3 d-flex align-items-start gap-2">
                            <i class="fas fa-check-circle mt-1" style="color: #20c997;"></i>
                            <span><strong>Automated Tracking:</strong> Never lose track of your child's vaccine milestones from birth to 5 years.</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start gap-2">
                            <i class="fas fa-check-circle mt-1" style="color: #20c997;"></i>
                            <span><strong>Verified Network:</strong> Direct coordination with certified hospitals and pediatric vaccination clinics.</span>
                        </li>
                        <li class="d-flex align-items-start gap-2">
                            <i class="fas fa-check-circle mt-1" style="color: #20c997;"></i>
                            <span><strong>Secure Portal:</strong> Strict administrative controls and role-based data protection for complete privacy.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Impact Counter Section -->
        <div class="row text-center g-4 my-4">
            <div class="col-md-4">
                <div class="card counter-card p-4 shadow-sm bg-white border-top border-4" style="border-color: #20c997 !important;">
                    <div class="icon-box mb-3 fs-1" style="color: #20c997;">
                        <i class="fas fa-hospital"></i>
                    </div>
                    <h2 class="fw-bold text-dark display-6">25+</h2>
                    <p class="text-muted mb-0 fw-semibold">Partner Hospitals</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card counter-card p-4 shadow-sm bg-white border-top border-4" style="border-color: #0d6efd !important;">
                    <div class="icon-box mb-3 fs-1 text-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <h2 class="fw-bold text-dark display-6">1,200+</h2>
                    <p class="text-muted mb-0 fw-semibold">Registered Parents</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card counter-card p-4 shadow-sm bg-white border-top border-4" style="border-color: #ffc107 !important;">
                    <div class="icon-box mb-3 fs-1 text-warning">
                        <i class="fas fa-baby"></i>
                    </div>
                    <h2 class="fw-bold text-dark display-6">3,500+</h2>
                    <p class="text-muted mb-0 fw-semibold">Vaccines Administered</p>
                </div>
            </div>
        </div>

        <!-- Call to Action Banner -->
        <div class="card border-0 shadow-sm rounded-4 p-5 text-center text-white mt-5" style="background: linear-gradient(135deg, #20c997, #138496);">
            <h2 class="fw-bold mb-3">Ready to Secure Your Child's Health?</h2>
            <p class="lead mb-4 mx-auto" style="max-width: 600px; opacity: 0.9;">Join thousands of parents and verified hospitals managing immunizations digitally.</p>
            <div>
                <a href="register.php" class="btn btn-light btn-lg px-4 fw-bold me-2 shadow-sm" style="color: #20c997;">Register Now</a>
                <a href="admin_contact.php" class="btn btn-outline-light btn-lg px-4 fw-bold shadow-sm">Contact Admin</a>
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
