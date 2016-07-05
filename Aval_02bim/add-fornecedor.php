<?php
	require_once 'init-fornecedor.php';
	include_once 'fornecedor.class.php';
	
	
	// pega os dados do formulário
	$nomeFornecedor = isset ($_POST['txtNome'])?$_POST['txtNome']:null;
	$email = isset ($_POST['txtEmail'])?$_POST['txtEmail']:null;
	$dataFundacao = isset ($_POST['txtData'])?$_POST['txtData']:null ;

	// validação simples se campos estão vazios
	if( empty ( $nomeFornecedor ) || empty ( $email) || empty ( $dataFundacao)){
		echo "Campos devem ser preenchidos!!";
		exit ;
	}

	// instancia objeto aluno
	$fornecedor = new fornecedores($nomeFornecedor,$email,$dataFundacao);

	// insere no BD
	$PDO = db_connect() ;
	$sql = "INSERT INTO fornecedores(nomeFornecedor,email,dataFundacao) VALUES (:nomeFornecedor , :email , :dataFundacao)";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':nomeFornecedor' ,$fornecedor->getNomeFornecedor());
	$stmt->bindParam(':email' ,$fornecedor->getEmail());
	$stmt->bindParam(':dataFundacao' ,$fornecedor->getDataFundacao());
	if($stmt->execute()){
		header ('Location: index.html');
	}else{
		echo "Erro ao cadastrar!!";
		print_r( $stmt->errorInfo());
	}
?>
