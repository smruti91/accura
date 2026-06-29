<?php

include '../config.php';

$id=(int)$_POST['id'];

$stmt=$db->prepare("
UPDATE tbl_users
SET
    status=2,
    update_at=NOW()
WHERE id=?
");

$stmt->bind_param(
    "i",
    $id
);

$stmt->execute();

echo json_encode([
    'status'=>'success'
]);