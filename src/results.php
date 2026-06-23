<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $pageTitle = "Testing Results | Accura Gold Minerals Testing Labs";
    include_once('header.php') ;
    ?>
</head>
<body class="bg-light">

    <!-- Navigation -->
    <?php include('navbar.php'); ?>

    <!-- Page Header -->
    <section class="py-5 mt-5" style="background: linear-gradient(rgba(26, 26, 26, 0.8), rgba(26, 26, 26, 0.8)), url('https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80') center/cover; color: white;">
        <div class="container py-5 text-center">
            <h1 class="display-4 text-white animate-zoom-in">Testing Results</h1>
            <p class="lead text-white-50 animate-zoom-in delay-1">Search and securely access your mineral analysis reports.</p>
        </div>
    </section>

    <!-- Search Section -->
    <section class="py-5 mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="glass-card text-center animate-on-scroll">
                        <div class="mb-4">
                            <div class="feature-icon mx-auto" style="width: 70px; height: 70px; font-size: 2rem;">
                                <i class="fa-solid fa-file-contract"></i>
                            </div>
                            <h3 class="mt-3">Find Your Report</h3>
                            <p class="text-muted">Enter your unique Test ID to download or view your testing results.</p>
                        </div>
                        
                        <form action="results.php" method="GET" class="px-md-5">
                            <div class="row g-2 justify-content-center">
                                <div class="col-12 col-md-8">
                                    <div class="input-group input-group-lg shadow-sm">
                                        <span class="input-group-text bg-white border-primary text-primary">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </span>
                                        <input type="text" class="form-control border-primary border-start-0 ps-0" name="test_id" placeholder="e.g. AG-2026-98765" required value="<?= isset($_GET['test_id']) ? htmlspecialchars($_GET['test_id']) : '' ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <button class="btn btn-primary-custom btn-lg w-100 h-100 px-4" type="submit">Search</button>
                                </div>
                            </div>
                        </form>

                        <?php if (isset($_GET['test_id']) && !empty($_GET['test_id'])): ?>
                            <!-- Simulated Results Display -->
                            <div class="mt-5 pt-4 border-top text-start text-dark">
                                <h5>Search Results for: <strong><?= htmlspecialchars($_GET['test_id']) ?></strong></h5>
                                <div class="alert alert-info mt-3" role="alert">
                                    <i class="fa-solid fa-circle-info me-2"></i> No records found for this Test ID. Please ensure the ID is correct or contact our support team.
                                </div>
                            </div>
                        <?php endif; ?>
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
