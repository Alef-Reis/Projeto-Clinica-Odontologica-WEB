<?php
session_start();
include('../login/verifica_login.php');
setlocale(LC_ALL,'pt_BR.UTF8');
?>
<head>

<!--Bootstrap link [Início] -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
 crossorigin="anonymous">
 <!--Bootstrap [Fim]-->

</head>
<body>
<?php
setlocale(LC_ALL,'pt_BR.UTF8');

	// 1 - 	Conectando o PHP no servidor MYSQL
	include '../ArquivoConexaoPhp/conexao.php';
			
	// 2 - Criar a variável com o comando SQL
	$sql = "SELECT fun.NOME_FUNCIONARIO, 
	age.NOME_PACIENTE, 
	age.CODIGO_AGENDAMENTO,
	age.NOME_TRATAMENTO,
	age.DATA_AGENDAMENTO,
	age.HORA_AGENDAMENTO,
	age.CPF_PACIENTE,
	fun.CPF_FUNCIONARIO
	FROM FUNCIONARIO AS fun
	INNER JOIN AGENDAMENTO as age ON fun.CPF_FUNCIONARIO = age.CPF_FUNCIONARIO";
	
	
	/*SELECT * FROM AGENDAMENTO
	INNER JOIN FUNCIONARIO
	UNION AGENDAMENTO.CODIGO_AGENDAMENTO = FUNCIONARIO.CPF_FUNCIONARIO" ;*/


	
	//die($sql);
	
	// 3 - Enviar o comando (variavel $sql) p/o MYSQL
	$registros = mysqli_query($con, $sql) or 
		die("Erro na seleção de dados!!" . 
				mysqli_error($con)  );
	
	// 4 - Contando quantas linhas tem em $registros
	$linhas = mysqli_num_rows($registros);
	
	// tabela vazia ? para e avisa
	if($linhas <1)
		die("Cadastro de funcionários está vazio!");
	
	// Se chegou até aqui é pq tem registros/linhas
	echo "<div  class='alert alert-success col-sm-3 text-center'><b>Registros encontrados: $linhas <br></div>";
	echo "<br>";
	
	// Varrer $registros e mostrar linha a linha
	$contador = 0;
	
	// Exibindo tabela
	echo "<table class='table table-bordered table-hover table-sm table-responsive'>";
	echo "		<thead class='thead-dark'";
	echo "		<tr>";
	echo "			<th>Codigo Agendamento</th>";
	echo "			<th>Nome Tratamento</th>";
	echo "			<th>Data Agendamento</th>";
	echo "			<th>Hora Agendamento</th>";
	echo "			<th>Cpf Dentista</th>";
	echo "			<th>Nome Dentista</th>";
	echo "			<th>Cpf Paciente</th>";
	echo "			<th>Nome Paciente</th>";
	echo "	   		<th colspan='2'>Ações</th>";
	echo "		</tr>";
	echo "		</thead>";

    


	while($contador < $linhas)
	{
		// mostrar uma linha de registro aqui
		// pega uma linha de $registros
		// separar as colunas
		$dados = mysqli_fetch_array($registros);
		
		// mostrar os dados das colunas
		//echo "Código: " . $dados['CPF_FUNCIONARIO'] . "<br>";
		
		// criando variáveis com os dados das cols.
		$id 				= $dados['CODIGO_AGENDAMENTO'];
		$tratamento			= $dados['NOME_TRATAMENTO'];
		$dataAgendamento 	= $dados['DATA_AGENDAMENTO'];
		$horario 			= $dados['HORA_AGENDAMENTO'];
		$cpfDentista		= $dados['CPF_FUNCIONARIO'];
		$nomeDentista		= $dados['NOME_FUNCIONARIO'];
		$cpfPaciente		= $dados['CPF_PACIENTE'];
		$nomePaciente		= $dados['NOME_PACIENTE'];

		// abrir uma nova linha
		echo "<tr>";
		
		// abrir as células
		echo "	<td>$id</td>";
		echo "	<td>$tratamento</td>";
		echo "	<td>$dataAgendamento</td>";
		echo "	<td>$horario</td>";
		echo "	<td>$cpfDentista</td>";
		echo "	<td>$nomeDentista</td>";
		echo "	<td>$cpfPaciente</td>";
		echo "	<td>$nomePaciente</td>";

		echo "  <td> <a href='AgendamentoExcluirCadastro.php?c=$id'>Excluir</a> </td>";
		echo "	<td> <a href='AgendamentoAlteracao.php?c=$id'> Alterar </a> </td>";
		// fechar a linha
		echo "</tr>";
		
		$contador++;
	}
	
	echo "</table>";
	//echo "<br><br>";
	//echo "<b>Listagem Finalizada!!";
	//echo "<br><br>";
?>
<meta charset="utf-8">
		<hr>
		<a href="../ArquivosPaciente/PacienteListagemCadastro.php"><button class="btn btn-primary">Cadastro de Agendamento</button></a>
		<a href="../login/logout.php"><button class="btn btn-primary btn-dark">Sair</button></a>
		<hr>

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</body>