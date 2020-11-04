<?php
session_start();
include("../ArquivoConexaoPhp/conexao.php");

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: ../index.php');
	exit();
}

$usuario = mysqli_real_escape_string($con, $_POST['usuario']);
$senha = mysqli_real_escape_string($con, $_POST['senha']);

$query = "select usuario from FUNCIONARIO where usuario = '{$usuario}' and senha = ('{$senha}')";

$result = mysqli_query($con, $query);

$row = mysqli_num_rows($result);



if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	header('Location: ../ArquivosPaciente/paginaListaPacientes.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: ../index.php');
	exit();
}



