
<?php	

	// Recebendo o arquivo (ícone)
	$nomeArquivo    = $_FILES['icone'] ['name'];  
	$tipoArquivo    = $_FILES['icone'] ['type']; 
	$tamanhoArquivo = $_FILES['icone'] ['size']; 
	$nomeTemporario = $_FILES['icone'] ['tmp_name']; 
	

	//recebendo os dados em variáveis
	$usuario    	= $_POST['usuario'];
	$senha 			= $_POST['senha'] ;
	$cpf			= $_POST['cpf'];
	$nome			= $_POST['nome'];
	$profissao		= $_POST['profissao'];
	$rg	    		= $_POST['rg'];
	$dataNasc 		= $_POST['dataNasc'] ;
	$dataCad		= $_POST['dataCad'];
	$email      	= $_POST['email']; 
	$email1	    	= $_POST['email1'];
	$cep	   	    = $_POST['cep'];
	$endereco	    = $_POST['endereco'];
	$numeroCasa		= $_POST['numeroCasa'];
	$bairro			= $_POST['bairro'];
	$cidade	    	= $_POST['cidade'];
	$uf	    		= $_POST['uf'];
	$obs	   	    = $_POST['obs'];
	$telefone		= $_POST['telefone'];
	$cro			= $_POST['cro'];
	$genero			= $_POST['genero'];


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
	
	// Arquivo foi enviado (via formulário)?
	if( $nomeArquivo <> "" )
	{
		// mostrar os dados do arquivo na tela
		echo "Nome do arquivo: $nomeArquivo <br>";
		echo "Tipo: $tipoArquivo <br>";
		echo "Tamanho : $tamanhoArquivo bytes <br>";
		echo "Local (temporário): $nomeTemporario <br>";
		
		// Transferindo o arquivo p/pasta icones
		$nomeFinal = "fotos/" . $_FILES['icone'] ['name'];
		if( move_uploaded_file($nomeTemporario, $nomeFinal))
		{
            echo 'Ícone transferido p/ a pasta icones.<br>';
		}
        else
		{
            echo 'Ocorreu algum erro ao tentar mover o
				arquivo de ícone para a pasta destino.<br>';
		}
	}

	// Exibindo dados (variáveis) na tela
	echo "Usuário cadastrado: $usuario <br>";
	echo "Senha cadastrada: $senha <br>";
	echo "Cpf: $cpf <br>";
	echo "Nome: $nome <br>";
	echo "Função: $profissao <br>";
	echo "Rg: $rg <br>";
	echo "Data de nascimento: $dataNasc <br>" ;
	echo "Data de cadastro: $dataCad <br>" ;
	echo "E-mail: $email <br>" ;
	echo "Confirmação de e-mail: $email1 <br>" ;
	echo "Cep: $cep <br>";
	echo "Endereço: $endereco <br>" ;
	echo "Número: $numeroCasa <br>" ;
	echo "Bairro: $bairro <br>" ;
	echo "Cidade: $cidade <br>" ;
	echo "Estado: $uf <br>" ;
	echo "Observações: $obs <br>" ;
	echo "Telefone: $telefone <br>" ;
	echo "Cro: $cro <br>" ;
	echo "Genêro: $genero <br>" ;
	echo "<hr>";
	

	// 1 - 	Conectando o PHP no servidor MYSQL
	include '../ArquivoConexaoPhp/conexao.php';
	
	// 2 - Criar o comando de INSERT (numa variável)
	$sql = 
	"INSERT INTO funcionario 
	(
	USUARIO,
	SENHA,
	ICONE,
	CPF_FUNCIONARIO,
	NOME_FUNCIONARIO,
	PROFISSAO,
	RG_FUNCIONARIO,
	DATA_NASCIMENTO_FUNCIONARIO,
	DATA_INICIO_FUNCIONARIO,
	EMAIL_FUNCIONARIO,
	CEP_FUNCIONARIO,
	ENDERECO_FUNCIONARIO,
	NUMERO_ENDERECO_FUNCIONARIO,
	BAIRRO_FUNCIONARIO,
	CIDADE_FUNCIONARIO,
	UF_FUNCIONARIO,
	COMPLEMENTO_FUNCIONARIO,
	CELULAR_FUNCIONARIO,
	CRO,
	SEXO_FUNCIONARIO
	
	) VALUES

	 
	('$usuario', '$senha', '$nomeArquivo', '$cpf', '$nome', '$profissao', '$rg', '$dataNasc', '$dataCad',
	 '$email', '$cep', '$endereco', '$numeroCasa', '$bairro', '$cidade', 
	 '$uf', '$obs', '$telefone', '$cro', '$genero')";

	
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