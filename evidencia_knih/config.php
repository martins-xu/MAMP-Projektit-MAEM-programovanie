<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "evidencia_knih";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Chyba pripojenia k databáze: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");
?>