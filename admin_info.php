<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Information & Overview - e-Vaccination System</title>
    <!-- Bootstrap 5 CSS & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #ffffff;
            color: #212529;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
        }
        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #f0f0f0;
            padding: 15px 0;
        }
        .navbar-brand {
            font-weight: 700;
            color: #212529 !important;
        }
        .nav-link {
            color: #495057 !important;
            font-weight: 500;
            margin: 0 10px;
        }
        .nav-link:hover, .nav-link.active {
            color: #20c997 !important;
        }
        .btn-teal {
            background-color: #20c997;
            color: #ffffff;
            font-weight: 500;
            border-radius: 6px;
            padding: 8px 20px;
            border: none;
        }
        .btn-teal:hover {
            background-color: #1ba87e;
            color: #ffffff;
        }
        .hero-section {
            padding: 60px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e6fcf5 100%);
            border-bottom: 1px solid #f0f0f0;
        }
        .card-custom {
            border: 1px solid #f0f0f0;
            border-radius: 12px;
            background: #ffffff;
            transition: all 0.3s ease;
        }
        .card-custom:hover {
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transform: translateY(-3px);
        }
        .icon-box {
            width: 60px;
            height: 60px;
            background-color: #e6fcf5;
            color: #20c997;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <div class="text-white rounded p-1 me-2 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; background: linear-gradient(135deg, #20c997, #0d6efd);">
                    <i class="fas fa-shield-alt fa-sm"></i>
                </div>
                e-Vaccination
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="parent_info.php">Parent Portal</a></li>
                    <li class="nav-item"><a class="nav-link" href="hospital_info.php">Hospital Portal</a></li>
                    <li class="nav-item"><a class="nav-link active" href="admin_info.php">Admin Info</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                    <a href="login.php" class="btn btn-teal">Admin Login</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1 rounded-pill mb-3 fw-bold">System Administration</span>
                    <h1 class="display-5 fw-bold text-dark mb-3">
                        Centralized Control & Network Governance
                    </h1>
                    <p class="text-muted lead mb-4">
                        The System Administrator plays the core role in maintaining security, verifying hospital partnerships, and supervising child immunization schedules across the entire network.
                    </p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="login.php" class="btn btn-teal btn-lg shadow-sm">Admin Dashboard Login</a>
                        <a href="admin_contact.php" class="btn btn-outline-secondary btn-lg px-4">Contact Admin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Admin Responsibilities Section -->
    <div class="container my-5 py-3">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark">Key Administrative Responsibilities</h2>
            <p class="text-muted">How the admin ensures smooth and secure operations of the e-Vaccination system.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card-custom p-4 h-100">
                    <div class="icon-box"><i class="fas fa-hospital-user"></i></div>
                    <h4 class="fw-bold text-dark mb-2">Hospital Approvals</h4>
                    <p class="text-muted small mb-0">Reviewing incoming partnership requests from clinics and hospitals, verifying credentials, and issuing secure automated login accounts.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom p-4 h-100">
                    <div class="icon-box"><i class="fas fa-shield-alt"></i></div>
                    <h4 class="fw-bold text-dark mb-2">Data Security & Privacy</h4>
                    <p class="text-muted small mb-0">Ensuring all registered parents, infant medical profiles, and appointment records are securely stored and protected against unauthorized access.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom p-4 h-100">
                    <div class="icon-box"><i class="fas fa-chart-line"></i></div>
                    <h4 class="fw-bold text-dark mb-2">System Monitoring</h4>
                    <p class="text-muted small mb-0">Tracking system-wide appointment statistics, monitoring vaccine distribution centers, and overseeing overall network performance.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer / Support Banner -->
    <div class="container mb-5">
        <div class="p-4 bg-light rounded-4 border text-center">
            <h4 class="fw-bold text-dark mb-2">Need Direct Assistance from Admin?</h4>
            <p class="text-muted small mb-3">If you are a parent or hospital representative facing technical issues, you can send a direct inquiry to the support desk.</p>
            <a href="admin_contact.php" class="btn btn-teal px-4 fw-bold">Open Support Contact Form</a>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>