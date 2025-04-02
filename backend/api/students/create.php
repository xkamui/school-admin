<?php

require '../controller.php';
$tableSQL = 'students';

$data = $_POST;
$file = $_FILES['photo'] ?? null;

if ($file && $file['error'] === UPLOAD_ERR_OK) {
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = uniqid('student_') . '.' . $ext;
    $uploadPath = '../../uploads/' . $filename;

    move_uploaded_file($file['tmp_name'], $uploadPath);
    $data['photo'] = $filename;
}

$controller = new Controller($conn, $tableSQL); // Changer selon l'entité
$controller->create($data);
