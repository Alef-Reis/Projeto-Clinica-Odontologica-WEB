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

<form action="PacienteListagemCadastro.php" method="post">
			<div class="input-group" >
			<input type="text" name="txt_pesquisa" class="form-control" placeholder="Pesquise pelo Nome ou Cpf">
			<div class="input-group-btn">
			<input type="submit" value="pesquisar" class="btn btn-primary">
			</div>
			</div>
		</form>
<?php 
setlocale(LC_ALL,'pt_BR.UTF8');

	$txt_pesquisa = (isset($_POST["txt_pesquisa"]))?$_POST["txt_pesquisa"]:"";

	// 1 - 	Conectando o PHP no servidor MYSQL
	include '../ArquivoConexaoPhp/conexao.php';
			
	// 2 - Criar a variável com o comando SQL
	$sql = "SELECT * FROM PACIENTE
	WHERE CPF_PACIENTE='{$txt_pesquisa}' or NOME_PACIENTE 
	LIKE '%{$txt_pesquisa}%' Order by NOME_PACIENTE" ;
	
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
	
	// Varrer $registros e mostrar linha a linha
	$contador = 0;
	
	// Exibindo tabela
	echo "<table class='table table-bordered table-hover table-sm table-responsive'>";
	echo "		<thead class='thead-dark'";
	echo "		<tr>";
	echo "			<th>Cpf</th>";
	echo "			<th>Nome</th>";
	echo "			<th>Rg</th>";
	echo "			<th>Data de Nascimento</th>";
	echo "			<th>Data de Cadastro</th>";
	echo "			<th>E-mail</th>";
	echo "			<th>Telefone</th>";
	echo "			<th>Cep</th>";
	echo "			<th>Endereço</th>";
	echo "			<th>Número</th>";
	echo "			<th>Bairro</th>";
	echo "			<th>Cidade</th>";
	echo "			<th>Estado</th>";
	echo "			<th>Observações</th>";
	echo "			<th>Nome Responsável</th>";
	echo "			<th>Telefone Responsável</th>";
	echo "			<th>Genêro</th>";
	echo "	   		<th colspan='4' class='text-center'>Ações</th>";
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
        $cpf    		= $dados['CPF_PACIENTE'];
		$nome           = $dados['NOME_PACIENTE'];
		$rg		        = $dados['RG_PACIENTE'];
		$dataNasc		= $dados['DATA_NASCIMENTO_PACIENTE'];
		$dataCad	    = $dados['DATA_CADASTRO_PACIENTE'];
		$email          = $dados['EMAIL_PACIENTE'];
		$telefone       = $dados['TELEFONE_PACIENTE'];
		$cep            = $dados['CEP_PACIENTE'];
		$endereco       = $dados['ENDERECO_PACIENTE'];
		$numeroCasa     = $dados['NUMERO_ENDERECO_PACIENTE'];
		$bairro         = $dados['BAIRRO_PACIENTE'];
		$cidade         = $dados['CIDADE_PACIENTE'];
		$uf	            = $dados['UF_PACIENTE'];
		$obs	        = $dados['COMPLEMENTO_PACIENTE'];
		$nomeResp       = $dados['NOME_RESPONSAVEL_PACIENTE'];
		$telefoneResp   = $dados['TELEFONE_RESPONSAVEL_PACIENTE'];
        $genero         = $dados['SEXO_PACIENTE'];            
		// abrir uma nova linha
		echo "<tr>";
		
		// abrir as células
		echo "	<td>$cpf</td>";
		echo "	<td>$nome</td>";
		echo "	<td>$rg</td>";
		echo "	<td>$dataNasc</td>";
		echo "	<td>$dataCad</td>";
		echo "	<td>$email</td>";
		echo "	<td>$telefone</td>";
		echo "	<td>$cep</td>";
		echo "	<td>$endereco</td>";
		echo "	<td>$numeroCasa</td>";
		echo "	<td>$bairro</td>";
		echo "	<td>$cidade</td>";
		echo "	<td>$uf</td>";
		echo "	<td>$obs</td>";
		echo "	<td>$nomeResp</td>";
		echo "	<td>$telefoneResp</td>";
		echo "	<td>$genero</td>";

		echo "  <td> <a href='PacienteExcluirCadastro.php?c=$cpf'>Excluir</a> </td>";
		echo "	<td> <a href='PacienteAlteracao.php?c=$cpf'> Alterar </a> </td>";
		echo "	<td> <a href='../ArquivosAgendamento/cadastroAgendamento.php?c=$cpf'> Agendar </a> </td>";

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
		<a href="cadastroPaciente.html"><button class="btn btn-primary">Cadastrar Paciente</button></a>
		<a href="../login/logout.php"><button class="btn btn-primary btn-dark">Sair</button></a>
		<hr>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>