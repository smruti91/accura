<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <!-- Using text as logo placeholder -->
               <img src="images/Accura_Gold-Logo.png" alt="Accura Gold Logo" style="max-height: 50px; width: auto;">
                ACCURA <span>GOLD</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentPage == 'index.php' || $currentPage == '') ? 'active' : '' ?>" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentPage == 'about.php') ? 'active' : '' ?>" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentPage == 'contact.php') ? 'active' : '' ?>" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentPage == 'results.php') ? 'active' : '' ?>" href="results.php">Results</a>
                    </li>
                </ul>
                <div class="ms-lg-4 mt-3 mt-lg-0">
                    <a class="btn btn-primary-custom" href="login.php">Login <i class="fa-solid fa-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </nav>