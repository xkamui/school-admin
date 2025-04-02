<?php

require '../controller.php';
$tableSQL = 'subjects';
$data = json_decode(file_get_contents("php://input"), true);
$controller = new Controller($conn, $tableSQL); // Changer selon l'entité
$controller->create($data);
