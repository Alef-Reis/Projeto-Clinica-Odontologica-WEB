<html> 
	<head>
		<title>Alteração de Login</title>
	</head>
	<body>
		<h2>Alteração de Login</h2>
		
		<?php
session_start();
include('../login/verifica_login.php');
setlocale(LC_ALL,'pt_BR.UTF8');
?>
<h3>Olá, <?php echo $_SESSION['usuario'];?></h3>
		
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
			$telefoneResp   = $dados['TELEFONE_RESPONSAVEL_PACIENTE'];
			$genero         = $dados['SEXO_PACIENTE'];    


			?>
			<form	action="PacienteGravarAlteracao.php"
				method="post"
				enctype="multipart/form-data">
				
			<input type="hidden" name="id" value="<?php echo $codigo; ?>">
			
            
            <fieldset>
					<legend><h3>Mais detalhes</h3></legend>
			
            <meta charset="utf-8">
    			
			Cpf:
            <input 	
            type="text"
            name="cpf"
            maxlength="15"
            size="25"
            required
            value="<?php echo $cpf; ?>">
            <br><br>
                
            
			
			Nome:
			<input 	
			type="text"
			name="nome"
			maxlength="100"
			size="25"
			placeholder="Pedro"
            required
            value="<?php echo $nome; ?>">
            <br><br>
				
			
			Rg:
			<input 	
			type="text"
			name="rg"
			maxlength="9"
			size="16"
            required
            value="<?php echo $rg; ?>">
			<br><br>
			
			
			Data de nascimento:
			<input	
			type="date"
			name="dataNasc"
			min="1910-01-31"
			max="2020-12-31"
            required
            value="<?php echo $dataNasc;?>"> 
            <br><br>
					
			Data de cadastro:
		    <input	
			type="date"
			name="dataCad"
			min="1910-01-31"
			max="2020-12-31"
            required
            value="<?php echo $dataCad;?>">
            <br><br>

            E-mail:
			<input 	
			type="email"
			name="email"
			maxlength="100"
			size="60"
            required
            value="<?php echo $email;?>">
			<br><br>
			
			Telefone: 
			<input 
			type="tel"
			name="telefone" 
			pattern="[0-9]{2}[0-9]{5}[0-9]{4}"
			maxlength="11"
			size="11"
			required
			value="<?php echo $telefone; ?>">
			<span>Formato: 11912345678</span>
			<br><br>

            Cep:
            <input 	
            type="text"
            name="cep"
            maxlength="9" 
            size="9"
            required
            value="<?php echo $cep;?>">
            <br><br>
            
    
            
            Endereço:
            <input 	
            type="text"
            name="endereco"
            maxlength="60"
            size="60"
            required
            value="<?php echo $endereco;?>">
            <br><br>
            

            Número:
            <input 	
            type="text"
            name="numeroCasa"
            maxlength="10"
            size="10"
            required
            value="<?php echo $numeroCasa;?>">
            <br><br>
        

            Bairro:
            <input 	
            type="text"
            name="bairro"
            maxlength="35"
            size="40"
            required
            value="<?php echo $bairro;?>">
            <br><br>


            Cidade:
            <input 	
            type="text"
            name="cidade"
            maxlength="100"
            size="25"
            required
            value="<?php echo $cidade;?>">
            <br><br>



            Uf:
			<input 
			type="text" name="uf"
			id="id" maxlength="2"
			list="listaUf"
			required
			value="<?php echo $uf; ?>"
			size="2"> <br>
			
			<datalist id="listaUf">
			<option value="AC">
			<option value="AL">
			<option value="AM">
			<option value="AP">
			<option value="BA">
			<option value="CE">
			<option value="DF">
			<option value="ES">
			<option value="GO">
			<option value="MA">
			<option value="MG">
			<option value="MS">
			<option value="MT">
			<option value="PA">
			<option value="PB">
			<option value="PE">
			<option value="PI">
			<option value="PR">
			<option value="RJ">
			<option value="RN">
			<option value="RO">
			<option value="RR">
			<option value="RS">
			<option value="SC">
			<option value="SE">
			<option value="SP">
			<option value="TO">
            </datalist>
            <br>
            

            
			Observações:<br>
			<textarea name="obs" id="obs"
			rows="5" cols="80" maxlength="150" required 
			placeholder="Digite aqui suas observações"><?php echo $obs?></textarea>
			<br><br>
                    

            Nome Responsável:
            <input 	
            type="text"
            name="nomeResp"
            maxlength="6"
            size="6"
            required
            value="<?php echo $nomeResp; ?>"> 
			<br><br>
			
			Telefone Responsável:
            <input 	
            type="text"
            name="telefoneResp"
            maxlength="6"
            size="6"
            required
            value="<?php echo $telefoneResp; ?>"> 
            <br><br>

            <?php
			$checkM =""; 
			$checkF =""; 
			if ($genero =="F")
			$checkF ="checked";
			if ($genero =="M")
			$checkM ="checked";
			?>		
					
			Gênero:
			<input type="radio"  name="genero" id="generoM" value="M" <?php echo $checkM;?> >Masculino
			<input type="radio"  name="genero" id="generoF" value="F" <?php echo $checkF;?> >Feminino
			<br><br>
			

            <input type="submit" value="Cadastrar Alteração">
            
            </fieldset>	
		</form>
		
		<hr>
		<a href="FuncionarioListagemCadastro.php"><button>Cancelar alteração clique para voltar</button></a>
		<br><br>
		<a href="../login/logout.php"><button>Sair</button></a>
		<hr>
		
	</body>
</html>