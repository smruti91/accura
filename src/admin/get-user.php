<?php

include '../config.php';

$id=(int)$_GET['id'];

$result=$db->query("
SELECT *
FROM tbl_users
WHERE id=$id
");

echo json_encode(
    $result->fetch_assoc()
);