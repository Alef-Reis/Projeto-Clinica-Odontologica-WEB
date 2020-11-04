<!--Verifica se o usuário está autenticado [Início] -->
<?php
      session_start();
      include('../login/verifica_login.php');
      setlocale(LC_ALL,'pt_BR.UTF8');
?>
<!--Verifica autenticação [Fim]-->

<!doctype html>
<html lang="en">
  <head>
  	<title>Clínica Odontológica</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Bootstrap link [Início] -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
        crossorigin="anonymous">

      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

		  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

		  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

      <link rel="stylesheet" href="../css/style.css">
    <!--Bootstrap [Fim]-->
    
  </head>

  <body>
<!--Navbar Lateral [Início] -->
<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div>
	  		<div class="img bg-wrap text-center py-4" style="background-image: url(../images/bg_1.png);">
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url(../images/perfil.png);"></div>
	  				<h3>Bem-vindo<p class="text-light bg-dark"><?php echo $_SESSION['usuario'];?></p></h3>
	  			</div>
	  		</div>
			  <ul class="list-unstyled components mb-5">
    <li class="active">
          <li>
            <a href="../ArquivosPaciente/paginaListaPacientes.php"><span class=" fa fa-list mr-3 "><small class="d-flex align-items-center justify-content-center"></small></span>Lista de Pacientes</a>
          </li>
          <li>
            <a href="../ArquivosAgendamento/paginaListaAgendamentos.php"><span class=" fa fa-calendar mr-3"><small class="d-flex align-items-center justify-content-center"></small></span>Lista de Agendamentos</a>
          </li>
          <li>
            <a href="../ArquivosPaciente/paginaCadastroPaciente.php"><span class="fa fa-user-plus mr-3"></span>Cadastro de Pacientes</a>
          </li>
          <li>
			<a href="../ArquivosFuncionario/paginaDadosFuncionario.php"><span class="fa fa-user mr-3"></span>Meus Dados</a>          
		  </li>
          <li>
            <a href="../ArquivosFuncionario/paginaSobre.php"><span class="fa fa-cog mr-3"></span> Sobre</a>
          </li>
          <li>
            <a href="../login/logout.php"><span class="fa fa-sign-out mr-3"></span>Sair</a>
		  </li>
	</li>
        </ul>
      </nav>
<!--Navbar Lateral [Fim] -->


<!-- Div Principal [Início]  -->
      <div id="content" class="p-4 p-md-5 pt-5" >
        <h2 class="mb-4 text-center text-muted">Lista de Pacientes</h2>
        <div class="container">
        
		    <!--Bootstrap link [Início] -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
        crossorigin="anonymous">
        <!--Bootstrap [Fim]-->

<!--Conteúdo página [Início] -->

		<form action="paginaListaPacientes.php" method="post">
			<div class="input-group" >
			<input type="text" name="txt_pesquisa" class="form-control" placeholder="Digite o nome do paciente ou cpf">
			<div class="input-group-btn">
			<input type="submit" value="pesquisar" class="btn btn-primary">
			</div>
			</div>
		</form>
		<br>

        
<?php 

//Função para criar máscaras - "User friendly"
function Mask($mask,$str){

	$str = str_replace(" ","",$str);

	for($i=0;$i<strlen($str);$i++){
		$mask[strpos($mask,"#")] = $str[$i];
	}

	return $mask;

}

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
		die("Listagem de pacientes está vazio ou Nome ou Cpf pesquisado não encontrado.");
	
	// Se chegou até aqui é pq tem registros/linhas
	echo "<div  class='alert alert-success col-sm-3 text-center'><b>Registros encontrados: $linhas <br></div>";
	
	// Varrer $registros e mostrar linha a linha
	$contador = 0;
	
	// Exibindo tabela
	echo "<table class='table table-bordered table-hover table-sm table-responsive-sm'>";
	echo "		<thead class='thead-dark'";
	echo "		<tr>";
	echo "			<th>Cpf</th>";
	echo "			<th>Nome</th>";
	echo "			<th>Rg</th>";
	echo "			<th>Data de Nascimento</th>";
	//echo "			<th>Data de Cadastro</th>";
	echo "			<th>E-mail</th>";
	echo "			<th>Telefone</th>";
	//echo "			<th>Cep</th>";
	//echo "			<th>Endereço</th>";
	//echo "			<th>Número</th>";
	//echo "			<th>Bairro</th>";
	//echo "			<th>Cidade</th>";
	//echo "			<th>Estado</th>";
	//echo "			<th>Observações</th>";
	//echo "			<th>Nome Responsável</th>";
	//echo "			<th>Telefone Responsável</th>";
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
		echo Mask("<td>###.###.###-##	&nbsp&nbsp&nbsp</td>",$cpf);
		echo "<td>$nome</td>";
		echo Mask("<td>##.###.###-#</td>",$rg);
		echo "<td>$dataNasc</td>";
		//echo "	<td>$dataCad</td>";
		echo "<td>$email</td>";
		echo Mask("<td>(##) #####-####</td>",$telefone);
		//echo "	<td>$cep</td>";
		//echo "	<td>$endereco</td>";
		//echo "	<td>$numeroCasa</td>";
		//echo "	<td>$bairro</td>";
		//echo "	<td>$cidade</td>";
		//echo "	<td>$uf</td>";
		//echo "	<td>$obs</td>";
		//echo "	<td>$nomeResp</td>";
		//echo "	<td>$telefoneResp</td>";
		echo "	<td>$genero</td>";

		echo "	<td> <a href='../ArquivosAgendamento/paginaCadastroDeAgendamento.php?c=$cpf'><button type='button' class='btn btn-warning btn-sm'>Agendar</button></a> </td>";
		echo "	<td> <a href='PaginaListaPacientesAlterar.php?c=$cpf'><button type='button' class='btn btn-primary btn-sm'>Alterar</button></a> </td>";
		echo "	<td> <a href='PaginaListaPacientesVisualizar.php?c=$cpf'><button type='button' class='btn btn-secondary btn-sm'>Visualizar</button></a> </td>";
		echo "  <td> <a href='PacienteExcluirCadastro.php?c=$cpf'><button type='button' class='btn btn-danger btn-sm'>Excluir</button></a> </td>";


		// fechar a linha
		echo "</tr>";
		
		$contador++;
	}
	
	echo "</table>";
?>
		
<!--Conteúdo página [Fim] -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
       
        </div>
      </div>
    </div>

<!-- Div Principal [Fim]  -->

		<!--Arquivos JavaScript [Início] -->
      <script src="../js/jquery.min.js"></script>
      <script src="../js/popper.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/main.js"></script>
    <!--Arquivos JavaScript [Fim] -->

  </body>
</html>