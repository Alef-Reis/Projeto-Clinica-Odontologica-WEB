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
        <h2 class="mb-4 text-center text-muted">Visualizar dados paciente</h2>
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
			$telefoneResponsavel   = $dados['TELEFONE_RESPONSAVEL_PACIENTE'];
			$genero         = $dados['SEXO_PACIENTE'];    

			//Função para criar máscaras - "User friendly"
			function Mask($mask,$str){

				$str = str_replace(" ","",$str);
	
				for($i=0;$i<strlen($str);$i++){
					$mask[strpos($mask,"#")] = $str[$i];
				}
	
				return $mask;
	
				}


			?>
			<form	action="PacienteGravarAlteracao.php"
				method="post"
				enctype="multipart/form-data">
				
			<input type="hidden" name="id" value="<?php echo $codigo; ?>">
						
            <meta charset="utf-8">
    			
            <fieldset disabled>

            <div class="form-row">

            <div class="col-md-4 mb-3">
			<label for="cpf">CPF</label>
			<input 
			type="text" 
			name="cpf"
			id="cpf"
			maxlength="15"
			required
			placeholder=""
			class="form-control"
			value="<?php echo Mask("###.###.###-##",$cpf); ?>">
			</div>
                
            
            <div class="col-md-4 mb-3">
			<label for="nome">Nome</label>
			<input 
			type="text" 
			name="nome"
			maxlength="100"
			placeholder=""
			required
			class="form-control"
			value="<?php echo $nome; ?>">
			</div>
				
			
            <div class="col-md-4 mb-3">
			<label for="rg">Rg</label>
			<input 
			type="text" 
			name="rg"
			maxlength="9"
			required
			placeholder=""
			class="form-control"
			value="<?php echo Mask("##.###.###-#",$rg); ?>">			
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
			required
			value="<?php echo $dataNasc;?>">
			</div></div>
					

            <div class="col-md-4 mb-3">
			<label for="dataCad">Data de cadastro</label>
			<div>
			<input class="form-control" 
			type="date" 
			name="dataCad"
			id="dataCad"
			min="1910-01-31"
			max="2020-12-31"
			required
			value="<?php echo $dataCad;?>">
			</div></div>

            
            <div class="col-md-4 mb-3">
			<label for="email">E-mail</label>
			<input 
			type="email" 
			name="email"
			maxlength="100"
			require
			placeholder=""
			class="form-control" 
			id="email"
			value="<?php echo $email;?>">
			</div>
			
			
            <div class="col-md-4 mb-3">
			<label for="telefone">Telefone</label>
			<div>
			<input class="form-control"
			name="telefone" 
			pattern="[0-9]{2}[0-9]{5}[0-9]{4}"
			required
			maxlength="11"
			size="11"
			placeholder=""
			value="<?php echo Mask("(##) #####-####",$telefone); ?>">	
			</div>
			</div>

            
            <div class="col-md-4 mb-3">
			<label for="cep">Cep</label>
			<input 
			type="text" 
			name="cep"
			maxlength="9" 
			size="9"
			placeholder=""
			require
			class="form-control"
			value="<?php echo $cep;?>">
			</div>
            
    
            <div class="col-md-4 mb-3">
			<label for="endereco">Endereço</label>
			<input 
			type="text" 
			name="endereco"
			maxlength="60"
			size="60"
			placeholder=""
			required
			class="form-control"
			value="<?php echo $endereco;?>">
			</div>
            

            <div class="col-md-4 mb-3">
			<label for="numeroCasa">N°</label>
			<input 
			type="text" 
			name="numeroCasa"
			maxlength="10"
			size="10"
			placeholder=""
			required
			class="form-control"
			value="<?php echo $numeroCasa;?>">
			</div>
        

            <div class="col-md-4 mb-3">
			<label for="bairro">Bairro</label>
			<input 
			type="text" 
			name="bairro"
			maxlength="35"
			size="40"
			placeholder=""
			required
			class="form-control"
			value="<?php echo $bairro;?>">
			</div>


            <div class="col-md-4 mb-3">
			<label for="bairro">Cidade</label>
			<input 
			type="text" 
			name="cidade"
			maxlength="100"
			size="25"
			placeholder=""
			required
			class="form-control"
			value="<?php echo $cidade;?>">
			</div>


            <div class="col-md-4 mb-3">
  				<label for="id">Estado</label>
				<select class="form-control"
				  	type="text"
				  	name="uf"
					id="id" 
					maxlength="2"
					list="listaUf"
					required>
    				<datalist id="listaUf">
					<option value="AC" <?=($uf == 'AC')?'selected':''?>>AC</option>
					<option value="AL" <?=($uf == 'AL')?'selected':''?>>AL</option>
					<option value="AM" <?=($uf == 'AM')?'selected':''?>>AM</option>
					<option value="AP" <?=($uf == 'AP')?'selected':''?>>AP</option>
					<option value="BA" <?=($uf == 'BA')?'selected':''?>>BA</option>
					<option value="CE" <?=($uf == 'CE')?'selected':''?>>CE</option>
					<option value="DF" <?=($uf == 'DF')?'selected':''?>>DF</option>
					<option value="ES" <?=($uf == 'ES')?'selected':''?>>ES</option>
					<option value="GO" <?=($uf == 'GO')?'selected':''?>>GO</option>
					<option value="MA" <?=($uf == 'MA')?'selected':''?>>MA</option>
					<option value="MG" <?=($uf == 'MG')?'selected':''?>>MG</option>
					<option value="MS" <?=($uf == 'MS')?'selected':''?>>MS</option>
					<option value="MT" <?=($uf == 'MT')?'selected':''?>>MT</option>
					<option value="PA" <?=($uf == 'PA')?'selected':''?>>PA</option>
					<option value="PB" <?=($uf == 'PB')?'selected':''?>>PB</option>
					<option value="PE" <?=($uf == 'PE')?'selected':''?>>PE</option>
					<option value="PI" <?=($uf == 'PI')?'selected':''?>>PI</option>
					<option value="PR" <?=($uf == 'PR')?'selected':''?>>PR</option>
					<option value="RJ" <?=($uf == 'RJ')?'selected':''?>>RJ</option>
					<option value="RN" <?=($uf == 'RN')?'selected':''?>>RN</option>
					<option value="RO" <?=($uf == 'RO')?'selected':''?>>RO</option>
					<option value="RR" <?=($uf == 'RR')?'selected':''?>>RR</option>
					<option value="RS" <?=($uf == 'RS')?'selected':''?>>RS</option>
					<option value="SC" <?=($uf == 'SC')?'selected':''?>>SC</option>
					<option value="SE" <?=($uf == 'SE')?'selected':''?>>SE</option>
					<option value="SP" <?=($uf == 'SP')?'selected':''?>>SP</option>
					<option value="TO" <?=($uf == 'TO')?'selected':''?>>TO</option>
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
			required
			placeholder=""><?php echo $obs?></textarea>
			</div>
                    

            <div class="col-md-4 mb-3">
			<label for="bairro">Nome responsável</label>
			<input 
			type="text" 
			name="nomeResponsavel"
			maxlength="100"
			size="6"
			placeholder=""
			class="form-control"
			placeholder="Digite o nome do responsável"
			value="<?php echo $nomeResp; ?>"> 
			</div>
			
			
            <div class="col-md-4 mb-3">
			<label for="telefone">Telefone Responsável</label>
			<div>
			<input class="form-control"
			name="telefoneResponsavel"
			pattern="[0-9]{2}[0-9]{5}[0-9]{4}"
			maxlength="11"
			size="11"
			placeholder="Digite o telefone"
			value="<?php echo Mask("(##) #####-####",$telefoneResponsavel); ?>">	
			</div>
			</div>

            <?php
			$checkM =""; 
			$checkF =""; 
			if ($genero =="F")
			$checkF ="checked";
			if ($genero =="M")
			$checkM ="checked";
			?>		
					
			
            <div class="col-md-4 mb-3">
			<label for="bairro">Gênero</label><br>
			<label class="radio-inline"><input type="radio" name="genero" value="M" <?php echo $checkM;?> >Masculino</label>
			<label class="radio-inline"><input type="radio" name="genero" value="F" <?php echo $checkF;?> >Feminino</label>
			</div>
			
           <!-- <input type="submit" value="Cadastrar Alteração"> -->
           </div>

            </fieldset>
		</form>

		<a href="paginaListaPacientes.php"><button type="button" name="btnCadLogin" class="btn btn-primary">Voltar</button></a>


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