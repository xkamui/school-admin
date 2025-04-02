<?php

require '../controller.php';
$controller = new Controller($conn, "meals"); // Changer selon l'entité
$controller->read();
