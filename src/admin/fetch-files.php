<?php
include '../config.php';

$start  = $_POST['start'];
$length = $_POST['length'];
$search = $_POST['search']['value'];

$where = "WHERE is_deleted = 0";

if(!empty($search)){
    $where .= " AND (file_name LIKE '%$search%' OR report_no LIKE '%$search%')";
}

$total = $db->query("SELECT COUNT(*) as count FROM uploaded_files WHERE is_deleted=0")->fetch_assoc()['count'];

$data = $db->query("
    SELECT * FROM uploaded_files
    $where
    ORDER BY id DESC
    LIMIT $start,$length
");

$result = [];

while($row = $data->fetch_assoc()){

    $result[] = [
        "id" => $row['id'],
        "report_no" => $row['report_no'],
        "file_name" => $row['file_name'],
        "report_date" => $row['report_date'],
        "description" => $row['description'],
        "file" => '<a class="btn btn-info btn-sm" target="_blank" href="uploads/'.$row['uploaded_file'].'">View</a>',
        "action" => '
            <a href="edit.php?id='.$row['id'].'" class="btn btn-warning btn-sm">Edit</a>
            <a href="delete.php?id='.$row['id'].'" class="btn btn-danger btn-sm">Delete</a>
        '
    ];
}

echo json_encode([
    "draw" => intval($_POST['draw']),
    "recordsTotal" => $total,
    "recordsFiltered" => $total,
    "data" => $result
]);
