<?php 
	class fornecedores{
		//decarando variaveis//
		private $nomeFornecedor;
		private $email;
		private $dataFundacao;

		//construtor//
		public function __construct($nomeFornecedor, $email, $dataFundacao){
			$this->setNomeFornecedor($nomeFornecedor);
			$this->setEmail($email);
			$this->setDataFundacao($dataFundacao);
		}
		//pega e entrega NOME//
		public function setNomeFornecedor($nomeFornecedor){
			$this->nomeFornecedor= $nomeFornecedor;
		}
		public function getNomeFornecedor(){
			return $this->nomeFornecedor;
		}
		
		//pega e entrega EMAIL//
		public function setEmail($email){
			$this->email= $email;
		}
		public function getEmail(){
			return $this->email;
		}		
		
		
		//pega e entrega DATA CADASTRO//
		public function setDataFundacao($dataFundacao){
			$data = explode('/',$dataFundacao);
			$this->dataFundacao= "$data[2]-$data[1]-$data[0]";			
		}
		public function getDataFundacao(){
			return $this->dataFundacao;
		}
		
	}

?>
