<?php
session_start();
include('../login/verifica_login.php');
setlocale(LC_ALL,'pt_BR.UTF8');
?>
<h3>Olá, <?php echo $_SESSION['usuario'];?></h3>

<?php	

	
	
	//recebendo os dados em variáveis
	$tratamento			= $_POST['tratamento'];
	$dataAgendamento 	= $_POST['dataAgendamento'];
	$horario 			= $_POST['horario'];
	$nomeDentista		= $_POST['nomeDentista'];
	$cpfPaciente		= $_POST['cpfPaciente'];
	$nomePaciente		= $_POST['nomePaciente'];
			
		
	
	// Exibindo dados (variáveis) na tela
	echo "Tratamento: $tratamento <br>";
	echo "Data de Agendamento: $dataAgendamento <br>";
	echo "Horário: $horario <br>";
	echo "Nome do Dentista: $nomeDentista <br>" ;
	echo "Cpf do Paciente: $cpfPaciente <br>" ;
	echo "Nome do Paciente: $nomePaciente <br>" ;
	echo "<hr>";

/*	
	//1 - Usuário com tamamanho máximo de 12 caracteres.
	if (strlen($usuario) > 12 )
	{
		echo "<h2>Usuário com mais de 12 caracteres digitados</h2><br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	//1.1 - Usuário não pode ter menos que 1 caractere.
	elseif (strlen($usuario) < 1 )
	{
		echo "<h2>Usuário com menos de 1 caracteres digitados</h2><br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	
	//2 - Senha com tamamanho máximo de 8 caracteres.
	if (strlen($senha) > 8)
	{
		echo "<h2>Senha com mais de 8 caracteres digitados</h2><br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	//2.1 - Senha não pode ficar em branco.
	elseif ($senha=="")
	{
		echo "<h2>Campo senha em branco</h2><br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	
	//3 - Verificaçao de email digitado com o campo de confirmação E-mail.
	if($email != $email1)
	{
		echo"<h2>Email diferente do campo | E-mail (Confirmação)</h2>.<br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	//3.1 - E-mail não pode ser maior que 40 caracteres ou vazio.
	if ((strlen($email) > 40) || ($email==""))
	{
		echo "<h2>E-mail não pode ser maior que 40 caracteres digitados <br> ou em branco</h2><br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	
	//4 - Nome não pode ser maior que 25 caracteres.
	if (strlen($nome) > 25)
	{
		echo "<h2>Nome com mais de 25 caracteres digitados</h2><br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	//4.1 - Nome não pode ficar em branco.
	elseif ($nome=="")
	{
		echo "<h2>Campo nome em branco</h2><br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	
	//5 - Sobrenome não pode ficar em branco.
	if ($sobrenome=="")
	{
		echo"<h2>Preencha o campo Sobrenome</h2>.<br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	//5.1 - Sobrenome não pode ser maior que 35 caracteres.
	if (strlen($sobrenome) > 35)
	{
		echo "<h2>Sobrenome com mais de 35 caracteres digitados</h2><br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	
	//6 - Cpf ou Cnpj não pode ficar em branco.
	if ($cpfCnpj=="")
	{
		echo"<h2>Preencha o campo Cpf ou Cnpj</h2>.<br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	//6.1 - Cpf ou Cnpj não pode ser maior que 25 caracteres.
	if (strlen($cpfCnpj) > 25)
	{
		echo "<h2>Cpf ou Cnpj com mais de 25 caracteres digitados</h2><br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	
	//7 - Tipo de pessoa não pode ficar em branco.
	if ($tipoPessoa=="")
	{
		echo"<h2>Tipo de pessoa não selecionado</h2>.<br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	
	//8 - Gênero não pode ficar em branco.
	if ($genero=="")
	{
		echo"<h2>Genero não pode ficar vazio</h2>.<br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	
	//9 - Data de nascimento não pode ficar em branco.
	if ($dataNasc=="")
	{
		echo"<h2>Data de nascimento não pode ficar em branco</h2>.<br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	
	//10 - Telefone não pode ficar em branco.
	if ($telefone=="")
	{
		echo"<h2>Telefone não pode ficar em branco - Formato: 11-123456789</h2>.<br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	//10.1 - telefone não pode ser maior que 12 caracteres.
	if (strlen($telefone) > 12)
	{
		echo "<h2>Telefone não pode ter mais que 12 caracteres</h2><br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	
	//11 - Endereço não pode ficar em branco.
	if ($end=="")
	{
		echo"<h2>Endereço não pode ficar em branco</h2>.<br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	//11.1 - Endereço não pode ter mais de 60 caracteres digitados.
	if (strlen($end) > 60)
	{
		echo "<h2>Endereço não pode ter mais de 60 caracteres digitados</h2><br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	
	//12 - Complemento não pode ficar em branco.
	if ($comple=="")
	{
		echo"<h2>Complemento não pode ficar em branco</h2><br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	//12.1 - Complemento não pode ter mais de 40 caracteres digitados.
	if (strlen($comple) > 40)
	{
		echo "<h2>Complemento não pode ter mais que 40 caracteres digitados</h2><br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	
	//13 - Campo Cidade não pode ficar em branco.
	if ($cidade=="")
	{
		echo"<h2>Cidade não pode ficar em branco</h2><br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	//13.1 - Cidade não pode ter mais de 25 caracteres digitados.
	if (strlen($cidade) > 25)
	{
		echo "<h2>Cidade não pode ter mais que 25 caracteres digitados</h2><br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	
	//14 - Campo Uf não pode ficar em branco.
	if ($uf=="")
	{
		echo"<h2>Uf não pode ficar em branco</h2><br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	//14.1 - Uf não pode ter mais de 2 caracteres digitados.
	if (strlen($uf) > 2)
	{
		echo "<h2>Uf não pode ter mais de 2 caracteres digitados</h2><br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	
	//15 - Campo Cep não pode ficar em branco.
	if ($cep=="")
	{
		echo"<h2>Cep não pode ficar em branco</h2><br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	//15.1 - Cep não pode ter mais de 8 caracteres digitados.
	if (strlen($cep) > 8)
	{
		echo "<h2>Cep não pode ter mais de 8 caracteres digitados</h2><br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	
	//16 - Campo observações não pode ficar em branco.
	if ($obs=="")
	{
		echo"<h2>Observações não pode ficar em branco</h2><br>";
		die("Programa cancelado <br> <a href='cadastroLogin.html'>Cadastre-se novamente</a>");
	}
	
	*/
	


	// 1 - 	Conectando o PHP no servidor MYSQL
	include '../ArquivoConexaoPhp/conexao.php';
	
	// 2 - Criar o comando de INSERT (numa variável)
	$sql = 
	"INSERT INTO AGENDAMENTO
	(
	NOME_TRATAMENTO,
	DATA_AGENDAMENTO,
	HORA_AGENDAMENTO,
	CPF_FUNCIONARIO,
	CPF_PACIENTE,
	NOME_PACIENTE

	) VALUES

	 
	('$tratamento', '$dataAgendamento', '$horario', '$nomeDentista', '$cpfPaciente', '$nomePaciente')";

	echo "Comando SQL: <br> $sql <hr>";
	
	// 3 - Enviar o comando sql para o MYSQL
	mysqli_query($con, $sql);
	
	echo "Registro gravado com sucesso!";
	
?>
	<meta charset="utf-8">
	<hr>
	<a href="cadastradoLogin.html"><button>Cadastro de Login</button></a>
	<a href="FuncionarioListagemCadastro.php"><button>Listagem de Cadastros</button></a>
	<a href="../login/logout.php"><button>Sair</button></a>
	<hr>