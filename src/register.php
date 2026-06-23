<?php
$message = '';
include_once('config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $conn = $db; // Use the existing database connection

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($name) || empty($username) || empty($password)) {
        $message = "All fields are required.";
    } else {

        // Check existing username
        $check = $conn->prepare("SELECT id FROM tbl_users WHERE username = ?");
        $check->bind_param("s", $username);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $message = "Username already exists.";
        } else {

            // Hash Password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("
                INSERT INTO tbl_users
                (name, username, password, status)
                VALUES (?, ?, ?, 1)
            ");

            $stmt->bind_param(
                "sss",
                $name,
                $username,
                $hashedPassword
            );

            if ($stmt->execute()) {
                $message = "User registered successfully.";
            } else {
                $message = "Registration failed.";
            }

            $stmt->close();
        }

        $check->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f5f5;
        }

        .card{
            margin-top:50px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow">
                <div class="card-header">
                    <h3>User Registration</h3>
                </div>

                <div class="card-body">

                    <?php if(!empty($message)): ?>
                        <div class="alert alert-info">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST">

                        <div class="mb-3">
                            <label>Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label>Username</label>
                            <input
                                type="text"
                                name="username"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required>
                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary w-100">
                            Register
                        </button>

                    </form>

                </div>
            </div>

        </div>

    </div>
</div>

</body>
</html>

