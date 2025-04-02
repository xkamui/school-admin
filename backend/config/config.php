<?php

$host = "localhost";
$username = "root"; // Modifier selon tes besoins
$password = "";
$database = "school_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}
