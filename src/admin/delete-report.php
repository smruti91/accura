<?php

include '../config.php';

header('Content-Type: application/json');

$id = (int)$_POST['id'];

$stmt = $db->prepare("
    SELECT uploaded_file
    FROM uploaded_files
    WHERE id = ?
");

$stmt->bind_param("i", $id);
$stmt->execute();

$row = $stmt->get_result()->fetch_assoc();

if (!$row) {

    echo json_encode([
        'status' => 'error',
        'message' => 'Record not found'
    ]);
    exit;
}

if (!empty($row['uploaded_file'])) {

    $filePath = './uploads/' . $row['uploaded_file'];

    if (file_exists($filePath)) {
        unlink($filePath);
    }
}

$stmt = $db->prepare("
    UPDATE uploaded_files
    SET uploaded_file=''
    WHERE id=?
");

$stmt->bind_param("i", $id);
$stmt->execute();

echo json_encode([
    'status' => 'success',
    'message' => 'Report removed successfully'
]);