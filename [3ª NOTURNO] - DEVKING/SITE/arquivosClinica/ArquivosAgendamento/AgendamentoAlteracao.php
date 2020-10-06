<html> 
	<head>
		<title>Alteração de Agendamento</title>
	</head>
	<body>
		<h2>Alteração de Agendamento</h2>
		
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
			$sql = "SELECT * FROM AGENDAMENTO WHERE CODIGO_AGENDAMENTO=$codigo";
			
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
			$id 				= $dados['CODIGO_AGENDAMENTO'];
			$tratamento			= $dados['NOME_TRATAMENTO'];
			$dataAgendamento 	= $dados['DATA_AGENDAMENTO'];
			$horario 			= $dados['HORA_AGENDAMENTO'];
			//$cpfDentista		= $dados['CPF_FUNCIONARIO'];
			//$nomeDentista		= $dados['NOME_FUNCIONARIO'];

			?>

			<?php

			//Conectando o PHP no servidor MYSQL
			include '../ArquivoConexaoPhp/conexao.php';

			// mysql select query
			$query = "SELECT * FROM `FUNCIONARIO`";

			// for method 1

			$result1 = mysqli_query($con, $query);

			// for method 2

			$result2 = mysqli_query($con, $query);

			$options = "";

			while($row2 = mysqli_fetch_array($result2))
			{
				$options = $options."<option>$row2[1]</option>";
			}

			?>

			<form	action="AgendamentoGravarAlteracao.php"
				method="post"
				enctype="multipart/form-data">
				
			<input type="hidden" name="id" value="<?php echo $codigo; ?>">
			
            
            <fieldset>
					<legend><h3>Mais detalhes</h3></legend>
			
            <meta charset="utf-8">

					Nome Dentista:
					<select select name="nomeDentista" required>
					<option value="">Selecione o Denstista</option>

           	 		<?php while($row1 = mysqli_fetch_array($result1)):;?>

            		<option value="<?php echo $row1['CPF_FUNCIONARIO'];?>"><?php echo $row1['NOME_FUNCIONARIO'];?></option>

            		<?php endwhile;?>

        			</select><br><br>

					Código do Agendamento:
					<input 	
					type="text"
					name="id"
					maxlength="15"
					size="5"
					required
					readonly
					style="text-align:center"
					value="<?php echo $id; ?>">
					<br><br>
						

					<?php
					$opcaoC =""; 
					$opcaoA ="";
					$opcaoR ="";
					$opcaoL ="";
					if ($tratamento=="canal")
					$opcaoC ="selected";
					if ($tratamento=="aparelho")
					$opcaoA ="selected";
					if ($tratamento=="radiografia")
					$opcaoR ="selected";
					if ($tratamento=="limpeza")
					$opcaoL ="selected";
					?>
    			
					Nome do Tratamento:
					<select name="tratamento" required>
					<option value="">Selecione o Tratamento</option>
					<option value="canal" <?php echo $opcaoC; ?> >Canal</option>
					<option value="aparelho" <?php echo $opcaoA; ?> >Aparelho</option>
					<option value="radiografia" <?php echo $opcaoR; ?> >Radiografia</option>
					<option value="limpeza" <?php echo $opcaoL; ?> >Limpeza</option>
					</select> <br><br>

					Data:
				    <input	
					type="date"
					name="dataAgendamento"
					min="1910-01-31"
					max="2020-12-31"
					required
					value="<?php echo $dataAgendamento;?>">
					<br><br>

					<label for="horario">Horário:</label>
					<input type="time" 
					id="appt" 
					name="horario"
					min="09:00" 
					max="18:00" 
					value="<?php echo $horario;?>">
					<br><br>



			

            <input type="submit" value="Cadastrar Alteração">
            
            </fieldset>	
		</form>
		
		<hr>
		<a href="AgendamentoListagemCadastro.php"><button>Cancelar alteração clique para voltar</button></a>
		<br><br>
		<a href="../login/logout.php"><button>Sair</button></a>
		<hr>
		
	</body>
</html>