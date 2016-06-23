<?php
	require_once 'init.php';
	include_once 'aluno.class.php';
	                                                                       

	// pega os dados do formulário
	$name = isset ($_POST['txtNome'])?$_POST['txtNome']:null;
	$dataNasc = isset ($_POST['txtData'])?$_POST['txtData']:null ;

	// validação simples se campos estão vazios
	if( empty ( $name ) || empty ( $dataNasc) ){
		echo "Campos devem ser preenchidos!!";
		exit ;
	}

	// instancia objeto aluno
	$aluno = new Aluno($name,$dataNasc,$file_src);

	// insere no BD
	$PDO = db_connect() ;
	$sql = "INSERT INTO aluno(nome,dataNasc,foto) VALUES (:name , :dataNasc , :foto)";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':name' ,$aluno->getNome());
	$stmt->bindParam(':dataNasc' ,$aluno->getDataNasc());
	if($stmt->execute()){
		header ('Location: index.php');
	}else{
		echo "Erro ao cadastrar!!";
		print_r( $stmt->errorInfo());
	}
?>
