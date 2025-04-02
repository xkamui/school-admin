<?php

require '../controller.php';
$controller = new Controller($conn, "events"); // Changer selon l'entité
$controller->read();
