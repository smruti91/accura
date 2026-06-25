<?php

include '../config.php';

$id = (int)$_POST['id'];

$file = $db->query("
SELECT uploaded_file
FROM uploaded_files
WHERE id=$id
")->fetch_assoc();

if($file){
    @unlink('./uploads/'.$file['uploaded_file']);
}

$db->query("
DELETE FROM uploaded_files
WHERE id=$id
");
if($db->affected_rows > 0){
    $response = [
        'status' => 'success',
        'message' => 'File deleted successfully'
    ];
}else{
    $response = [
        'status' => 'error',
        'message' => 'File not found'
    ];
}
// sned json response
header('Content-Type: application/json');
echo json_encode($response);

