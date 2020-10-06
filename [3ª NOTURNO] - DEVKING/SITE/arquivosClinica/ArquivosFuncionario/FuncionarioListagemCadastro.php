<?php
session_start();
include('../login/verifica_login.php');
setlocale(LC_ALL,'pt_BR.UTF8');
?>
<h3>Olá, <?php echo $_SESSION['usuario'];?></h3>

<?php
setlocale(LC_ALL,'pt_BR.UTF8');

	// 1 - 	Conectando o PHP no servidor MYSQL
	include '../ArquivoConexaoPhp/conexao.php';
			
	// 2 - Criar a variável com o comando SQL
	$sql = "SELECT * FROM funcionario";
	
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
	echo "<b>Registros encontrados: $linhas <br>";
	echo "<br>";
	
	// Varrer $registros e mostrar linha a linha
	$contador = 0;
	
	// Exibindo tabela
	echo "<table border='1'>";
	echo "		<tr>";
	echo "			<th>Usuário</th>";
	echo "			<th>Senha</th>";
	echo "			<th>Cpf</th>";
	echo "			<th>Nome</th>";
	echo "			<th>Profissão</th>";
	echo "			<th>Rg</th>";
	echo "			<th>Data de Nascimento</th>";
	echo "			<th>Data de Cadastro</th>";
	echo "			<th>E-mail</th>";
	echo "			<th>Cep</th>";
	echo "			<th>Endereço</th>";
	echo "			<th>Número</th>";
	echo "			<th>Bairro</th>";
	echo "			<th>Cidade</th>";
	echo "			<th>Estado</th>";
	echo "			<th>Observações</th>";
	echo "			<th>Telefone</th>";
	echo "			<th>Cro</th>";
	echo "			<th>Genêro</th>";
	echo "			<th>Imagem anexada</th>";
	echo "	   		<th colspan='2'>Ações</th>";
    echo "		</tr>";
    


	while($contador < $linhas)
	{
		// mostrar uma linha de registro aqui
		// pega uma linha de $registros
		// separar as colunas
		$dados = mysqli_fetch_array($registros);
		
		// mostrar os dados das colunas
		//echo "Código: " . $dados['CPF_FUNCIONARIO'] . "<br>";
		
		// criando variáveis com os dados das cols.
		$usuario    	= $dados['USUARIO'];
		$senha 			= $dados['SENHA'] ;
        $cpf    		= $dados['CPF_FUNCIONARIO'];
		$nome           = $dados['NOME_FUNCIONARIO'];
		$profissao      = $dados['PROFISSAO'];
		$rg		        = $dados['RG_FUNCIONARIO'];
		$dataNasc		= $dados['DATA_NASCIMENTO_FUNCIONARIO'];
		$dataCad	    = $dados['DATA_INICIO_FUNCIONARIO'];
		$email          = $dados['EMAIL_FUNCIONARIO'];
		$cep            = $dados['CEP_FUNCIONARIO'];
		$endereco       = $dados['ENDERECO_FUNCIONARIO'];
		$numeroCasa     = $dados['NUMERO_ENDERECO_FUNCIONARIO'];
		$bairro         = $dados['BAIRRO_FUNCIONARIO'];
		$cidade         = $dados['CIDADE_FUNCIONARIO'];
		$uf	            = $dados['UF_FUNCIONARIO'];
		$obs	        = $dados['COMPLEMENTO_FUNCIONARIO'];
		$telefone       = $dados['CELULAR_FUNCIONARIO'];
		$cro            = $dados['CRO'];
        $genero         = $dados['SEXO_FUNCIONARIO'];
        $icone          = $dados['ICONE'];
        
            
		// abrir uma nova linha
		echo "<tr>";
		
		// abrir as células
		echo "	<td>$usuario</td>";
		echo "	<td>$senha</td>";
		echo "	<td>$cpf</td>";
		echo "	<td>$nome</td>";
		echo "	<td>$profissao</td>";
		echo "	<td>$rg</td>";
		echo "	<td>$dataNasc</td>";
		echo "	<td>$dataCad</td>";
		echo "	<td>$email</td>";
		echo "	<td>$cep</td>";
		echo "	<td>$endereco</td>";
		echo "	<td>$numeroCasa</td>";
		echo "	<td>$bairro</td>";
		echo "	<td>$cidade</td>";
		echo "	<td>$uf</td>";
		echo "	<td>$obs</td>";
		echo "	<td>$telefone</td>";
		echo "	<td>$cro</td>";
		echo "	<td>$genero</td>";
		if ($icone<> "")
		echo " <td> <img src='fotos/$icone' width=150 height=100> </td>";
		else
		echo " <td> </td>";
		echo "  <td> <a href='FuncionarioexcluirCadastro.php?c=$cpf'>Excluir</a> </td>";
		echo "	<td> <a href='FuncionarioAlteracao.php?c=$cpf'> Alterar </a> </td>";

		// fechar a linha
		echo "</tr>";
		
		$contador++;
	}
	
	echo "</table>";
	echo "<br><br>";
	echo "<b>Listagem Finalizada!!";
	echo "<br><br>";
?>
<meta charset="utf-8">
		<hr>
		<a href="CadastroFuncionario.html"><button>Cadastro de Funcionario</button></a>
		<a href="../login/logout.php"><button>Sair</button></a>
		<hr>