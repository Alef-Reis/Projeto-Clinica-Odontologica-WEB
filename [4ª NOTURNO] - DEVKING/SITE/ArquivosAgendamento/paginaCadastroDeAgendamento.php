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
		
		<?php
		setlocale(LC_ALL,'pt_BR.UTF8');
				if(! isset($_GET['c']) )
				die("Rotina chamada de forma incorreta!");
			//Colocar o código do login numa variável
			$codigo = $_GET['c'];
	
			//Conectando o PHP no servidor MYSQL
			include '../ArquivoConexaoPhp/conexao.php';

			// Criando a variável com o comando de seleção
			$sql = "SELECT * FROM PACIENTE WHERE CPF_PACIENTE=$codigo";
			
			//Conectando o PHP no servidor MYSQL
			include '../ArquivoConexaoPhp/conexao.php';
			
			//die($sql) ;
			
			$registro = mysqli_query($con, $sql) or die('Erro na seleção dos
			dados do login $codigo:' . mysqli_error($con) );
			
			// Contando quantos registros/linhas tem dentro de $registro
			$linhas = mysqli_num_rows($registro);
			
			// Se $linhas for menor que 1 é porque não encontrou nada
			// Neste caso, avisa-se o usuário e encerra o programa.
			if ($linhas<1)
			{
			die('Login código $codigo não existe mais – Programa encerrado!');
			}
			
			
			$dados = mysqli_fetch_array($registro);
			$cpfPaciente    		= $dados['CPF_PACIENTE'];
			$nomePaciente   		= $dados['NOME_PACIENTE']; 


			?>



			<?php

			//Função para criar máscaras - "User friendly"
			function Mask($mask,$str){

				$str = str_replace(" ","",$str);

				for($i=0;$i<strlen($str);$i++){
					$mask[strpos($mask,"#")] = $str[$i];
				}

				return $mask;

			}

			//Conectando o PHP no servidor MYSQL
			include '../ArquivoConexaoPhp/conexao.php';

			// mysql select query
			$query = "SELECT CPF_FUNCIONARIO, NOME_FUNCIONARIO FROM FUNCIONARIO where PROFISSAO = 'D'";

			// for method 1

			$result1 = mysqli_query($con, $query);

			// for method 2

			$result2 = mysqli_query($con, $query);

			$options = "";

			while($row2 = mysqli_fetch_array($result2))
			{
				$options = $options."<option>$row2[0]</option>";
			}

			?>


			<form	action="AgendamentoGravarCadastro.php"
				method="post"
				enctype="multipart/form-data">
							
            
			
			<meta charset="utf-8">

				<div class="form-row">

					<div class="col-md-4 mb-3">
					<label for="NomeDentista">Nome Dentista:</label>
					<select select 
					name="nomeDentista" 
					class="form-control"
					required>
					<option value="">Selecione o Denstista</option>

           	 		<?php while($row1 = mysqli_fetch_array($result1)):;?>

            		<option value="<?php echo $row1['CPF_FUNCIONARIO'];?>"><?php echo $row1['NOME_FUNCIONARIO'];?></option>
            		<?php endwhile;?>

        			</select>
					</div>


					<div class="col-md-4 mb-3">
					<label for="NomeDoTratamento">Nome do Tratamento:</label>
					<select name="tratamento" 
					required class="form-control">
					<option value="">Selecione o Tratamento</option>
					<option value="canal">Canal</option>
					<option value="aparelho">Aparelho</option>
					<option value="radiografia">Radiografia</option>
					<option value="limpeza">Limpeza</option>
					</select> 
					</div>


					<div class="col-md-4 mb-3">
					<label for="Data">Data:</label>
				    <input	
					type="date"
					name="dataAgendamento"
					min="1910-01-31"
					max="2020-12-31"
					required
					class="form-control">
  					</div>

					<div class="col-md-4 mb-3">
					<label for="Horario">Horário:</label>
					<input type="time" 
					id="appt" 
					name="horario"
					min="09:00" 
					max="18:00" 
					required
					class="form-control">
  					</div>
			
					<div class="col-md-4 mb-3">
					<label for="cpfPaciente">Cpf Paciente:</label>
					<input 	
					type="text"
					name="cpfPaciente"
					maxlength="15"
					size="25"
					required
					readonly
					class="form-control"
					value="<?php echo Mask("###.###.###-##",$cpfPaciente); ?>">
					</div>

					<div class="col-md-4 mb-3">
					<label for="cpfPaciente">Nome Paciente:</label>
					<input 	
					type="text"
					name="nomePaciente"
					maxlength="15"
					size="25"
					required
					readonly
					class="form-control"
					value="<?php echo $nomePaciente; ?>">
					</div>

				</div>
                
				<button type="submit" class="btn btn-primary">Cadastrar Agendamento</button>
				<button type="reset" class="btn btn-primary">Limpar Dados</button>           

		</form>
		
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