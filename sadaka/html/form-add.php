<?php
	require 'init.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title> Envio de dados </title>
		<meta charset="utf-8">
		<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="jquery.maskedinput.js"></script>
	</head>
	<body>
		<form method="post" name="formCadastro" action="add.php">
			<h1> Cadastro de Alunos </h1>
			<table width="100%">
			<tr>
				<th width="18%">Nome</th>
				<td width="82%"><input type="text" name="txtNome"></td>
			</tr>
			<tr>
				<th>Data de Nascimento</th>
				<td><input type="text" name="txtData" id="data"></td>
			</tr>
			<tr>
				<td><input type="submit" name="btnEnviar" Value="Enviar"></td>
				<td><input type="reset" name="btnLimpar" Value="Limpar"></td>	
			</tr>
			</table>
			<script language="JavaScript" type="text/javascript">		
				$("#data").mask("99/99/9999");		
			</script>
		</form>
	</body>
</html>
