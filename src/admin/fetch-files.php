<?php

include '../config.php';

header('Content-Type: application/json');

$draw   = isset($_POST['draw']) ? (int)$_POST['draw'] : 1;
$start  = isset($_POST['start']) ? (int)$_POST['start'] : 0;
$length = isset($_POST['length']) ? (int)$_POST['length'] : 10;

$search = '';

if(isset($_POST['search']['value'])){
    $search = trim($_POST['search']['value']);
}

$where = "WHERE is_deleted = 0";

if(!empty($search)){

    $search = $db->real_escape_string($search);

    $where .= "
        AND (
            file_name LIKE '%{$search}%'
            OR report_no LIKE '%{$search}%'
            OR description LIKE '%{$search}%'
        )
    ";
}

/* Total Records */
$totalQuery = $db->query("
    SELECT COUNT(*) AS total
    FROM uploaded_files
    WHERE is_deleted = 0
");

$totalRecords = (int)$totalQuery->fetch_assoc()['total'];

/* Filtered Records */
$filteredQuery = $db->query("
    SELECT COUNT(*) AS total
    FROM uploaded_files
    $where
");

$filteredRecords = (int)$filteredQuery->fetch_assoc()['total'];

/* Data */
$query = "
    SELECT *
    FROM uploaded_files
    $where
    ORDER BY id DESC
    LIMIT $start, $length
";

$result = $db->query($query);

$data = [];

while($row = $result->fetch_assoc()){

    $data[] = [

        "id" => $row['id'],

        "report_no" => $row['report_no'],

        "file_name" => htmlspecialchars($row['file_name']),

        "report_date" => date(
            'd-m-Y',
            strtotime($row['report_date'])
        ),

        "description" => htmlspecialchars($row['description']),

        "file" => '
            <a href="./uploads/'.$row['uploaded_file'].'"
               target="_blank"
               class="btn btn-info btn-sm">
               View
            </a>
        ',

        "action" => '
            <button class="btn btn-warning btn-sm editBtn"
                data-id="'.$row['id'].'">
                Edit
            </button>

            <button class="btn btn-danger btn-sm deleteBtn"
                data-id="'.$row['id'].'">
                Delete
            </button>
        '
    ];
}

echo json_encode([
    "draw" => (int)$draw,
    "recordsTotal" => (int)$totalRecords,
    "recordsFiltered" => (int)$filteredRecords,
    "data" => $data
]);
exit;

