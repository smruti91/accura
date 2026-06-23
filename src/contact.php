<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $pageTitle = "Contact | Accura Gold Minerals Testing Labs";
    include_once('header.php') ;
    ?>
</head>
<body>

    <!-- Navigation -->
    <?php include('navbar.php'); ?>

    <!-- Page Header -->
    <section class="py-5 mt-5" style="background: linear-gradient(rgba(26, 26, 26, 0.8), rgba(26, 26, 26, 0.8)), url('https://images.unsplash.com/photo-1516387938699-a93567ec168e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80') center/cover; color: white;">
        <div class="container py-5 text-center">
            <h1 class="display-4 text-white">Contact Us</h1>
            <p class="lead text-white-50">We are here to answer any questions you may have about our testing services.</p>
        </div>
    </section>

    <!-- Content -->
    <section class="py-5">
        <div class="container py-4">
            <div class="row g-5">
                <div class="col-lg-6 animate-on-scroll">
                    <h3 class="mb-4">Send us a Message</h3>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" required placeholder="John Doe">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" required placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" required placeholder="How can we help?">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="5" required placeholder="Your message here..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary-custom w-100 py-2">Send Message</button>
                    </form>
                </div>
                <div class="col-lg-6 animate-on-scroll" style="transition-delay: 0.2s;">
                    <div class="bg-light p-5 rounded h-100">
                        <h3 class="mb-4">Contact Information</h3>
                        <div class="d-flex mb-4">
                            <div class="feature-icon bg-white shadow-sm flex-shrink-0 me-3" style="width: 50px; height: 50px;">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <h5>Our Headquarters</h5>
                                773-A, Sri Selvalakshmi Complex,<br>
                                Ponnagar, Salem Road,<br>
                                Namakkal - 637001,<br>
                                Namakkal District, Tamil Nadu, India
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div class="feature-icon bg-white shadow-sm flex-shrink-0 me-3" style="width: 50px; height: 50px;">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <h5>Call Us</h5>
                                <p class="text-muted mb-0">+91 800 123 4567<br>Mon-Fri, 9am - 6pm</p>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div class="feature-icon bg-white shadow-sm flex-shrink-0 me-3" style="width: 50px; height: 50px;">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div>
                                <h5>Email Us</h5>
                                <p class="text-muted mb-0">accuratestinglabs@gmail.com</p>
                            </div>
                        </div>
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
