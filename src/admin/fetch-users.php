<?php

include '../config.php';

$draw = $_POST['draw'];
$start = $_POST['start'];
$length = $_POST['length'];

$total = $db->query("
    SELECT COUNT(*) total
    FROM tbl_users
")->fetch_assoc()['total'];

$result = $db->query("
    SELECT *
    FROM tbl_users
    ORDER BY id DESC
    LIMIT $start,$length
");

$data = [];

while($row = $result->fetch_assoc()){

   $status =
$row['status']==1
?
'<span class="badge bg-success">Active</span>'
:
'<span class="badge bg-danger">Inactive</span>';

$data[] = [

    "id"=>$row['id'],
    "name"=>$row['name'],
    "user_name"=>$row['username'],
    "email"=>$row['email'],
    "phone"=>$row['mobile'],
    "status"=>$status,
    "created_at"=>$row['created_at'],

    "action"=>'

        <button
        class="btn btn-warning btn-sm editBtn"
        data-id="'.$row['id'].'">

        <i class="fa fa-edit"></i>

        </button>

        <button
        class="btn btn-danger btn-sm deleteBtn"
        data-id="'.$row['id'].'">

        <i class="fa fa-trash"></i>

        </button>
    '
];
}

echo json_encode([
    "draw"=>$draw,
    "recordsTotal"=>$total,
    "recordsFiltered"=>$total,
    "data"=>$data
]);