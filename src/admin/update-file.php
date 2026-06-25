<?php

include '../config.php';

header('Content-Type: application/json');

$id = (int)$_POST['id'];
$fileName = trim($_POST['file_name']);
$reportDate = $_POST['report_date'];
$description = trim($_POST['description']);

$stmt = $db->prepare("
    SELECT uploaded_file
    FROM uploaded_files
    WHERE id = ?
");
$stmt->bind_param("i", $id);
$stmt->execute();

$current = $stmt->get_result()->fetch_assoc();

if (!$current) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Record not found'
    ]);
    exit;
}

$currentFile = $current['uploaded_file'];
$newFileName = $currentFile;

/*
|--------------------------------------------------------------------------
| CASE 1 & 2 & 3
|--------------------------------------------------------------------------
| If new file uploaded:
|   Delete old file (if exists)
|   Save new file
|
| If no new file uploaded:
|   Keep existing file value
|--------------------------------------------------------------------------
*/

if (
    isset($_FILES['upload_file']) &&
    $_FILES['upload_file']['error'] === 0
) {

    $allowed = ['pdf', 'xls', 'xlsx'];

    $ext = strtolower(
        pathinfo(
            $_FILES['upload_file']['name'],
            PATHINFO_EXTENSION
        )
    );

    if (!in_array($ext, $allowed)) {

        echo json_encode([
            'status' => 'error',
            'message' => 'Only PDF, XLS and XLSX files allowed'
        ]);
        exit;
    }

    // 10MB Validation
    if ($_FILES['upload_file']['size'] > 10 * 1024 * 1024) {

        echo json_encode([
            'status' => 'error',
            'message' => 'File size cannot exceed 10 MB'
        ]);
        exit;
    }

    // Delete old file if exists
    if (
        !empty($currentFile) &&
        file_exists('./uploads/' . $currentFile)
    ) {
        unlink('./uploads/' . $currentFile);
    }

    // Upload new file
    $newFileName =
        time() . '_' .
        preg_replace(
            '/[^A-Za-z0-9\.\-_]/',
            '',
            $_FILES['upload_file']['name']
        );

    move_uploaded_file(
        $_FILES['upload_file']['tmp_name'],
        './uploads/' . $newFileName
    );
}

/*
|--------------------------------------------------------------------------
| Update Record
|--------------------------------------------------------------------------
*/

$stmt = $db->prepare("
    UPDATE uploaded_files
    SET
        file_name = ?,
        report_date = ?,
        description = ?,
        uploaded_file = ?
    WHERE id = ?
");

$stmt->bind_param(
    "ssssi",
    $fileName,
    $reportDate,
    $description,
    $newFileName,
    $id
);

if ($stmt->execute()) {

    echo json_encode([
        'status' => 'success',
        'message' => 'Report updated successfully'
    ]);

} else {

    echo json_encode([
        'status' => 'error',
        'message' => 'Failed to update report'
    ]);
}