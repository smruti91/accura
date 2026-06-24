<?php
include '../config.php';
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $fileName    = trim($_POST['file_name']);
    $reportDate  = $_POST['report_date'];
    $description = trim($_POST['description']);

    $file = $_FILES['upload_file'];

    // 10MB limit
    $maxSize = 10 * 1024 * 1024;

    if($file['size'] > $maxSize){
        echo json_encode([
            "status" => "error",
            "message" => "File size must be less than 10MB"
        ]);
        exit;
    }

    $allowed = ['pdf','xls','xlsx'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if(!in_array($ext,$allowed)){
        echo json_encode([
            "status" => "error",
            "message" => "Only PDF, XLS, XLSX allowed"
        ]);
        exit;
    }

    // Generate 10 digit unique number
    // $reportNo = str_pad(mt_rand(1000000000, 9999999999), 10, '0', STR_PAD_LEFT);

    function generateReportNo($length = 10)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $reportNo = '';

        for ($i = 0; $i < $length; $i++) {
            $reportNo .= $characters[random_int(0, strlen($characters) - 1)];
        }

        return $reportNo;
    }

    $reportNo = generateReportNo();

    $newFile = time().'_'.$file['name'];
    $path = "uploads/".$newFile;

    if(move_uploaded_file($file['tmp_name'],$path)){

        $stmt = $db->prepare("
            INSERT INTO uploaded_files
            (report_no,file_name,report_date,description,uploaded_file,is_deleted)
            VALUES (?,?,?,?,?,0)
        ");

        $stmt->bind_param(
            "sssss",
            $reportNo,
            $fileName,
            $reportDate,
            $description,
            $newFile
        );

        $stmt->execute();

        echo json_encode([
            "status" => "success",
            "message" => "File uploaded successfully",
            "report_no" => $reportNo
        ]);

    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Upload failed"
        ]);
    }
}
