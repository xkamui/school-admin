<?php

require '../controller.php';
$controller = new Controller($conn, "subjects"); // Changer selon l'entité
$controller->read();
