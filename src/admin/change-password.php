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
    $pageTitle =  "Change Password | Accura Gold Minerals Testing Labs";
    include_once __DIR__ . '/includes/header.php';
    ?>
<?php include_once __DIR__ . '/includes/navbar.php'; ?>
</head>
<body>
  <?php include_once __DIR__ . '/includes/sidebar.php'; ?>
<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header bg-dark text-white">
                    Change Password
                </div>

                <div class="card-body">

                    <div id="responseMsg"></div>

                    <form id="changePasswordForm">

                        <div class="mb-3">

                            <label class="form-label">
                                Current Password
                            </label>

                            <input
                                type="password"
                                name="current_password"
                                id="current_password"
                                class="form-control">

                            <small class="text-danger" id="current_password_error"></small>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                New Password
                            </label>

                            <input
                                type="password"
                                name="new_password"
                                id="new_password"
                                class="form-control">

                            <small class="text-danger" id="new_password_error"></small>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Confirm Password
                            </label>

                            <input
                                type="password"
                                name="confirm_password"
                                id="confirm_password"
                                class="form-control">

                            <small class="text-danger" id="confirm_password_error"></small>

                        </div>

                        <button
                            type="submit"
                            id="changePasswordBtn"
                            class="btn btn-warning w-100">

                            Update Password

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

$('#changePasswordForm').submit(function(e){

    e.preventDefault();

    $('.text-danger').html('');
    $('#responseMsg').html('');

    let currentPassword = $('#current_password').val().trim();
    let newPassword = $('#new_password').val().trim();
    let confirmPassword = $('#confirm_password').val().trim();

    let hasError = false;

    if(currentPassword === ''){
        $('#current_password_error').html('Current password required');
        hasError = true;
    }

    if(newPassword.length < 8){
        $('#new_password_error').html('Minimum 8 characters required');
        hasError = true;
    }

    if(newPassword !== confirmPassword){
        $('#confirm_password_error').html('Passwords do not match');
        hasError = true;
    }

    if(hasError){
        return;
    }

    let formData = $(this).serialize();

    $('#changePasswordBtn')
        .prop('disabled', true)
        .html('Updating...');

    $.ajax({

        url: 'update-password.php',

        type: 'POST',

        data: formData,

        dataType: 'json',

        success: function(res){

            if(res.status === 'success'){

                $('#responseMsg').html(`
                    <div class="alert alert-success">
                        ${res.message}
                    </div>
                `);

                $('#changePasswordForm')[0].reset();

            }else{

                $('#responseMsg').html(`
                    <div class="alert alert-danger">
                        ${res.message}
                    </div>
                `);

            }

        },

        complete:function(){

            $('#changePasswordBtn')
                .prop('disabled', false)
                .html('Update Password');

        }

    });

});

</script>

</body>
</html>