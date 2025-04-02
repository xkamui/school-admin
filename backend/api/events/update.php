<?php

require '../controller.php';
$data = json_decode(file_get_contents("php://input"), true);
$id = $_GET['id'];
$controller = new Controller($conn, "events"); // Changer selon l'entité
$controller->update($id, $data);
