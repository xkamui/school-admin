<?php

require '../controller.php';
$tableSQL = 'subjects';

$controller = new Controller($conn, $tableSQL);
$controller->read_all();
