<?php
session_start();
include('../login/verifica_login.php');
setlocale(LC_ALL,'pt_BR.UTF8');
?>

<!--Bootstrap link [Início] -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
	integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
	crossorigin="anonymous">
<!--Bootstrap [Fim]-->

<?php	
	setlocale(LC_ALL,'pt_BR.UTF8');
	if(! isset($_POST['id']))
	die("Forma de chamada da rotina de gravação incorreta!!");
	
        //recebendo os dados em variáveis
        $cpf					= $_POST['cpf'];
        $nome					= $_POST['nome'];
        $rg	    				= $_POST['rg'];
        $dataNasc 				= $_POST['dataNasc'] ;
        $dataCad				= $_POST['dataCad'];
		$email      			= $_POST['email'];
		$telefone				= $_POST['telefone'];
        $cep	   	    		= $_POST['cep'];
        $endereco	    		= $_POST['endereco'];
        $numeroCasa				= $_POST['numeroCasa'];
        $bairro					= $_POST['bairro'];
        $cidade	    			= $_POST['cidade'];
        $uf	    				= $_POST['uf'];
		$obs	   	    		= $_POST['obs'];
		$nomeResp  	    		= $_POST['nomeResponsavel'];
		$telefoneResponsavel	= $_POST['telefoneResponsavel'];
		$genero					= $_POST['genero'];

		//Retirando pontos e Traços do CPF
	$cpf = str_replace(".", "", $cpf);
	$cpf = str_replace("-", "", $cpf);

	//Retirando pontos e Traços do RG
	$rg = str_replace(".", "", $rg);
	$rg = str_replace("-", "", $rg);

	//Retirando pontos e Traços do Telefone
	$telefone = str_replace("(", "", $telefone);
	$telefone = str_replace(")", "", $telefone);
	$telefone = str_replace("-", "", $telefone);
	$telefone = str_replace(" ", "", $telefone);

	$telefoneResponsavel = str_replace("(", "", $telefoneResponsavel);
	$telefoneResponsavel = str_replace(")", "", $telefoneResponsavel);
	$telefoneResponsavel = str_replace("-", "", $telefoneResponsavel);
	$telefoneResponsavel = str_replace(" ", "", $telefoneResponsavel);

	echo"<div id='content' class='p-4 p-md-5 pt-5' align='center'>
	<h2 class='mb-4 text-center text-muted'>Clínica Odontológica</h2>
	<h2 class='mb-4 text-center text-muted'>Cadastro de Funcionários</h2>
	<div class='container'>";
	echo"<hr>";

