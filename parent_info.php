<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Portal - e-Vaccination System</title>
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
        .btn-outline-custom {
            border: 1px solid #dee2e6;
            color: #495057;
            background-color: #ffffff;
            font-weight: 500;
            border-radius: 6px;
            padding: 8px 20px;
        }
        .btn-outline-custom:hover {
            background-color: #f8f9fa;
        }
        .hero-section {
            padding: 60px 0;
        }
        .hero-img-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            border: 1px solid #f0f0f0;
        }
        .benefit-card {
            border: 1px solid #f0f0f0;
            border-radius: 12px;
            background: #ffffff;
            transition: all 0.3s ease;
        }
        .benefit-card:hover {
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transform: translateY(-3px);
        }
        .icon-box {
            width: 50px;
            height: 50px;
            background-color: #e6fcf5;
            color: #20c997;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            margin-bottom: 20px;
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
                    <li class="nav-item"><a class="nav-link active" href="parent_info.php">Parent Portal</a></li>
                    <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="faqs.php">FAQs</a></li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                    <a href="parent_login.php" class="btn btn-outline-custom">Login</a>
                    <a href="parent_register.php" class="btn btn-teal">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Registration Image -->
    <div class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 pe-lg-5">
                    <h1 class="display-5 fw-bold text-dark mb-3" style="line-height: 1.2;">
                        Parent Portal & Immunization Overview
                    </h1>
                    <p class="text-muted lead mb-4" style="font-size: 1.1rem;">
                        Ensure your children never miss a critical vaccine. Track schedules, book hospital appointments instantly, and manage digital records securely in one place.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="parent_register.php" class="btn btn-teal btn-lg shadow-sm">Register Your Child Now</a>
                        <a href="parent_login.php" class="btn btn-outline-custom btn-lg">Portal Login</a>
                    </div>
                </div>
                <div class="col-lg-5 mt-4 mt-lg-0">
                    <div class="hero-img-container">
                        
                        <img src="parent_portal.jpg" alt="Parent Registering Child" class="img-fluid w-100" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=800&q=80';">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Overview -->
    <div class="container mb-5 py-4" id="features">
        <div class="text-center mb-5">
            <h3 class="fw-bold text-dark">Why Parents Trust Our System</h3>
            <p class="text-muted">Designed to make child healthcare tracking seamless and stress-free.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="benefit-card p-4 h-100">
                    <div class="icon-box">
                        <i class="fas fa-calendar-check fa-lg"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Instant Booking</h5>
                    <p class="text-muted small mb-0">Book vaccination slots with nearby registered hospitals without waiting in long physical queues.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="benefit-card p-4 h-100">
                    <div class="icon-box">
                        <i class="fas fa-notes-medical fa-lg"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Digital Records</h5>
                    <p class="text-muted small mb-0">Keep complete digital histories of all administered vaccines safely tied to your unique parent ID.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="benefit-card p-4 h-100">
                    <div class="icon-box">
                        <i class="fas fa-bell fa-lg"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Status Approvals</h5>
                    <p class="text-muted small mb-0">Receive clear status updates (Pending, Approved, or Completed) directly from the hospital administration.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Read-Only Sample Profile Section -->
    <div class="container mb-5">
        <div class="card border-0 shadow-sm p-4 bg-light rounded-4">
            <h5 class="fw-bold text-dark mb-3"><i class="fas fa-id-card text-success me-2"></i>Sample Parent Account Preview (Read-Only)</h5>
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label small fw-bold text-muted">Parent Name</label>
                    <input type="text" class="form-control" value="Sundus" readonly>
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-bold text-muted">Email Address</label>
                    <input type="text" class="form-control" value="sundus@gmail.com" readonly>
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-bold text-muted">Linked Child Profile</label>
                    <input type="text" class="form-control" value="Ahmed Khan (Active)" readonly>
                </div>
            </div>
        </div>
    </div>

    <!-- Modern & Professional Footer -->
<footer class="bg-dark text-white pt-5 pb-4 mt-5 border-top border-secondary">
    <div class="container text-center text-md-start">
        <div class="row text-center text-md-start">
            
            <!-- Column 1: Project Info -->
            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-primary">
                    <i class="fas fa-syringe me-2"></i>e-Vaccination
                </h5>
                <p class="text-light-50 small">
                    A Web-Based Child Immunization and Appointment Management Solution designed to streamline child vaccination records and hospital appointments seamlessly.
                </p>
            </div>

            <!-- Column 2: Quick Links -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold text-warning">Quick Links</h6>
                <p class="mb-2"><a href="index.php" class="text-white text-decoration-none hover-link small"><i class="fas fa-angle-right me-2 text-primary"></i>Home</a></p>
                <p class="mb-2"><a href="about.php" class="text-white text-decoration-none hover-link small"><i class="fas fa-angle-right me-2 text-primary"></i>About Us</a></p>
                <p class="mb-2"><a href="faqs.php" class="text-white text-decoration-none hover-link small"><i class="fas fa-angle-right me-2 text-primary"></i>FAQs</a></p>
                <p class="mb-2"><a href="login.php" class="text-white text-decoration-none hover-link small"><i class="fas fa-angle-right me-2 text-primary"></i>Portal Login</a></p>
            </div>

            <!-- Column 3: Contact / Support Info -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold text-warning">Project Support</h6>
                <p class="small text-white-50 mb-2"><i class="fas fa-university me-2 text-primary"></i>Aptech North Karachi</p>
                <p class="small text-white-50 mb-2"><i class="fas fa-users me-2 text-primary"></i>Batch: 2601F1</p>
                <p class="small text-white-50 mb-2">
                    <i class="fas fa-envelope me-2 text-primary"></i>
                    <a href="mailto:admin@evaccination.com" class="text-white-50 text-decoration-none">admin@evaccination.com</a>
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
            <div class="col-md-5 col-lg-4 text-center text-md-end">
                <span class="badge bg-primary px-3 py-2 rounded-pill">v2.0 Active</span>
            </div>
        </div>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
