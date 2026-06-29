<?php

include '../config.php';

header('Content-Type: application/json');

$id = $_POST['user_id'] ?? '';

$name = trim($_POST['name']);
$username = trim($_POST['username']);
$email = trim($_POST['email']);
$mobile = trim($_POST['mobile']);
$status = (int)$_POST['status'];

if(strlen($name)<3){

    die(json_encode([
        'status'=>'error',
        'message'=>'Invalid name'
    ]));
}

if(strlen($username)<3){

    die(json_encode([
        'status'=>'error',
        'message'=>'Invalid username'
    ]));
}

/*
|--------------------------------------------------------------------------
| Duplicate Username
|--------------------------------------------------------------------------
*/

$stmt = $db->prepare("
SELECT id
FROM tbl_users
WHERE username=?
AND id!=?
");

$userId = $id ?: 0;

$stmt->bind_param(
    "si",
    $username,
    $userId
);

$stmt->execute();

$stmt->store_result();

if($stmt->num_rows>0){

    die(json_encode([
        'status'=>'error',
        'message'=>'Username already exists'
    ]));
}

/*
|--------------------------------------------------------------------------
| Insert
|--------------------------------------------------------------------------
*/

if(empty($id)){

    $password =
    password_hash(
        'Accura@2026',
        PASSWORD_DEFAULT
    );

    $stmt=$db->prepare("
        INSERT INTO tbl_users
        (
            name,
            username,
            mobile,
            email,
            password,
            status
        )
        VALUES
        (
            ?,?,?,?,?,?
        )
    ");

    $stmt->bind_param(
        "sssssi",
        $name,
        $username,
        $mobile,
        $email,
        $password,
        $status
    );

    $msg =
    'User created successfully. Default password: Accura@2026';
}
else{

    $stmt=$db->prepare("
        UPDATE tbl_users
        SET
            name=?,
            username=?,
            mobile=?,
            email=?,
            status=?,
            update_at=NOW()
        WHERE id=?
    ");

    $stmt->bind_param(
        "ssssii",
        $name,
        $username,
        $mobile,
        $email,
        $status,
        $id
    );

    $msg='User updated successfully';
}

$stmt->execute();

echo json_encode([
    'status'=>'success',
    'message'=>$msg
]);