<?php
 $msgCount = 0;

    $result = $db->query("
        SELECT COUNT(*) total
        FROM contact_messages
        WHERE status = 0
    ");

    $row = $result->fetch_assoc();

    $msgCount = $row['total'];
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<div class="sidebar" id="sidebar">

    <div class="logo-area">
        <h4>ACCURA <span>GOLD</span></h4>
        <small class="text-light">Admin Panel</small>
    </div>

    <div class="sidebar-menu">

        <a href="index.php"
           class="<?= ($currentPage == 'index.php') ? 'active' : '' ?>">
            <i class="fas fa-gauge"></i>
            Dashboard
        </a>

        <a href="messages.php"
           class="<?= ($currentPage == 'messages.php') ? 'active' : '' ?>">
            <i class="fas fa-envelope"></i>
            Messages

            <?php if($msgCount > 0){ ?>
                <span class="badge bg-danger ms-2">
                    <?= $msgCount ?>
                </span>
            <?php } ?>
        </a>

        <!-- <a href="users.php"
           class="<?= ($currentPage == 'users.php') ? 'active' : '' ?>">
            <i class="fas fa-users"></i>
            User Details
        </a> -->

        <a href="change-password.php"
           class="<?= ($currentPage == 'change-password.php') ? 'active' : '' ?>">
            <i class="fas fa-key"></i>
            Change Password
        </a>

        <a href="logout.php">
            <i class="fas fa-right-from-bracket"></i>
            Logout
        </a>

    </div>

</div>