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
                        
                        <form id="reportSearchForm" class="px-md-5">
                            <div class="row g-2 justify-content-center">
                                <div class="col-12 col-md-8">
                                    <div class="input-group input-group-lg shadow-sm">
                                        <span class="input-group-text bg-white border-primary text-primary">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </span>
                                        <input type="text" class="form-control border-primary border-start-0 ps-0" name="report_no" id="report_no"  placeholder="e.g. AG02698765" required >
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <button class="btn btn-primary-custom btn-lg w-100 h-100 px-4" type="submit" id="searchBtn">Search</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div id="result-div" ></div>
                
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include('footer.php') ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Custom JS -->
    <script src="js/main.js"></script>

    <script>
$('#reportSearchForm').submit(function(e){

    e.preventDefault();

    let reportNo = $('#report_no').val().trim();

    if(reportNo === ''){
        return;
    }

    $('#searchBtn')
        .prop('disabled', true)
        .html(
            'Searching... <span class="spinner-border spinner-border-sm"></span>'
        );

    $('#result-div').html(`
        <div class="text-center py-4">
            <div class="spinner-border text-warning"></div>
        </div>
    `);

    $.ajax({

        url:'search-report.php',

        type:'POST',

        data:{
            report_no:reportNo
        },

        dataType:'json',

        success:function(res){

            if(res.status === 'success'){

                $('#result-div').html(`
                    <div class="card border-success mt-4">

                        <div class="card-header bg-success text-white">
                            Report Found
                        </div>

                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <strong>Report Number:</strong><br>
                                    ${res.data.report_no}
                                </div>

                                <div class="col-md-6 mb-3">
                                    <strong>Report Date:</strong><br>
                                    ${res.data.report_date}
                                </div>

                                <div class="col-md-6 mb-3">
                                    <strong>File Name:</strong><br>
                                    ${res.data.file_name}
                                </div>

                                <div class="col-md-12 mb-3">
                                    <strong>Description:</strong><br>
                                    ${res.data.description}
                                </div>

                            </div>

                            <a
                                href="${res.data.file_url}"
                                target="_blank"
                                class="btn btn-primary">

                                <i class="fa fa-eye"></i>
                                View Report

                            </a>

                            <a
                                href="${res.data.file_url}"
                                download
                                class="btn btn-success">

                                <i class="fa fa-download"></i>
                                Download

                            </a>

                        </div>

                    </div>
                `);

            }else{

                $('#result-div').html(`
                    <div class="alert alert-danger mt-4">
                        ${res.message}
                    </div>
                `);

            }

        },

        error:function(){

            $('#result-div').html(`
                <div class="alert alert-danger mt-4">
                    Something went wrong.
                </div>
            `);

        },

        complete:function(){

            $('#searchBtn')
                .prop('disabled', false)
                .html('Search');

        }

    });

});
</script>
</body>
</html>
