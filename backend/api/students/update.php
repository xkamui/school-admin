<?php
require '../controller.php';

$tableSQL = 'students';
$id = $_GET['id'] ?? null;

if (!$id) {
    echo json_encode(["error" => "ID manquant"]);
    exit;
}

$data = $_POST;
$file = $_FILES['photo'] ?? null;

if ($file && $file['error'] === UPLOAD_ERR_OK) {
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = uniqid('student_') . '.' . $ext;
    $uploadPath = '../../uploads/' . $filename;

    move_uploaded_file($file['tmp_name'], $uploadPath);
    $data['photo'] = $filename;
}

$controller = new Controller($conn, $tableSQL);
$controller->update($id, $data);