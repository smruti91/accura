<?php

include '../config.php';

$draw = $_POST['draw'];
$start = $_POST['start'];
$length = $_POST['length'];

$total = $db->query("
    SELECT COUNT(*) total
    FROM contact_messages
")->fetch_assoc()['total'];

$result = $db->query("
    SELECT *
    FROM contact_messages
    ORDER BY id DESC
    LIMIT $start,$length
");

$data = [];

while($row = $result->fetch_assoc()){

    $status =
    $row['status'] == 0
    ?
    '<span class="badge bg-danger">Unread</span>'
    :
    '<span class="badge bg-success">Read</span>';

    $data[] = [

        "id"=>$row['id'],

        "name"=>$row['name'],

        "email"=>$row['email'],

        "subject"=>$row['subject'],

        "status"=>$status,

        "created_at"=>$row['created_at'],

        "action"=>'
        <button
        class="btn btn-primary btn-sm viewBtn"
        data-id="'.$row['id'].'">

        View

        </button>'
    ];
}

echo json_encode([
    "draw"=>$draw,
    "recordsTotal"=>$total,
    "recordsFiltered"=>$total,
    "data"=>$data
]);