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
	$comandoSQL="DELETE FROM PACIENTE WHERE CPF_PACIENTE=$codigo";
	
	// Exibindo o comando na tela para copiar e testar no console
	//die($sql);
	echo "<h3>Ops algo deu errado, tente novamente por favor</h3>";
	echo "<a href='paginaListaPacientes.php'><button>Voltar para listagem de pacientes</button></a>";
	echo "<br><br>";
	
	//3 - Mandar o MYSQL executar o comando ($sql)
	$registros = mysqli_query($con, $comandoSQL)
	or die("Erro na execução do comando de seleção de dados do MySQL:" . mysqli_error($con) ) ;
	
	
// Sucesso!

//Carregar por 3 segundos.
sleep(3);

//Redirecionar
header('Location: paginaListaPacientes.php');

//Saindo e finalizando script
exit;

		

?>