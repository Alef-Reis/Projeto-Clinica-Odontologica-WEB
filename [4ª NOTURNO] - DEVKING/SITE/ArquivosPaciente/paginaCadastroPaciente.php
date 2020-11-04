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

  <!--Jquery Máscara [Início]-->
<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/jquery.mask.js"></script>
<script>
	$(document).ready(function(){
		// validando apenas alguns campos de PF (deixa de funcionar quando se altera o tipo do usuário)
		$('#cpf').mask('000.000.000-00', {reverse: true});
		$('#rg').mask('00.000.000-A', {reverse: true});
		$('#cep').mask('00000-000');
		var options = {
    onKeyPress: function (phone, e, field, options) {
        var masks = ['(00) 0000-00000', '(00) 00000-0000'];
        var mask = (phone.length > 14) ? masks[1] : masks[0];
		$('#telefone, #telefoneResponsavel').mask(mask, options);

    }
};
		$('#telefone').mask('(00) 0000-00000', options);
		$('#telefoneResponsavel').mask('(00) 0000-00000', options);



	});
</script>
<!--Jquery Máscara [Fim]-->

<!--Via Cep [Inicio]-->
<script>

	$(document).ready(function() {

		function limpa_formulário_cep() {
			// Limpa valores do formulário de cep.
			$("#endereco").val("");
			$("#bairro").val("");
			$("#cidade").val("");
			$("#uf").val("");
			//$("#ibge").val("");
		}
		
		//Quando o campo cep perde o foco.
		$("#cep").blur(function() {

			//Nova variável "cep" somente com dígitos.
			var cep = $(this).val().replace(/\D/g, '');

			//Verifica se campo cep possui valor informado.
			if (cep != "") {

				//Expressão regular para validar o CEP.
				var validacep = /^[0-9]{8}$/;

				//Valida o formato do CEP.
				if(validacep.test(cep)) {

					//Preenche os campos com "..." enquanto consulta webservice.
					$("#endereco").val("...");
					$("#bairro").val("...");
					$("#cidade").val("...");
					$("#uf").val("...");
					//$("#ibge").val("...");

					//Consulta o webservice viacep.com.br/
					$.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

						if (!("erro" in dados)) {
							//Atualiza os campos com os valores da consulta.
							$("#endereco").val(dados.logradouro);
							$("#bairro").val(dados.bairro);
							$("#cidade").val(dados.localidade);
							$("#uf").val(dados.uf);
							//$("#ibge").val(dados.ibge);
						} //end if.
						else {
							//CEP pesquisado não foi encontrado.
							limpa_formulário_cep();
							alert("CEP não encontrado.");
						}
					});
				} //end if.
				else {
					//cep é inválido.
					limpa_formulário_cep();
					alert("Formato de CEP inválido.");
				}
			} //end if.
			else {
				//cep sem valor, limpa formulário.
				limpa_formulário_cep();
			}
		});
	});

</script>
<!--Via cep [Fim]-->

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
        <h2 class="mb-4 text-center text-muted">Cadastro de Pacientes</h2>
        <div class="container">
        
		    <!--Bootstrap link [Início] -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
        crossorigin="anonymous">
        <!--Bootstrap [Fim]-->

