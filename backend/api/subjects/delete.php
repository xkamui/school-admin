<?php

require '../controller.php';
$tableSQL = 'subjects';

if (!isset($_GET['id'])) {
    echo json_encode(["error" => "ID manquant"]);
    exit;
}

$id = intval($_GET['id']); // Sécuriser l'ID
$controller = new Controller($conn, $tableSQL);
$controller->delete($id);

echo json_encode(["message" => "Suppression réussie"]);