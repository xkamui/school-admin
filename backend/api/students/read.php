<?php

require '../controller.php';
$tableSQL = 'students';

$controller = new Controller($conn, $tableSQL);
$controller->read();
