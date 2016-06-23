<?php
	class Aluno{
		private $nome;
		private $dataNasc;

		public function __construct($nome, $dataNasc){
			$this->setNome($nome);
			$this->setDataNasc($dataNasc);
		}
		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}
		public function getDataNasc(){
			return $this->dataNasc;
		}
		public function setDataNasc($dataNasc){
			$data = explode( '/' , $dataNasc) ;
			$this->dataNasc = "$data[2]-$data[1]-$data[0]";
		}
	}
?>
