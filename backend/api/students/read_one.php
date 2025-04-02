<?php

require '../controller.php';
$tableSQL = 'students';

if (!isset($_GET['id'])) {
    echo json_encode(["error" => "ID manquant"]);
    exit;
}

$id = intval($_GET['id']);
$controller = new Controller($conn, $tableSQL);
$controller->read_one($id);
