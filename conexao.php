<?php 

/*CONECTANDO COM O BANCO DE DADOS NA TABELA 'LOGIN' */
$usuario = 'root';
$senha = '';
$database = 'login';
$host = 'localhost';


$mysqli = new mysqli($host, $usuario, $senha, $database);
//IF PARA TESTAR SE A CONEXAO FUNCIONOU
if($mysqli->error){
    die("Falha ao conectar o banco de dados? " . $mysqli->error);
} 
?>