//<!-- Verificação de dados [Início]  -->

	//1 - Cpf não pode ficar em branco.
	if ($cpf=="")
	{
		echo"<h3 class='mb-4 text-center'>Preencha o campo Cpf</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}
	//1.1 - Cpf não pode ser maior que 14 caracteres.
	if (strlen($cpf) > 11)
	{
		echo "<h3 class='mb-4 text-center'>Cpf com mais de 11 caracteres digitados</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}


	//2 - Nome não pode ser maior que 100 caracteres.
	if (strlen($nome) > 100)
	{
		echo "<h3 class='mb-4 text-center'>Nome com mais de 100 caracteres digitados</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}
	//2.1 - Nome não pode ficar em branco.
	elseif ($nome=="")
	{
		echo "<h3 class='mb-4 text-center'>Campo nome em branco</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}


	//3 - Rg não pode ficar em branco.
	if ($rg=="")
	{
		echo"<h3 class='mb-4 text-center'>Campo rg em branco</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}
	//3.1 - Rg não pode ser maior que 9 caracteres.
	if (strlen($rg) > 9)
	{
		echo "<h3 class='mb-4 text-center'>Rg com mais de 9 caracteres digitados</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}


	//4 - Data de nascimento não pode ficar em branco.
	if ($dataNasc=="")
	{
		echo "<h3 class='mb-4 text-center'>Data de nascimento não pode ficar em branco</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}

	//5 - Data de cadastro não pode ficar em branco.
	if ($dataCad=="")
	{
		echo "<h3 class='mb-4 text-center'>Data de cadastro não pode ficar em branco</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}
	

	//6 - E-mail não pode ser maior que 100 caracteres ou vazio.
	if (strlen($email) > 100)
	{
		echo "<h3 class='mb-4 text-center'>E-mail não pode ser maior que 100 caracteres digitados <br> ou em branco</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}


	//7 - Telefone não pode ficar em branco.
	if ($telefone=="")
	{
		echo"<h3 class='mb-4 text-center'>Telefone não pode ficar em branco</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}
	//7.1 - telefone não pode ser maior que 12 caracteres.
	if (strlen($telefone) > 11)
	{
		echo "<h3 class='mb-4 text-center'>Telefone não pode ter mais que 11 caracteres</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}


	//8 - Campo Cep não pode ficar em branco.
	if ($cep=="")
	{
		echo"<h3 class='mb-4 text-center'>Cep não pode ficar em branco</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}
	//8.1 - Cep não pode ter mais de 8 caracteres digitados.
	if (strlen($cep) > 9)
	{
		echo "<h3 class='mb-4 text-center'>Cep não pode ter mais de 8 caracteres digitados</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}


	//9 - Endereço não pode ficar em branco.
	if ($endereco=="")
	{
		echo"<h3 class='mb-4 text-center'>Endereço não pode ficar em branco</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}
	//9.1 - Endereço não pode ter mais de 100 caracteres digitados.
	if (strlen($endereco) > 100)
	{
		echo "<h3 class='mb-4 text-center'>Endereço não pode ter mais de 100 caracteres digitados</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}


	//10 - Número casa não pode ficar em branco.
	if ($numeroCasa=="")
	{
		echo"<h3 class='mb-4 text-center'>N° não pode ficar em branco</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}
	//10.1 - Número casa não pode ter mais de 10 caracteres digitados.
	if (strlen($numeroCasa) > 10)
	{
		echo "<h3 class='mb-4 text-center'>N° não pode ter mais de 10 caracteres digitados</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}


	//11 - Bairro não pode ficar em branco.
	if ($bairro=="")
	{
		echo"<h3 class='mb-4 text-center'>Bairro não pode ficar em branco</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}
	//11.1 - Bairro não pode ter mais de 80 caracteres digitados.
	if (strlen($bairro) > 80)
	{
		echo "<h3 class='mb-4 text-center'>Bairro não pode ter mais de 80 caracteres digitados</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}
	
	
	//12 - Campo Cidade não pode ficar em branco.
	if ($cidade=="")
	{
		echo"<h3 class='mb-4 text-center'>Cidade não pode ficar em branco</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}
	//12.1 - Cidade não pode ter mais de 100 caracteres digitados.
	if (strlen($cidade) > 100)
	{
		echo "<h3 class='mb-4 text-center'>Cidade não pode ter mais que 100 caracteres digitados</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}

	//13 - Campo estado não pode ficar em branco.
	if ($uf=="")
	{
		echo"<h3 class='mb-4 text-center'>Campo estado não pode ficar em branco</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}
	//13.1 - Estado não pode ter mais de 2 caracteres digitados.
	if (strlen($uf) > 2)
	{
		echo "<h3 class='mb-4 text-center'>Estado não pode ter mais de 2 caracteres digitados</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}


	//14 - Observações não pode ter mais de 150 caracteres digitados.
	if (strlen($obs) > 150)
	{
		echo"<h3 class='mb-4 text-center'>Observações não pode ter mais de 150 caracteres digitados</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}

	//15 - Nome não pode ser maior que 100 caracteres.
	if (strlen($nomeResponsavel) > 100)
	{
		echo "<h3 class='mb-4 text-center'>Nome com mais de 100 caracteres digitados</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}


	//16 - telefone não pode ser maior que 12 caracteres.
	if (strlen($telefoneResponsavel) > 11)
	{
		echo "<h3 class='mb-4 text-center'>Telefone não pode ter mais que 11 caracteres</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}


	//17 - Gênero não pode ficar em branco.
	if ($genero=="")
	{
		echo"<h3 class='mb-4 text-center'>Genero não pode ficar vazio</h3>";
		die("<h3 class='mb-4 text-center'>Alteração Cancelada</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar</button></a>");
	}


//<!-- Verificação de dados [Fim]  -->
		
	
	// Exibindo dados (variáveis) na tela
	echo "Cpf: $cpf <br>";
	echo "Nome: $nome <br>";
	echo "Rg: $rg <br>";
	echo "Data de nascimento: $dataNasc <br>" ;
	echo "Data de cadastro: $dataCad <br>" ;
	echo "E-mail: $email <br>" ;
	echo "Telefone: $telefone <br>" ;
	echo "Cep: $cep <br>";
	echo "Endereço: $endereco <br>" ;
	echo "Número: $numeroCasa <br>" ;
	echo "Bairro: $bairro <br>" ;
	echo "Cidade: $cidade <br>" ;
	echo "Estado: $uf <br>" ;
	echo "Observações: $obs <br>" ;
	echo "Nome responsável: $nomeResp <br>" ;
	echo "Telefone reponsável: $telefoneResponsavel <br>" ;
	echo "Genêro: $genero <br>" ;
	echo "<hr>";
	
	
	// 1 - 	Conectando o PHP no servidor MYSQL
	include '../ArquivoConexaoPhp/conexao.php';
		
			
	// 2 - Criar o comando de Update
	
    
    $sql = "UPDATE PACIENTE SET 
	NOME_PACIENTE='$nome',
	RG_PACIENTE='$rg',
	DATA_NASCIMENTO_PACIENTE='$dataNasc',
	DATA_CADASTRO_PACIENTE='$dataCad',
	EMAIL_PACIENTE='$email',
	CEP_PACIENTE='$cep',
	TELEFONE_PACIENTE='$telefone',
	ENDERECO_PACIENTE='$endereco',
	NUMERO_ENDERECO_PACIENTE='$numeroCasa',
	BAIRRO_PACIENTE='$bairro',
	CIDADE_PACIENTE='$cidade',
	UF_PACIENTE='$uf',
	COMPLEMENTO_PACIENTE='$obs',
	NOME_RESPONSAVEL_PACIENTE='$nomeResp',
	TELEFONE_RESPONSAVEL_PACIENTE='$telefoneResponsavel',
    SEXO_PACIENTE='$genero'";

// Finalizando o comando (p/ alterar apenas os dados de 1 Login)
$sql .= " WHERE CPF_PACIENTE= '$cpf'";

// Exibindo o comando na tela para copiar e testar no console
//die($sql);
echo "<h3>Ops algo deu errado, tente novamente por favor</h3>";
echo "<h3 class='mb-4 text-center'>Cadastramento cancelado</h3> <a href='paginaListaPacientes.php'><button type='button' name='btnRecomecar' class='btn btn-primary'>Voltar para listagem de pacientes</button></a>";
echo "<br><br>";
// Executando o comando de seleção no MYSQL
mysqli_query($con, $sql) or die('Erro na atualização dos dados do
Login $codigo: ' . mysqli_error($con) );

// Sucesso!
//echo "Dados alterados com sucesso";

//Carregar por 3 segundos.
sleep(3);

//Redirecionar
header('Location: paginaListaPacientes.php');

//Saindo e finalizando script
exit;

echo"</div>";
echo"</div>";	
		
?>
