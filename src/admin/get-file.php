<?php

include '../config.php';

$id = (int)$_GET['id'];

$stmt = $db->prepare("
    SELECT *
    FROM uploaded_files
    WHERE id = ?
");

$stmt->bind_param("i",$id);
$stmt->execute();

$result = $stmt->get_result();

echo json_encode(
    $result->fetch_assoc()
);