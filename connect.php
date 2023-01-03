<?php

/**
 * Realizando a conexão com o BD
 */

$host = "localhost";
$dbUser = "root";
$dbPassword = "";
$database = "crud-php-mysql";

$conn = new mysqli($host, $dbUser, $dbPassword, $database);

if ($conn->error) {
    die("A Conexão Falhou: " . $coonn->error);
}
