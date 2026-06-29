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
?>
<!DOCTYPE html>
<html>

<head>

    <?php
    $pageTitle =  "Create User | Accura Gold Admin Panel";
    include_once __DIR__ . '/includes/header.php';
    ?>

</head>

<body>
    <?php include_once __DIR__ . '/includes/sidebar.php'; ?>
    <?php include_once __DIR__ . '/includes/navbar.php'; ?>
    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid p-4">

            <div class="card">

                <div class="card-header bg-dark text-white">

                    Create Contact

                </div>

                <div class="card-body">
                    <div class="mb-3 text-end">
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#userModal">

                            <i class="fas fa-plus"></i>
                            Create User

                        </button>
                    </div>
                    <table id="messageTable" class="table table-bordered table-striped">

                        <thead>

                            <tr>

                                <th>ID</th>
                                <th>User Name</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                    </table>
                    <div class="modal fade" id="userModal">

                        <div class="modal-dialog">

                            <div class="modal-content">

                                <form id="userForm">

                                    <input type="hidden" id="user_id" name="user_id">

                                    <div class="modal-header bg-dark text-white">

                                        <h5 id="modalTitle">
                                            Create User
                                        </h5>

                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal">
                                        </button>

                                    </div>

                                    <div class="modal-body">

                                        <div class="mb-3">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" id="name">
                                        </div>

                                        <div class="mb-3">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username" id="username">
                                        </div>

                                        <div class="mb-3">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" id="email">
                                        </div>

                                        <div class="mb-3">
                                            <label>Mobile</label>
                                            <input type="text" class="form-control" name="mobile" id="mobile">
                                        </div>

                                        <div class="mb-3">
                                            <label>Status</label>

                                            <select class="form-control" name="status" id="status">

                                                <option value="1">
                                                    Active
                                                </option>

                                                <option value="0">
                                                    Inactive
                                                </option>

                                            </select>
                                        </div>

                                        <div class="alert alert-info">
                                            Default Password:
                                            <strong>Accura@2026</strong>
                                        </div>

                                    </div>

                                    <div class="modal-footer">

                                        <button type="submit" id="saveBtn" class="btn btn-warning">

                                            Save User

                                        </button>

                                    </div>

                                </form>

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
   var table = $('#messageTable').DataTable({

        processing: true,
        serverSide: true,

        ajax: {
            url: 'fetch-users.php',
            type: 'POST'
        },

        columns: [{
            data:null,
            render:function(data,type,row,meta){
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
            {
                data: 'user_name'
            },
            {
                data: 'name'
            },
            {
                data: 'email'
            },
            {
                data: 'phone'
            },
            {
                data: 'status'
            },
            {
                data: 'created_at'
            },
            {
                data: 'action'
            }
        ]
    });

    $('#userForm').submit(function(e) {

        e.preventDefault();

        $('#saveBtn')
            .prop('disabled', true)
            .html('Saving...');

        $.ajax({

            url: 'save-user.php',

            type: 'POST',

            data: $(this).serialize(),

            dataType: 'json',

            success: function(res) {

                if (res.status == 'success') {

                    $('#userForm')[0].reset();

                    bootstrap.Modal
                        .getInstance(
                            document.getElementById('userModal')
                        )
                        .hide();

                    table.ajax.reload();

                    alert(res.message);
                } else {
                    alert(res.message);
                }
            },

            complete: function() {

                $('#saveBtn')
                    .prop('disabled', false)
                    .html('Save User');
            }

        });

    });

    $(document).on(
        'click',
        '.editBtn',
        function() {

            let id = $(this).data('id');

            $.get(
                'get-user.php', {
                    id: id
                },
                function(res) {

                    let u = JSON.parse(res);

                    $('#modalTitle').html(
                        'Edit User'
                    );

                    $('#user_id').val(u.id);
                    $('#name').val(u.name);
                    $('#username').val(u.username);
                    $('#email').val(u.email);
                    $('#mobile').val(u.mobile);
                    $('#status').val(u.status);

                    new bootstrap.Modal(
                        document.getElementById('userModal')
                    ).show();
                }
            );
        });

    $(document).on(
        'click',
        '.deleteBtn',
        function() {

            if (!confirm(
                    'Delete user?'
                )) {
                return;
            }

            let id =
                $(this).data('id');

            $.post(
                'delete-user.php', {
                    id: id
                },
                function() {

                    table.ajax.reload();

                }
            );
        });
    </script>

</body>

</html>