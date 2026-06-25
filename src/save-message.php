<?php

include 'config.php';

header('Content-Type: application/json');

$errors = [];

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

/*
|--------------------------------------------------------------------------
| Server Side Validation
|--------------------------------------------------------------------------
*/

if(empty($name)){
    $errors['name'] = 'Name is required';
}
elseif(strlen($name) < 3){
    $errors['name'] = 'Name must be at least 3 characters';
}

if(empty($email)){
    $errors['email'] = 'Email is required';
}
elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['email'] = 'Invalid email address';
}

if(empty($subject)){
    $errors['subject'] = 'Subject is required';
}
elseif(strlen($subject) < 5){
    $errors['subject'] = 'Subject must be at least 5 characters';
}

if(empty($message)){
    $errors['message'] = 'Message is required';
}
elseif(strlen($message) < 10){
    $errors['message'] = 'Message must be at least 10 characters';
}

if(!empty($errors)){

    echo json_encode([
        'status' => 'error',
        'errors' => $errors
    ]);

    exit;
}

/*
|--------------------------------------------------------------------------
| Save Message
|--------------------------------------------------------------------------
*/

$stmt = $db->prepare("
    INSERT INTO contact_messages
    (
        name,
        email,
        subject,
        message
    )
    VALUES
    (
        ?,?,?,?
    )
");

$stmt->bind_param(
    "ssss",
    $name,
    $email,
    $subject,
    $message
);

if($stmt->execute()){

    echo json_encode([
        'status' => 'success',
        'message' => 'Thank you! Your message has been submitted successfully.'
    ]);

}else{

    echo json_encode([
        'status' => 'error',
        'message' => 'Unable to save message.'
    ]);

}