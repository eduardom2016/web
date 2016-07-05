<?php
	require_once 'init-fornecedor.php';
 	include_once 'fornecedor.class.php';
 	

		 // pega os dados do formulário
		 $id = isset ($_POST['id']) ? $_POST['id']:null;
 		$nomeFornecedor = isset ( $_POST ['txtNome']) ? $_POST ['txtNome']:null;
 		$email = isset ( $_POST ['txtEmail']) ? $_POST ['txtEmail']:null;
 		$dataFundacao = isset ($_POST['txtData']) ? $_POST ['txtData']:null;
 		// validação simples se campos estão vazios
 		if (empty ($nomeFornecedor) || empty ($email) || empty ($dataFundacao))
 		{
 			echo "Campos devem ser preenchidos!!";
 			exit;
 		}
 		// instancia objeto aluno
 		$fornecedor = new fornecedores($nomeFornecedor,$email,$dataFundacao);
 		// atualiza o BD
 		$PDO = db_connect();
 		$sql = "UPDATE fornecedores SET nomeFornecedor = :name,email = :email,dataFundacao = :data
			WHERE idFornecedor = :id";
 		$stmt = $PDO->prepare($sql);
		$stmt->bindParam(':name',$fornecedor->getNomeFornecedor());
 		$stmt->bindParam(':email',$fornecedor->getEmail());
 		$stmt->bindParam(':data',$fornecedor->getDataFundacao());
 		$stmt->bindParam(':id', $id,PDO::PARAM_INT);

 		if ($stmt->execute())
 		{
 			header ('Location:index.html');
 		}
 		else
 		{
 			echo "Erro ao alterar";
 			print_r($stmt->errorInfo());
 		}
 		?>
