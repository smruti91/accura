<?php

include '../config.php';

$id = (int)$_GET['id'];

$db->query("
UPDATE contact_messages
SET status=1
WHERE id=$id
");

$result = $db->query("
SELECT *
FROM contact_messages
WHERE id=$id
");

echo json_encode(
$result->fetch_assoc()
);