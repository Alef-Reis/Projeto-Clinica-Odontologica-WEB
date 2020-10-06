<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Agendamentos</title>

</head>
	<body>

		<h2>Cadastro de Agendamentos - Clínica Odontológica</h2>
		
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


			<form	action="AgendamentoGravarCadastro.php"
				method="post"
				enctype="multipart/form-data">
							
            
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

			
			Nome do Tratamento:
					<select name="tratamento" required>
					<option value="">Selecione o Tratamento</option>
					<option value="canal">Canal</option>
					<option value="aparelho">Aparelho</option>
					<option value="radiografia">Radiografia</option>
					<option value="limpeza">Limpeza</option>
					</select> <br><br>

					Data:
				    <input	
					type="date"
					name="dataAgendamento"
					min="1910-01-31"
					max="2020-12-31"
					required> <br><br>

					<label for="horario">Horário:</label>
					<input type="time" 
					id="appt" 
					name="horario"
					min="09:00" 
					max="18:00" 
					required> <br><br>

			
					Cpf Paciente:
					<input 	
					type="text"
					name="cpfPaciente"
					maxlength="15"
					size="25"
					required
					readonly
					value="<?php echo $cpfPaciente; ?>">
					<br><br>

					Nome Paciente:
					<input 	
					type="text"
					name="nomePaciente"
					maxlength="15"
					size="25"
					required
					readonly
					value="<?php echo $nomePaciente; ?>">
					<br><br>
                
            

			<input type="submit" value="Cadastrar Agendamento">
			
			<input type="reset" value="Limpar Dados">

            
            </fieldset>	
		</form>
		
		<hr>
		<a href="AgendamentoListagemCadastro.php"><button>Cancelar alteração clique para voltar</button></a>
		<br><br>
		<a href="../login/logout.php"><button>Sair</button></a>
		<hr>
		
	</body>
</html>