<?php

require '../controller.php';
$tableSQL = 'subjects';

$data = json_decode(file_get_contents("php://input"), true);
$id = $_GET['id'];
$controller = new Controller($conn, $tableSQL); // Changer selon l'entité
$controller->update($id, $data);
