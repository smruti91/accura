<?php
session_start();
include_once('config.php');

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Validation
    if (empty($username)) {
        $error = "Username is required.";
    } elseif (strlen($username) < 3) {
        $error = "Username must be at least 3 characters long.";
    } elseif (strlen($username) > 20) {
        $error = "Username must not exceed 20 characters.";
    } elseif (empty($password)) {
        $error = "Password is required.";
    } elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters long.";
    } else {

        $stmt = $db->prepare("
            SELECT id, name, username, password, status
            FROM tbl_users
            WHERE username = ?
            LIMIT 1
        ");

        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($user = $result->fetch_assoc()) {

            if ($user['status'] != 1) {
                $error = "Your account is inactive. Please contact administrator.";
            }
            elseif (password_verify($password, $user['password'])) {

                session_regenerate_id(true);

                $_SESSION['authenticated'] = true;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_username'] = $user['username'];

                header("Location: admin/index.php");
                exit();
            } else {
                $error = "Invalid username or password.";
            }

        } else {
            $error = "Invalid username or password.";
        }

        $stmt->close();
    }
}
?>

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
            
            <?php if(!empty($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <?php echo htmlspecialchars($error); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <?php if(!empty($success)): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <?php echo htmlspecialchars($success); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>
           <form id="loginForm" method="POST" action="">
                <div class="mb-3">
                    <label for="email" class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-user text-muted"></i></span>
                        <input
                            type="text"
                            class="form-control border-start-0 ps-0"
                            id="username"
                            name="username"
                            value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>"
                            placeholder="Enter your username">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label d-flex justify-content-between">
                        Password
                        
                    </label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-lock text-muted"></i></span>
                        <input
                            type="password"
                            class="form-control border-start-0 ps-0"
                            id="password"
                            name="password"
                            placeholder="••••••••">
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
    <script>
        // src/main.js
   
        document.addEventListener('DOMContentLoaded', () => {

            const form = document.getElementById('loginForm');

            form.addEventListener('submit', function(e) {

                const username = document.getElementById('username');
                const password = document.getElementById('password');

                let errors = [];

                if (username.value.trim() === '') {
                    errors.push('Username is required');
                }

                if (username.value.trim().length < 3) {
                    errors.push('Username must be at least 3 characters');
                }

                if (username.value.trim().length > 20) {
                    errors.push('Username must not exceed 20 characters');
                }

                if (password.value.trim() === '') {
                    errors.push('Password is required');
                }

                if (password.value.length < 8) {
                    errors.push('Password must be at least 8 characters');
                }

                if (errors.length > 0) {

                    e.preventDefault();

                    let html = `
                        <div class="alert alert-danger alert-dismissible fade show">
                            ${errors.join('<br>')}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `;

                    const oldAlert = document.querySelector('.client-error');
                    if (oldAlert) {
                        oldAlert.remove();
                    }

                    const wrapper = document.createElement('div');
                    wrapper.classList.add('client-error');
                    wrapper.innerHTML = html;

                    form.prepend(wrapper);

                    return false;
                }

                return true;
            });

        });


    </script>
</body>
</html>
