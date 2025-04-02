<?php

require '../controller.php';
$controller = new Controller($conn, "schedules"); // Changer selon l'entité
$controller->read();
