<!DOCTYPE html>
<html lang="en">
<head>
    
   <?php
    $pageTitle = "Home | Accura Gold Minerals Testing Labs";
    include_once('header.php') ;
    ?>
</head>
<body>

    <!-- Navigation -->
    <?php include('navbar.php'); ?>

    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="animate-zoom-in">Precision in Every Test</h1>
                    <div class="slide-in-bar"></div>
                    <p class="animate-zoom-in delay-1">Accura Gold Minerals Testing Labs Private Limited provides world-class analytical testing solutions. Trust us for accurate, reliable, and swift mineral analysis.</p>
                    <div class="mt-4 animate-zoom-in delay-2 floating">
                        <a href="about.php" class="btn btn-light btn-lg me-3 px-4 py-2 fw-bold text-dark rounded-pill">Learn More</a>
                        <a href="contact.php" class="btn btn-primary-custom btn-lg px-4 py-2 rounded-pill">Get in Touch</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Company Section -->
    <section class="py-5" style="background-color: #f8f9fa;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0 animate-on-scroll">
                    <img src="../images/accura_gold.webp" alt="Gold Minerals" class="img-fluid rounded shadow-lg hover-scale">
                </div>
                <div class="col-lg-6 ps-lg-5 animate-on-scroll" style="transition-delay: 0.2s;">
                    <h6 class="text-primary fw-bold text-uppercase mb-2" style="color: var(--primary-color) !important;">About The Company</h6>
                    <h2 class="display-6 mb-4">Pioneering Mineral Testing in India</h2>
                    <p class="text-muted mb-4">Accura Gold Minerals Testing Labs Private Limited is a premier analytical testing laboratory dedicated to the mining and mineral trade industries. With a strong commitment to accuracy and turnaround times, we empower businesses with reliable data.</p>
                    <div class="d-flex align-items-center mb-3">
                        <div class="feature-icon me-3" style="width: 45px; height: 45px; font-size: 1.2rem; background-color: var(--primary-color); color: white;">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <h5 class="mb-0">NABL Accredited Lab</h5>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="feature-icon me-3" style="width: 45px; height: 45px; font-size: 1.2rem; background-color: var(--primary-color); color: white;">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <h5 class="mb-0">Expert Geochemists</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="text-center mb-5 animate-on-scroll">
                <h2 class="display-5">Our Testing Expertise</h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">We leverage state-of-the-art equipment to deliver highly precise gold and mineral testing services.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 animate-on-scroll" style="transition-delay: 0.1s;">
                    <div class="glass-card text-center h-100">
                        <div class="feature-icon mx-auto">
                            <i class="fa-solid fa-flask"></i>
                        </div>
                        <h4>Chemical Analysis</h4>
                        <p class="text-muted">Rigorous chemical testing to determine the exact composition and purity of mineral samples.</p>
                    </div>
                </div>
                <div class="col-md-4 animate-on-scroll" style="transition-delay: 0.2s;">
                    <div class="glass-card text-center h-100">
                        <div class="feature-icon mx-auto">
                            <i class="fa-solid fa-microscope"></i>
                        </div>
                        <h4>Microscopic Evaluation</h4>
                        <p class="text-muted">Advanced microscopic techniques to analyze the structural properties of gold ores.</p>
                    </div>
                </div>
                <div class="col-md-4 animate-on-scroll" style="transition-delay: 0.3s;">
                    <div class="glass-card text-center h-100">
                        <div class="feature-icon mx-auto">
                            <i class="fa-solid fa-certificate"></i>
                        </div>
                        <h4>Certification</h4>
                        <p class="text-muted">Internationally recognized certification of your mineral assets for trade and compliance.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
   <?php include('footer.php') ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="js/main.js"></script>
</body>
</html>
