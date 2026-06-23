<?php

include '../config.php';

$id = (int)$_GET['id'];

$file = $db->query("
SELECT uploaded_file
FROM uploaded_files
WHERE id=$id
")->fetch_assoc();

if($file){
    @unlink('uploads/'.$file['uploaded_file']);
}

$db->query("
DELETE FROM uploaded_files
WHERE id=$id
");
echo "<script>
alert('Deleted Successfully');
window.location='dashboard.php';
</script>";

header("Location: dashboard.php");