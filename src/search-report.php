<?php

include 'config.php';

header('Content-Type: application/json');

$reportNo = trim($_POST['report_no'] ?? '');

if(empty($reportNo)){

    echo json_encode([
        'status'=>'error',
        'message'=>'Please enter report number'
    ]);

    exit;
}

$stmt = $db->prepare("
    SELECT *
    FROM uploaded_files
    WHERE report_no = ?
    AND is_deleted = 0
    LIMIT 1
");

$stmt->bind_param("s",$reportNo);

$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows == 0){

    echo json_encode([
        'status'=>'error',
        'message'=>'Report not found'
    ]);

    exit;
}

$row = $result->fetch_assoc();

echo json_encode([

    'status'=>'success',

    'data'=>[

        'report_no'=>$row['report_no'],

        'file_name'=>$row['file_name'],

        'report_date'=>date(
            'd-m-Y',
            strtotime($row['report_date'])
        ),

        'description'=>$row['description'],

        'file_url'=>'admin/uploads/'.$row['uploaded_file']

    ]

]);