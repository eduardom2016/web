<?php
	require_once 'init.php';
	include_once 'aluno.class.php';
	$id = isset($_POST ['id']) ? $_POST['id'] : null;
	$name = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;	
$dataNasc = isset( $_POST['txtData']) ? $_POST['txtData'] : null;
// validação simples se campos estão vazios
		if ( empty($name) || empty ($dataNasc))
{
	echo "Campos devem ser preenchidos!!";
exit;
}
// instancia objeto aluno
	$aluno = new Aluno ($name,$dataNasc,$file_src);
// atualiza o BD
	$PDO =db_connect () ;
	$sql = "UPDATE aluno2 SET nome = : name, dataNasc = :data, WHERE idAluno = :id";
	$stmt = $PDO -> prepare($sql);
	$stmt -> bindParam(':name', $aluno->getNome());
	$stmt -> bindParam(':data', $aluno->getDataNasc());
	$stmt -> bindParam(':id', $id , PDO ::PARAM_INT);
if ($stmt->execute())
{
	header ('Location: index.php');
}
else
{
	echo "Erro ao alterar";
	print_r($stmt-> errorInfo());
}
?>
