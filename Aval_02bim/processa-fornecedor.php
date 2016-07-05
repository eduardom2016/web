<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Cadastro</title>	
		<meta charset="utf-8">
	</head>
	<body>
		<?php
			include_once 'fornecedor.class.php';
			include_once 'conexao.class-fornecedor.php';
			$camposOK=true;
			
			//Recebe o valor dos campos//
			
			$nomeFornecedor = $_POST["txtNome"]; //post metodo de envio de dados			
			$email = $_POST["txtEmail"];
			$dataFundacao = $_POST["txtData"];
			$data = explode("/",$dataFundacao);
	
			//Verifica nome//
			if ( $nomeFornecedor == "" ){
				echo "Informe o nome <br>";
				$camposOK = false;
			}
			
			//Valida data//
			if (($data[2] <= 2016) && ($data[2]>0000)){				
				if (($data[1] == 04) || ($data[1] == 06)  || ($data[1] == 09) || ($data[1] == 11)){
					if(($data[0] <= 30) && ($data[0] > 00)){	
					}else{	
						$camposOK = false;
					}
				} else if (($data[1] == 01) || ($data[1] == 03)  || ($data[1] == 05) || ($data[1] == 07) || ($data[1] == 08)|| ($data[1] == 10)|| ($data[1] == 12) ){
					if(($data[0] <= 31) && ($data[0] > 00)){	
					}else{	
						$camposOK = false;
					}
				}else if ($data[1] == 02){
					if ($data[2] % 4 ==0){
						if ($data[2] % 100 !=0){
							if ($data[0] <= 29){
							} else if ($data[2] % 400 ==0){
									if (($data[0] <= 29) && ($data[0] > 00)){						
									}else{	
										$camposOK = false;
									}
							} else if (($data[0] <= 28) && ($data[0] > 00)){
								}else{
									$camposOK = false;
								}
						}else{
							$camposOK = false;
						}
					}else{
						echo "A data está inválida <br>";
						$camposOK = false;
					}
				}
			}
			
			
			
			//Escrever tudo
			if( $camposOK ){
				
				$fornecedor = new clientes($nomeFornecedor,$email,$dataFundacao);
				$MySQL = new MySQL;
				
				try{
					$MySQL->inserirFornecedor($fornecedor->getNomeFornecedor(), $fornecedor->getEmail(), $fornecedor->getDataFundacao());
					echo "Dados gravados com sucesso <br>";
				}catch (Exception $e){
					echo "Erro ao inserir: ". $e->getMessage() . "<br>" ;
				}
			}
		?>
	</body>
</html>
