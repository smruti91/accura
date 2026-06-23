<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $pageTitle = "Login | Accura Gold Minerals Testing Labs";
    include_once('header.php') ;
    ?>
</head>
<body class="bg-light">

    <!-- Navigation -->
 <?php include('navbar.php'); ?>

    <!-- Login Area -->
    <div class="auth-wrapper mt-5 pt-5">
        <div class="auth-card animate-on-scroll">
            <div class="text-center mb-4">
                <i class="fa-solid fa-user-circle fa-4x text-primary mb-3" style="color: var(--primary-color) !important;"></i>
                <h3 class="mb-1">Welcome Back</h3>
                <p class="text-muted">Sign in to your portal</p>
            </div>
            
            <form>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-envelope text-muted"></i></span>
                        <input type="email" class="form-control border-start-0 ps-0" id="email" required placeholder="name@company.com">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label d-flex justify-content-between">
                        Password
                        
                    </label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-lock text-muted"></i></span>
                        <input type="password" class="form-control border-start-0 ps-0" id="password" required placeholder="••••••••">
                    </div>
                </div>
             
                <button type="submit" class="btn btn-primary-custom w-100 py-2 mb-3">Sign In</button>
            </form>
            
            <div class="text-center mt-4">
                <p class="text-muted mb-0">Don't have an account? <a href="contact.html" class="text-primary fw-bold text-decoration-none">Contact Admin Person</a></p>
            </div>
        </div>
    </div>
<!-- Footer -->
    <?php include('footer.php') ?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="js/main.js"></script>
</body>
</html>
