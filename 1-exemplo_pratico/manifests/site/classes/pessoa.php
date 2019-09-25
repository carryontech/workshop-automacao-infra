<?php
  class Pessoa {

      private $nome;
      private $ultimonome;
      private $cpf;
      private $rg;
      private $datanasc;
      private $idade;
      private $endereco;

      public function criaPessoa($nomeP, $ultimoNomeP, $cpfP, $rgP, $dataNascimentoP, $idadeP, $enderecoP);
          {
         $this->setNome($nomeP);
         $this->setUltimoNome($ultimoNomeP);
         $this->setCpf($cpfP);
         $this->setRg($rgP);
         $this->setDataNascimento($dataNascimentoP);
         $this->setIdade($idadeP);
         $this->setEndereco($enderecoP);
          }

      public function getNome()
			{
				return $this->nome;
			}

			public function setNome($nomeP)
			{
				$this->nome = $nomeP;
			}

			public function getUltimoNome()
			{
				return $this->ultimoNome;
			}

			public function setUltimoNome($ultimoNomeP)
			{
				$this->ultimoNome = $ultimoNomeP;
			}

			public function getCpf()
			{
				return $this->cpf;
			}

			public function setCpf($cpfP)
			{
				$this->cpf = $cpfP;
			}

			public function getRg()
			{
				return $this->rg;
			}

			public function setRg($rgP)
			{
				$this->rg = $rgP;
			}

			public function getDataNascimento()
			{
				return $this->dataNascimento;
			}

			public function setDataNascimento($dataNascimentoP)
			{
				$this->dataNascimento = $dataNascimentoP;
			}

			public function getIdade()
			{
				return $this->idade;
			}

			public function setIdade($idadeP)
			{
				$this->idade = $idadeP;
			}

			public function getEndereco()
			{
				return $this->endereco;
			}

			public function setEndereco($enderecoP)
			{
				$this->endereco = $enderecoP;
			}



  }

 ?>
