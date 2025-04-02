<?php

require '../controller.php';
$data = json_decode(file_get_contents("php://input"), true);
$controller = new Controller($conn, "subjects"); // Changer selon l'entité
$controller->create($data);
