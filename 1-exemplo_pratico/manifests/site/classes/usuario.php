
<?php
	require_once "pessoa.php";

     class Usuario extends Pessoa
     {
      private $login;
			private $senha;
			private $email;

      public function criarUsuario($nomeP, $ultimoNomeP, $cpfP, $rgP,
				$dataNascimentoP, $idadeP, $enderecoP, $loginP, $senhaP, $emailP)
            {
				   $this->setNome($nomeP);
				   $this->setUltimoNome($ultimoNomeP);
				   $this->setCpf($cpfP);
				   $this->setRg($rgP);
				   $this->setDataNascimento($dataNascimentoP);
				   $this->setIdade($idadeP);
				   $this->setEndereco($enderecoP);
				   $this->setLogin($loginP);
				   $this->setSenha($senhaP);
				   $this->setEmail($emailP);
            }

			public function insert($conexao)
			{
				$con = $conexao->conectar();

				$query = "INSERT INTO USER(nome, ultimoNome, cpf, rg, dataNascimento, idade, endereco, login, senha, email)
							values(
                '" . $this->getNome() . "',
								'" . $this->getUltimoNome() . "',
								'" . $this->getCpf() . "',
								'" . $this->getRg() ."',
								'" . $this->getDataNascimento() . "',
								" .  $this->getIdade() . ",
								'" . $this->getEndereco() ."',
								'" . $this->getLogin() . "',
								'" . $this->getSenha() . "',
								'" . $this->getEmail() ."'
							)";

				$stmt = $con->prepare($query);
				return $stmt->execute();
			}

			public function update($loginp, $conexao)
			{
				$con = $conexao->conectar();

				$query = "UPDATE USER SET
								nome='" . $this->getNome() . "',
								ultimoNome='" . $this->getUltimoNome() . "',
								cpf='" . $this->getCpf() . "',
								rg='" . $this->getRg() . "',
								dataNascimento='" . $this->getDataNascimento() . "',
								idade='" . $this->getIdade() . "',
								endereco='" . $this->getEndereco() . "',
								login='" . $this->getLogin() . "',
								senha='" . $this->getSenha() . "',
								email='" . $this->getEmail() . "'
						  WHERE login = '$loginp'";

				$stmt = $con->prepare($query);
				return $stmt->execute();
			}

			public function delete($loginp, $conexao)
			{
				$con = $conexao->conectar();

				$query = "DELETE FROM USER WHERE login = '$loginp'";

				$stmt = $con->prepare($query);

				return $stmt->execute();
			}

			public function verificaUsuario($loginp, $senhap, $conexao)
			{
				$con = $conexao->conectar();

				$query = "SELECT * FROM USER WHERE login = '$loginp' AND senha = '$senhap'";

				$rs = $con->query($query);

				return $rs;
			}

			public function retornaUsuario($loginp, $conexao)
			{
				$con = $conexao->conectar();

				$query = "SELECT * FROM USER WHERE login = '$loginp'";

				$rs = $con->query($query);

				return $rs;
			}

			public function retornaTodosUsuarios($conexao)
			{
				$con = $conexao->conectar();

				$query = "SELECT * FROM USER";

				$rs = $con->query($query);

				return $rs;
			}

			public function imprimeDados()
			{
				   echo "Nome: " . $this->getNome();
   				   echo "<br>";
				   echo "Ultimo Nome: " . $this->getUltimoNome();
   				   echo "<br>";
				   echo "CPF: " . $this->getCpf();
   				   echo "<br>";
				   echo "RG: " . $this->getRg();
   				   echo "<br>";
				   echo "Data Nascimento: " . $this->getDataNascimento();
   				   echo "<br>";
				   echo "Idade: " . $this->getIdade();
   				   echo "<br>";
				   echo "Endereco: " . $this->getEndereco();
				   echo "<br>";
				   echo "Login: " . $this->getLogin();
				   echo "<br>";
				   echo "Senha: " . $this->getSenha();
				   echo "<br>";
				   echo "Email: " . $this->getEmail();
				   echo "<br>";
				   echo "<br>";
			}

			public function getLogin()
			{
				return $this->login;
			}

			public function setLogin($loginP)
			{
				$this->login = $loginP;
			}

			public function getSenha()
			{
				return $this->senha;
			}

			public function setSenha($senhaP)
			{
				$this->senha = $senhaP;
			}

			public function getEmail()
			{
				return $this->email;
			}

			public function setEmail($emailP)
			{
				$this->email = $emailP;
			}
     }
?>
