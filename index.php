<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-Vaccination Management System</title>
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
<body>

    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-white border-0">
    <div class="container">
        <!-- Brand / Logo -->
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <i class="fas fa-shield-alt text-primary fs-4 me-2" style="color: #20c997 !important;"></i> e-Vaccination
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Nav Links -->
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php#features">Features</a></li>
                <li class="nav-item"><a class="nav-link" href="hospital_info.php">Hospitals</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="faqs.php">FAQs</a></li>
            </ul>
            
            <!-- Auth Buttons -->
            <div class="d-flex align-items-center gap-2">
                <a href="login.php" class="btn btn-outline-success px-3" style="border-color: #20c997; color: #20c997;">Login</a>
                <a href="register.php" class="btn btn-success px-3" style="background-color: #20c997; border-color: #20c997;">Register</a>
            </div>
        </div>
    </div>
</nav>
    <!-- Hero Section -->
    <section class="hero-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Column: Text & CTA Buttons -->
                <div class="col-lg-6 hero-text pe-lg-4">
                    <h1>Protecting Little Futures with Smart Vaccination Management</h1>
                    <p class="text-muted">Ensure your children never miss a critical vaccine. Track schedules, book hospital appointments instantly, and manage digital records securely in one place.</p>
                    <div class="d-flex flex-wrap gap-3 mt-4">
                        <a href="register.php" class="btn btn-success btn-lg px-4" style="background-color: #20c997; border-color: #20c997;">Register Your Child Now</a>
                        <a href="hospital_info.php" class="btn btn-outline-secondary btn-lg px-4">Find Vaccination Center</a>
                    </div>
                </div>
                
                <!-- Right Column: Image -->
                <div class="col-lg-6 mt-5 mt-lg-0 text-center">
                    <div class="hero-image-wrapper">
                        <img src="herosection.jpg" alt="Vaccination consultation" class="hero-main-img img-fluid rounded shadow">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section with ID -->
    <div id="features" class="container py-4">
        <div class="row">
            <!-- Parent Portal Card -->
            <div class="col-md-4">
                <a href="parent_info.php" class="text-decoration-none">
                    <div class="card p-3 shadow-sm border-0 mb-3 hover-card">
                        <div class="d-flex align-items-center">
                            <div class="icon-box p-3 rounded me-3" style="background-color: #e6fcf5;">
                                <i class="fas fa-user text-success" style="color: #20c997 !important;"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1 text-dark">Parent Portal:</h6>
                                <small class="text-muted">Manage Schedule & Records</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Hospital Portal Card -->
            <div class="col-md-4">
                <a href="hospital_info.php" class="text-decoration-none">
                    <div class="card p-3 shadow-sm border-0 mb-3 hover-card">
                        <div class="d-flex align-items-center">
                            <div class="icon-box p-3 rounded me-3" style="background-color: #e6fcf5;">
                                <i class="fas fa-hospital text-success" style="color: #20c997 !important;"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1 text-dark">Hospital Portal:</h6>
                                <small class="text-muted">Manage Appointments & Status</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Admin Control Card -->
            <div class="col-md-4">
                <a href="admin_info.php" class="text-decoration-none">
                    <div class="card p-3 shadow-sm border-0 mb-3 hover-card">
                        <div class="d-flex align-items-center">
                            <div class="icon-box p-3 rounded me-3" style="background-color: #e6fcf5;">
                                <i class="fas fa-shield-alt text-success" style="color: #20c997 !important;"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1 text-dark">Admin Control:</h6>
                                <small class="text-muted">System Oversight & Reporting</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Modern & Professional Footer -->
    <footer class="bg-dark text-white pt-5 pb-4 mt-5 border-top border-secondary">
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
