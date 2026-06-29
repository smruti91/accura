<?php
$pageTitle = "Company Profile | Accura Gold Minerals Testing Labs";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('header.php'); ?>
    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .profile-hero {
            background: linear-gradient(135deg, rgba(26, 26, 26, 0.9), rgba(240, 147, 43, 0.8)), url('images/accura_gold2.webp') center/cover;
            color: white;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }
        .profile-hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.4);
            z-index: 1;
        }
        .profile-hero .container {
            position: relative;
            z-index: 2;
        }
        
        .profile-lead {
            font-size: 1.4rem;
            font-weight: 600;
            color: #f0932b;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-left: 5px solid #f0932b;
            padding-left: 15px;
        }
        
        .profile-header-text {
            font-size: 1.15rem;
            line-height: 1.9;
            color: #555;
            margin-bottom: 25px;
        }

        .highlight-box {
            background: linear-gradient(135deg, #f0932b, #e58e26);
            color: white;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            font-weight: 700;
            font-size: 1.3rem;
            box-shadow: 0 10px 30px rgba(240, 147, 43, 0.4);
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .highlight-box:hover {
            transform: translateY(-5px);
        }
        
        .service-card {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            display: flex;
            align-items: center;
        }
        .service-card:hover {
            transform: translateX(10px);
            border-left-color: #f0932b;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        .service-icon {
            color: #f0932b;
            font-size: 1.5rem;
            margin-right: 15px;
            width: 30px;
            text-align: center;
        }
        .service-text {
            font-weight: 600;
            color: #333;
            font-size: 1.05rem;
            margin: 0;
        }

        .process-section {
            background-color: #f8f9fa;
            padding: 80px 0;
            border-top: 1px solid #eaeaea;
        }
        
        .process-title-wrapper {
            text-align: center;
            margin-bottom: 50px;
        }
        .process-title {
            display: inline-block;
            font-size: 1.8rem;
            font-weight: 800;
            color: #2c3e50;
            position: relative;
            padding-bottom: 15px;
            text-transform: uppercase;
        }
        .process-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background-color: #f0932b;
            border-radius: 2px;
        }

        .process-container {
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }
        
        .process-step {
            flex: 1;
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            position: relative;
            z-index: 2;
            transition: all 0.4s ease;
            min-height: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid transparent;
        }
        
        .process-step:hover {
            transform: translateY(-10px);
            border-color: #f0932b;
            box-shadow: 0 15px 40px rgba(240, 147, 43, 0.2);
        }
        
        .process-step h5 {
            font-size: 0.95rem;
            font-weight: 700;
            margin: 0;
            color: #2c3e50;
            text-transform: uppercase;
            line-height: 1.5;
        }
        
        .process-arrow-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            z-index: 1;
        }
        
        .process-arrow-icon {
            color: #bdc3c7;
            font-size: 1.5rem;
            animation: pulse-arrow 2s infinite;
        }
        
        @keyframes pulse-arrow {
            0% { transform: scale(1); color: #bdc3c7; }
            50% { transform: scale(1.2); color: #f0932b; }
            100% { transform: scale(1); color: #bdc3c7; }
        }

        @media (max-width: 991px) {
            .process-container {
                flex-direction: column;
            }
            .process-step {
                width: 100%;
                margin-bottom: 15px;
                min-height: 100px;
            }
            .process-arrow-container {
                width: 100%;
                height: 50px;
                transform: rotate(90deg);
            }
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <?php include('navbar.php'); ?>

    <!-- Page Header -->
    <section class="profile-hero mt-5">
        <div class="container text-center" data-aos="fade-up" data-aos-duration="1000">
            <h1 class="display-3 fw-bold mb-3 text-white">Company Profile</h1>
            <p class="lead text-white-50">Precision, Reliability, and Excellence in Mineral Testing</p>
        </div>
    </section>

    <!-- Content -->
    <section class="py-5 mt-4">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-12" data-aos="fade-right" data-aos-duration="1000">
                    <p class="profile-lead">
                        Accura Gold Minerals Testing Labs Private Limited started in January 2021 by qualified and experienced professionals who worked in the ores and minerals sample preparation and chemical analysis in third-party laboratories.
                    </p>
                    <p class="profile-header-text">
                        The personnel involved in Accura laboratory have developed all the methods, procedures, and protocols as per International and Industry standards for elemental analysis. We serve customers all over India and abroad for exploration & mining projects covering gold, platinum group elements, base-metals, silver, lead, zinc, nickel laterites, lithium-pegmatites-cassiterites, rare earth carbonatites, graphite, columbite-tantalite, and bulk minerals.
                    </p>
                    <p class="profile-header-text">
                        ACCURA has also participated in proficiency testing (PT) and Round Robin (RR) of laboratories and continuously participates to ensure reliability, traceability, and to instill confidence in our customers and ourselves in the reporting of results.
                    </p>
                </div>
            </div>

            <div class="row mt-5 mb-4">
                <div class="col-12" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="highlight-box">
                        Accura personnel are associated with and take up analysis for the below at in-house and also at validated vendor laboratories:
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card">
                        <i class="fa-solid fa-flask service-icon"></i>
                        <p class="service-text">Representative Sample Preparation</p>
                    </div>
                    <div class="service-card">
                        <i class="fa-solid fa-fire service-icon"></i>
                        <p class="service-text">Gold By Fire Assay</p>
                    </div>
                    <div class="service-card">
                        <i class="fa-solid fa-ring service-icon"></i>
                        <p class="service-text">Platinum Group Elements (PGE) By Fire Assay</p>
                    </div>
                    <div class="service-card">
                        <i class="fa-solid fa-cubes service-icon"></i>
                        <p class="service-text">Base Metals</p>
                    </div>
                    <div class="service-card">
                        <i class="fa-solid fa-gem service-icon"></i>
                        <p class="service-text">Trace And Rare Earth Elements</p>
                    </div>
                    <div class="service-card">
                        <i class="fa-solid fa-pencil service-icon"></i>
                        <p class="service-text">Graphite Analysis</p>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card">
                        <i class="fa-solid fa-mountain service-icon"></i>
                        <p class="service-text">Total Rock/Mineral Analysis</p>
                    </div>
                    <div class="service-card">
                        <i class="fa-solid fa-boxes-stacked service-icon"></i>
                        <p class="service-text">Bulk Minerals - Iron Ore, Bauxite</p>
                    </div>
                    <div class="service-card">
                        <i class="fa-solid fa-shapes service-icon"></i>
                        <p class="service-text">Manganese Ore</p>
                    </div>
                    <div class="service-card">
                        <i class="fa-solid fa-vial service-icon"></i>
                        <p class="service-text">Limestone And Dolomite</p>
                    </div>
                    <div class="service-card">
                        <i class="fa-solid fa-atom service-icon"></i>
                        <p class="service-text">Columbite - Niobium And Tantalum</p>
                    </div>
                    <div class="service-card">
                        <i class="fa-solid fa-layer-group service-icon"></i>
                        <p class="service-text">Chromites</p>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="p-4 bg-light rounded-4 border-start border-4 shadow-sm" style="border-color: #f0932b !important;">
                        <p class="profile-header-text mb-3">
                            <strong>We have the technical competency, capability, and infrastructure</strong> to analyze any type of ores and minerals - chemical analysis, interpret the data, and also take up mineral beneficiation and metallurgical studies.
                        </p>
                        <p class="profile-header-text mb-0">
                            <strong>ACCURA's vision and mission</strong> is to incorporate and add all analytical testing infrastructure and equipment and also obtain certification and accreditation for ISO 9001:2015 and ISO/IEC 17025:2017 during the course of time and continuously improve our quality management system.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="process-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="process-title-wrapper" data-aos="fade-down">
                        <h2 class="process-title">Process Flow of Geological &ndash; Ores & Minerals Samples Analysis</h2>
                    </div>
                </div>
            </div>
            <div class="proceeImg-container" style="margin:0 auto;">
               <img src="../images/setep-5.png" alt="steps" class="img-fluid rounded shadow-lg">
            </div>
            <div class="process-container">
                <div class="process-step" data-aos="zoom-in" data-aos-delay="0">
                    <h5>Sample Drying<br>Crushing &<br>Pulverizing</h5>
                </div>
                
                <div class="process-arrow-container">
                    <i class="fa-solid fa-arrow-right process-arrow-icon"></i>
                </div>
                
                <div class="process-step" data-aos="zoom-in" data-aos-delay="100">
                    <h5>Fusion &<br>Cupellation<br>Furnaces</h5>
                </div>
                
                <div class="process-arrow-container">
                    <i class="fa-solid fa-arrow-right process-arrow-icon"></i>
                </div>
                
                <div class="process-step" data-aos="zoom-in" data-aos-delay="200">
                    <h5>Preconcentration<br>Digestion &<br>4-Acid & 2-Acid</h5>
                </div>
                
                <div class="process-arrow-container">
                    <i class="fa-solid fa-arrow-right process-arrow-icon"></i>
                </div>
                
                <div class="process-step" data-aos="zoom-in" data-aos-delay="300">
                    <h5>Instrumentation<br>AAS ICPOES</h5>
                </div>
                
                <div class="process-arrow-container">
                    <i class="fa-solid fa-arrow-right process-arrow-icon"></i>
                </div>
                
                <div class="process-step" data-aos="zoom-in" data-aos-delay="400">
                    <h5>Confirmation of<br>Reliability Quality &<br>Traceability</h5>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include('footer.php'); ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true, // whether animation should happen only once - while scrolling down
            offset: 50, // offset (in px) from the original trigger point
        });
    </script>
    <!-- Custom JS -->
    <script src="js/main.js"></script>
</body>
</html>
