	<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('HOST', 'localhost:3306');
define('USER', 'root');
define('PASS', '');
define('BASE', 'concessionaria6162m');

$conn = new mysqli(HOST, USER, PASS, BASE);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
