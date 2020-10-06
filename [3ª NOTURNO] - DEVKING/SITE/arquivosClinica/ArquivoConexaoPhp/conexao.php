<?php
// Conectando-se ao Servidor MYSQL
$url = 'localhost:3308';
$user='root';
$password='';
$con = mysqli_connect($url, $user, $password);

// Abrindo o banco de dados
$db = 'CLINICA_ODONTOLOGICA';
mysqli_select_db($con, $db) or die('Erro na abertura do banco de
dados $db:' . mysqli_error($con) );
?>