<?php
session_start();
include('../login/verifica_login.php');
setlocale(LC_ALL,'pt_BR.UTF8');
?>
<h3>Olá, <?php echo $_SESSION['usuario'];?></h3>

<?php

	setlocale(LC_ALL,'pt_BR.UTF8');

	$codigo = $_GET['c'];
	
	echo "Eliminando login código: $codigo <br>";
	
	// 1 - 	Conectando o PHP no servidor MYSQL
	include '../ArquivoConexaoPhp/conexao.php';
				
	// 2 - Criar a variável c/ comando de exclusão
	$comandoSQL="DELETE FROM FUNCIONARIO WHERE CPF_FUNCIONARIO=$codigo";
	
	// Testando o comando (Deixar comentado)
	//die($sql);
	
	//3 - Mandar o MYSQL executar o comando ($sql)
	$registros = mysqli_query($con, $comandoSQL)
	or die("Erro na execução do comando de seleção de dados do MySQL:" . mysqli_error($con) ) ;
	
	
	// Se chegou aqui - excluiu
	echo "Login $codigo excluído com sucesso. <hr>";
	echo "<hr>";
		echo "<a href='listagemLogin.php'><button>Listagem de Logins</button></a>";
		echo "<br><br>";
		echo "<a href='../login/logout.php'><button>Sair</button></a>";
		echo "<hr>";
?>