<!--Conteúdo página [Início] -->
		
		<form 	action="PacienteGravarCadastro.php"
				method="post"
				enctype="multipart/form-data">
		
				<div class="form-row">


				<div class="col-md-4 mb-3">
						<label for="cpf">CPF</label>
						<input 
						type="text"
						name="cpf" 
						id="cpf"
						required
						placeholder="Digite o cpf"
						class="form-control">
					</div>
					
					
					<div class="col-md-4 mb-3">
    				<label for="nome">Nome</label>
					<input 
					type="text" 
					name="nome"
					maxlength="100"
					placeholder="Digite o nome"
					required
					class="form-control">
  					</div>

					
					  <div class="col-md-4 mb-3">
						<label for="rg">Rg</label>
						<input 	
						type="text"
						name="rg"
						id="rg"
						required
						placeholder="Digite o Rg"
						class="form-control">
					</div>

			

					<div class="col-md-4 mb-3">
						<label for="dataNasc">Data de nascimento</label>
						<div>
						<input class="form-control" 
						type="date" 
						name="dataNasc"
						id="dataNasc"
						min="1910-01-31"
						max="2020-12-31"
						required>
  					</div></div>
					
					
					  <div class="col-md-4 mb-3">
						<label for="dataCad">Data de cadastro</label>
						<input class="form-control" 
						type="date" 
						name="dataCad"
						id="dataCad"
						required
						readonly
						value='<?php 
						date_default_timezone_set('America/Sao_Paulo');
						echo date("Y-m-d"); ?>'>
					</div>

					
					<div class="col-md-4 mb-3">
						<label for="email">E-mail</label>
						<input 
						type="email" 
						name="email"
						maxlength="100"
						require
						placeholder="Digite o e-mail"
						class="form-control" 
						id="email">
					</div>
                    

					<div class="col-md-4 mb-3">
						<label for="email">E-mail - Confirmação</label>
						<input 
						type="email" 
						name="email1"
						maxlength="100"
						require
						placeholder="Confirme o endereço de e-mail"
						class="form-control" 
						id="email">
					</div>
					
					
					<div class="col-md-4 mb-3">
						<label for="telefone">Telefone</label>
						<input
						type="text"
						name="telefone" 
						id="telefone"
						size="15"
						required
						class="form-control"
						placeholder="Digite o Telefone">
					</div>
                    
					
					<div class="col-md-4 mb-3">
						<label for="cep">Cep</label>
						<input 
						type="text" 
						name="cep"
						id="cep"
						maxlength="9" 
						size="9"
						placeholder="Digite o cep"
						require
						class="form-control">
					</div>
                    
					
					<div class="col-md-4 mb-3">
						<label for="endereco">Endereço</label>
						<input 
						type="text" 
						name="endereco"
						id="endereco"
						maxlength="100"
						size="60"
						placeholder="Digite o endereço"
						required
						class="form-control">
					</div>
                    
					
					<div class="col-md-4 mb-3">
						<label for="numeroCasa">N°</label>
						<input 
						type="text" 
						name="numeroCasa"
						maxlength="10"
						size="10"
						placeholder="Digite o número"
						required
						class="form-control">
					</div>
                

					<div class="col-md-4 mb-3">
						<label for="bairro">Bairro</label>
						<input 
						type="text" 
						name="bairro"
						id="bairro"
						maxlength="80"
						size="40"
						placeholder="Digite o bairro"
						required
						class="form-control">
					</div>

					
					<div class="col-md-4 mb-3">
						<label for="bairro">Cidade</label>
						<input 
						type="text" 
						name="cidade"
						id="cidade"
						maxlength="100"
						size="25"
						placeholder="Digite a cidade"
						required
						class="form-control">
					</div>

			
					<div class="col-md-4 mb-3">
					   <label for="uf">Estado</label>
			 		   <select class="form-control"
						type="text"
						name="uf"
				 	 	id="uf" 
				  		maxlength="2"
				  		list="listaUf"
				  		required>
				  			<datalist id="listaUf">
								<option value="">Selecione o estado</option>
								<option value="AC">AC</option>
								<option value="AL">AL</option>
								<option value="AM">AM</option>
								<option value="AP">AP</option>
								<option value="BA">BA</option>
								<option value="CE">CE</option>
								<option value="DF">DF</option>
								<option value="ES">ES</option>
								<option value="GO">GO</option>
								<option value="MA">MA</option>
								<option value="MG">MG</option>
								<option value="MS">MS</option>
								<option value="MT">MT</option>
								<option value="PA">PA</option>
								<option value="PB">PB</option>
								<option value="PE">PE</option>
								<option value="PI">PI</option>
								<option value="PR">PR</option>
								<option value="RJ">RJ</option>
								<option value="RN">RN</option>
								<option value="RO">RO</option>
								<option value="RR">RR</option>
								<option value="RS">RS</option>
								<option value="SC">SC</option>
								<option value="SE">SE</option>
								<option value="SP">SP</option>
								<option value="TO">TO</option>
				  			</datalist>
						</select>
		  			</div>

			
			<div class="col-md-4 mb-3">
  				<label for="comment">Observações</label>
				  <textarea 
				  class="form-control" 
				  name="obs" 
				  id="obs"
				  rows="5" 
				  maxlength="150" 
            placeholder="Digite aqui as observações"></textarea>
			</div> 
                    
					
					<div class="col-md-4 mb-3">
    				<label for="bairro">Nome responsável</label>
					<input 
					type="text" 
					name="nomeResponsavel"
					maxlength="100"
					size="6"
					placeholder="Digite o nome"
					class="form-control">
  					</div>
                    

					<div class="col-md-4 mb-3">
						<label for="telefone">Telefone Responsável</label>
						<input
						type="text"
						name="telefoneResponsavel" 
						id="telefoneResponsavel"
						size="15"
						class="form-control"
						placeholder="Digite o Telefone">
					</div>
                    
					
					<div class="col-md-4 mb-3">
    				<label for="genero">Gênero</label><br>
					<label class="radio-inline"><input type="radio" name="genero" value="M" required >Masculino</label>
					<label class="radio-inline"><input type="radio" name="genero" value="F" required>Feminino</label>
					</div>

			</div>

					
					
					<button type="submit" name="btnCadLogin" class="btn btn-primary">Cadastrar Paciente</button>
					<button type="reset" value="Limpar Dados" name="btnCadLogin" class="btn btn-primary">Limpar Dados</button>
										
		</form>

	<!--Conteúdo página [Fim] -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
       
        </div>
      </div>
    </div>

<!-- Div Principal [Fim]  -->

		<!--Arquivos JavaScript [Início] -->
	  <script src="../js/bootstrap.min.js"></script>
	  <script src="../js/popper.js"></script>
      <script src="../js/main.js"></script>
    <!--Arquivos JavaScript [Fim] -->

  </body>
</html>