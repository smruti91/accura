<?php

session_start();

include '../config.php';

header('Content-Type: application/json');

if(!isset($_SESSION['authenticated'])){

    echo json_encode([
        'status'=>'error',
        'message'=>'Unauthorized access'
    ]);
    exit;
}

$username = $_SESSION['user_username'];

$currentPassword = trim($_POST['current_password'] ?? '');
$newPassword = trim($_POST['new_password'] ?? '');
$confirmPassword = trim($_POST['confirm_password'] ?? '');

if(empty($currentPassword)){

    echo json_encode([
        'status'=>'error',
        'message'=>'Current password required'
    ]);
    exit;
}

if(strlen($newPassword) < 8){

    echo json_encode([
        'status'=>'error',
        'message'=>'New password must be at least 8 characters'
    ]);
    exit;
}

if($newPassword !== $confirmPassword){

    echo json_encode([
        'status'=>'error',
        'message'=>'Passwords do not match'
    ]);
    exit;
}

/*
|--------------------------------------------------------------------------
| Get User
|--------------------------------------------------------------------------
*/

$stmt = $db->prepare("
    SELECT id,password
    FROM tbl_users
    WHERE username=?
");

$stmt->bind_param("s",$username);
$stmt->execute();

$user = $stmt->get_result()->fetch_assoc();

if(!$user){

    echo json_encode([
        'status'=>'error',
        'message'=>'User not found'
    ]);
    exit;
}

/*
|--------------------------------------------------------------------------
| Verify Current Password
|--------------------------------------------------------------------------
*/

if(!password_verify($currentPassword, $user['password'])){

    echo json_encode([
        'status'=>'error',
        'message'=>'Current password is incorrect'
    ]);
    exit;
}

/*
|--------------------------------------------------------------------------
| Update Password
|--------------------------------------------------------------------------
*/

$newHash = password_hash(
    $newPassword,
    PASSWORD_DEFAULT
);

$stmt = $db->prepare("
    UPDATE tbl_users
    SET password=?
    WHERE id=?
");

$stmt->bind_param(
    "si",
    $newHash,
    $user['id']
);

if($stmt->execute()){

    echo json_encode([
        'status'=>'success',
        'message'=>'Password changed successfully'
    ]);

}else{

    echo json_encode([
        'status'=>'error',
        'message'=>'Unable to update password'
    ]);

}