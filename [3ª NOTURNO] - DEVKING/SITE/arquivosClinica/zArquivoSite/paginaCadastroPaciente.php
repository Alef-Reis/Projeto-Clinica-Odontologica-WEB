<?php
session_start();
include('../login/verifica_login.php');
setlocale(LC_ALL,'pt_BR.UTF8');
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Clínica Odontológica</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script type="text/javascript" src="../Jquery/jquery-3.5.1.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/frame.css">

    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
  <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">

  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div>
	  		<div class="img bg-wrap text-center py-4" style="background-image: url(images/bg_1.png);">
	  			<div class="user-logo">
            <div class="img" style="background-image: url(images/perfil.png);"></div>
	  				<h3>Bem-vindo<p class="text-light bg-dark"><?php echo $_SESSION['usuario'];?></p></h3>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="index.php"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          <li>
            <a href="paginaListaPacientes.php"><span class=" fa fa-list mr-3 "><small class="d-flex align-items-center justify-content-center"></small></span>Lista de Pacientes</a>
          </li>
          <li>
            <a href="paginaListaAgendamentos.php"><span class=" fa fa-calendar mr-3"><small class="d-flex align-items-center justify-content-center"></small></span>Lista de Agendamentos</a>
          </li>
          <li>
            <a href="paginaCadastroPaciente"><span class="fa fa-user-plus mr-3"></span>Cadastro de Pacientes</a>
          </li>
          <li>
            <a href="paginaCadastroFuncionario"><span class="fa fa-user mr-3"></span>Cadastro de Funcionários</a>
          </li>
          <li>
            <a href="paginaSobre"><span class="fa fa-cog mr-3"></span> Sobre</a>
          </li>
          <li>
            <a href="../login/logout.php"><span class="fa fa-sign-out mr-3"></span>Sair</a>
          </li>
        </ul>

      </nav>

     <!-- Page Content  -->
     <div id="content" class="p-4 p-md-5 pt-5" >
        <h2 class="mb-4 text-center text-muted">Listagem de Pacientes</h2>
        <div class="container">
        <div id="wrapper" >
          <iframe class="resp-iframe"
            src="../ArquivosPaciente/cadastroPaciente.html"
            width="1100";
            height="1000"
            frameborder="0"
          >
          </iframe>
        </div>
        </div>
      </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>