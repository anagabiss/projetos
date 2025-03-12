<?php
$servername = 'localhost';
$username = 'root'; 
$password = ''; 
$database = 'reflorescer_bd';


$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

echo "Conexão bem-sucedida!";


//$mysqli->close();

// Verificando se o banco existe
$db_selected = $mysqli->select_db($database);

if (!$db_selected) {

    include_once 'setup.php';


    $db_selected = $mysqli->select_db($database);
    if (!$db_selected) {
        die("Erro ao conectar ao banco após o setup: " . $mysqli->error);
    }
}

echo "Conexão bem-sucedida!";
?>
?>