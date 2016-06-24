<?php
	require_once 'init.php';
	include_once 'cliente.class.php';
	
	
	// pega os dados do formulário
	$nomeCliente = isset ($_POST['txtNome'])?$_POST['txtNome']:null;
	$email = isset ($_POST['txtEmail'])?$_POST['txtEmail']:null;
	$dataCadastro = isset ($_POST['txtData'])?$_POST['txtData']:null ;

	// validação simples se campos estão vazios
	if( empty ( $nomeCliente ) || empty ( $email) || empty ( $dataCadastro)){
		echo "Campos devem ser preenchidos!!";
		exit ;
	}

	// instancia objeto aluno
	$cliente = new clientes($nomeCliente,$email,$dataCadastro);

	// insere no BD
	$PDO = db_connect() ;
	$sql = "INSERT INTO clientes(nomeCliente,email,dataCadastro) VALUES (:nomeCliente , :email , :dataCadastro)";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':nomeCliente' ,$cliente->getNomeCliente());
	$stmt->bindParam(':email' ,$cliente->getEmail());
	$stmt->bindParam(':dataCadastro' ,$cliente->getDataCadastro());
	if($stmt->execute()){
		header ('Location: index.php');
	}else{
		echo "Erro ao cadastrar!!";
		print_r( $stmt->errorInfo());
	}
?>
