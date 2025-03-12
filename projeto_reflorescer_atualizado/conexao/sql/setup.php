<?php
include_once 'conexao.php';

$sql = "
CREATE DATABASE IF NOT EXISTS reflorescer_bd;
USE reflorescer_bd;

CREATE TABLE IF NOT EXISTS tbl_usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    data_nascimento DATE NOT NULL,
    telefone VARCHAR(15) NOT NULL
);

SELECT 'Setup concluído com sucesso!' AS mensagem;
";

if ($mysqli->multi_query($sql)) {
    echo "Banco de dados e tabelas configurados com sucesso!";
} else {
    echo "Erro ao configurar banco de dados: " . $mysqli->error;
}
?>
