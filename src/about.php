<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $pageTitle = "About | Accura Gold Minerals Testing Labs";
    include_once('header.php') ;
    ?>
</head>
<body>

    <!-- Navigation -->
  <?php include('navbar.php'); ?>

    <!-- Page Header -->
    <section class="py-5 mt-5" style="background: linear-gradient(rgba(26, 26, 26, 0.8), rgba(26, 26, 26, 0.8)), url('https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80') center/cover; color: white;">
        <div class="container py-5 text-center">
            <h1 class="display-4 text-white">About Accura Gold</h1>
            <p class="lead text-white-50">Leading the industry in precision mineral testing.</p>
        </div>
    </section>

    <!-- Content -->
    <section class="py-5">
        <div class="container py-4">
            <div class="row align-items-center mb-5 animate-on-scroll">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="../images/accura_gold2.webp" alt="Laboratory" class="img-fluid rounded shadow-lg">
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <h2 class="mb-4">Our Vision & Mission</h2>
                    <p class="text-muted">At <strong>Accura Gold Minerals Testing Labs Private Limited</strong>, our vision is to be the most trusted and scientifically advanced mineral testing laboratory globally.</p>
                    <p class="text-muted">Our mission is to empower the mining and trade industries with uncompromising accuracy, rapid turnaround times, and actionable analytical insights.</p>
                    <ul class="list-unstyled mt-4">
                        <li class="mb-2"><i class="fa-solid fa-check text-primary me-2"></i> ISO Certified Facilities</li>
                        <li class="mb-2"><i class="fa-solid fa-check text-primary me-2"></i> Highly Qualified Geochemists</li>
                        <li class="mb-2"><i class="fa-solid fa-check text-primary me-2"></i> Advanced Spectrometry</li>
                    </ul>
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
