<?php
$servidor = "host=localhost port=5432 dbname=cygni user=postgres password=root";
$usuario = "postgres";
$senha = "root";

$conexao = pg_connect($servidor) or die ("Nao foi possivel conectar ao servidor PostGreSQL");
?>