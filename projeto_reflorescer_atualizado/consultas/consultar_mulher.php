<?php
include_once('../conexao/conexao.php');

$sql_vitimas= "SELECT * FROM tbl_vitimas";
$query_vitimas = $mysql->query($sql_vitimas) or die ($msqli->error);
$qtd_vitimas = $query_aluno->num_rows;

?>