<?php
session_start();
include_once('../config.php');
if (
    !isset($_SESSION['authenticated']) ||
    $_SESSION['authenticated'] !== true
) {
    header('Location: ../login.php');
    exit();
}
?><!DOCTYPE html>
<html>

<head>

    <?php
    $pageTitle = isset($pageTitle) ? $pageTitle : "Accura Gold Admin Panel";
    include_once __DIR__ . '/includes/header.php';
    ?>

    <!-- <link rel="stylesheet"
        href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"> -->

</head>

<body>
    <?php include_once __DIR__ . '/includes/sidebar.php'; ?>
    <?php include_once __DIR__ . '/includes/navbar.php'; ?>
    <!-- Main Content -->
    <div class="main-content">
    <div class="container-fluid p-4">

        <div class="card">

            <div class="card-header bg-dark text-white">

                Contact Messages

            </div>

            <div class="card-body">

                <table
                    id="messageTable"
                    class="table table-bordered table-striped">

                    <thead>

                        <tr>

                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>

                        </tr>

                    </thead>

                </table>
                <div class="modal fade" id="viewModal">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <div class="modal-header">

                                <h5>Message Details</h5>

                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"></button>

                            </div>

                            <div class="modal-body" id="messageDetails">

                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

    <script>
       $('#messageTable').DataTable({

    processing: true,
    serverSide: true,

    ajax: {
        url: 'fetch-messages.php',
        type: 'POST'
    },

    columns: [
        {
            data:null,
            render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        { data: 'name' },
        { data: 'email' },
        { data: 'subject' },
        { data: 'status' },
        { data: 'created_at' },
        { data: 'action' }
    ]
});

        $(document).on(
'click',
'.viewBtn',
function(){

    let id =
    $(this).data('id');

    $.get(
        'get-message.php',
        {id:id},
        function(res){

            let data =
            JSON.parse(res);

            $('#messageDetails').html(`

                <p>
                <strong>Name:</strong>
                ${data.name}
                </p>

                <p>
                <strong>Email:</strong>
                ${data.email}
                </p>

                <p>
                <strong>Subject:</strong>
                ${data.subject}
                </p>

                <p>
                <strong>Message:</strong>
                ${data.message}
                </p>

            `);

            new bootstrap.Modal(
                document.getElementById('viewModal')
            ).show();

        }
    );

});
    </script>

</body>

</html>