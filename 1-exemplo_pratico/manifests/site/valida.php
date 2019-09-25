<?php
	session_start();
	//Incluindo a conexão com banco de dados
	include_once("conecta.php");
	//O campo usuário e senha preenchido entra no if para validar
	if((isset($_POST['username'])) && (isset($_POST['password']))){
		$usuario = mysqli_real_escape_string($conexao, $_POST['username']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$senha = mysqli_real_escape_string($conexao, $_POST['password']);
		/*$senha = md5($senha);*/

		//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
		$result_usuario = "SELECT * FROM Usuario WHERE login = '$usuario' && senha = '$senha'";
		$resultado_usuario = mysqli_query($conexao, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);

		//Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		if(isset($resultado)){
			$_SESSION['usuarioId'] = $resultado['cod_user'];
			$_SESSION['usuarioNome'] = $resultado['nome_user'];
			$_SESSION['usuarioEmail'] = $resultado['email'];
			 header("Location: veiculo-lista.php");
		//Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		//redireciona o usuario para a página de login
		}else{
			//Váriavel global recebendo a mensagem de erro
			$_SESSION['loginErro'] = "Usuário ou senha Inválido";
			header("Location: login.php");
		}
	//O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
	}else{
		$_SESSION['loginErro'] = "Usuário ou senha inválido";
		header("Location: login.php");
	}
?>
