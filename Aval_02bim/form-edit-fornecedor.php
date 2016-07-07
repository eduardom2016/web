<?php
	require 'init-fornecedor.php';
    // pega o ID da URL
	$id = isset ($_GET['id']) ? (int) $_GET['id']: null;
	// valida o ID
 	if (empty ($id))
{
	echo "ID para alteração não definido";
 	exit;
}
 	// busca os dados do usuário a ser editado
 	$PDO = db_connect();
 	$sql = "SELECT nomeFornecedor,dataFundacao,email FROM fornecedores WHERE idFornecedor = :id";
	$stmt = $PDO->prepare($sql);
 	$stmt->bindParam(':id', $id , PDO::PARAM_INT);
 	$stmt->execute();
 	$fornecedor = $stmt->fetch(PDO::FETCH_ASSOC);
 	/* se o método fetch () não retornar um array
 	significa que o ID não corresponde a um usuário válido */
 	if (!is_array($fornecedor))
 	{
 		echo "Nenhum fornecedor encontrado";
 		exit;
 	}
 	$dataOK=dateConvert($fornecedor['dataFundacao']);
 ?>
 <!DOCTYPE html>
<html><head>
        <meta charset="utf-8">
        <title>SADAKA | Charity / Non-profit responsive Bootstrap HTML5 template</title>
        <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- Fonts -->
            <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700" rel="stylesheet" type="text/css">
            <link href="http://fonts.googleapis.com/css?family=Dosis:400,700" rel="stylesheet" type="text/css">
            <!-- Bootsrap -->
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <!-- Font awesome -->
            <link rel="stylesheet" href="assets/css/font-awesome.min.css">
            <!-- Owl carousel -->
            <link rel="stylesheet" href="assets/css/owl.carousel.css">
            <!-- Template main Css -->
            <link rel="stylesheet" href="assets/css/style.css">
            <link rel="stylesheet" href="estilo.css">
			<link rel="stylesheet" href="jquery-ui.css">
            <!-- Modernizr -->
            <script src="assets/js/modernizr-2.6.2.min.js"></script>
                     <script type="text/javascript" src="jquery-2.1.1.min.js"></script>
			 <script type="text/javascript" src="jquery-ui.js"></script>
           
            <script type="text/javascript" src="jquery.maskedinput.js"></script>
            <script type="text/javascript" src="datepicker-pt-BR.js"></script>
            <script type="text/javascript" src="script.js"></script>            
			<script type="text/javascript" src="calendario.js"></script>
			<script type = "text/javascript" src ="validacao.js"></script>
    </head>
                      
 <body>
<header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="navbar-top"></div>
                <div class="navbar-main">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.html"><img src="oficial.png" alt=""></a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse pull-right">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a class="is-active" href="index.html">HOME</a>
                                </li>
                                <li>
                                    <a href="cliente.php">CLIENTES</a>
                                </li>
                                <li>
                                    <a href="fornecedores.php">FORNECEDORES</a>
                                </li>
                                <li>
                                    <a href="sobre.html">SOBRE</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /#navbar -->
                    </div>
                    <!-- /.container -->
                </div>
                <!-- /.navbar-main -->
            </nav>
        </header>
        <!-- /. main-header -->
        <!-- Carousel==================================================- ->
    <div id="homeCarousel" class="carousel slide carousel-home" data-ride="carousel">

          <!-- Indicators -->
        <!-- /.carousel -->
        <!-- /.about-us -->
        <div class="section-home home-reasons"></div>
<div id="variavel">
 	<form method ="post" name="formAltera" action ="edit-fornecedor.php" enctype="
		multipart/form-data" onSubmit="return validacao()">
 	<h1> Edição de dados </h1>
 	<table width="100%">
 		<tr>
 		<th width="18%">Nome</th>
 		<td width="82%"><input type="text" name="txtNome" id="nome" value ="<?php echo
			$fornecedor ['nomeFornecedor']?>"></td>
 		</tr>
		
		<tr>
 		<th width="18%">Email</th>
 		<td width="82%"><input type="text" name="txtEmail" id="email" value ="<?php echo
			$fornecedor ['email']?>"></td>
 		</tr> 		
 		
 		<tr>
 			<th>Data de Fundacao</th>
 			<td ><input type="text " name="txtData" class="calendarioF" id="data" value="<?php echo
				$dataOK ?>" readonly></td>
		</tr>
		<tr>
 			<input type="hidden" name="id" value="<?php echo $id ?>">
 			<td><input type="submit" name="btnEnviar" value="Alterar"></td>
 			<td><input type="reset" name="btnLimpar" value="Limpar"></td>
 				</tr>
 			</table>
 		</form>
</div> 		
<footer class="main-footer">
            <div class="footer-top"></div>
            <div class="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4" id="redesocial">
                            <div class="footer-col">
                                <h4 class="footer-title" style="margin-left: 300px; text-align:center;">REDES SOCIAIS
                                    <span class="title-under"></span>
                                </h4>
                                <div class="footer-content"></div>
                                
                                <a class="fa fa-5x fa-fw hub fa-linkedin" href="https://br.linkedin.com/in/marcelo-mussel-959a359" id="icon"></a>
                                <a class="fa fa-5x fa-fw hub fa-git-square" href="https://github.com/marcelomussel" id="icon"></a>
                                <a class="fa fa-5x fa-fw hub fa-facebook-official" href="https://www.facebook.com/marcelomussel?fref=ts" id="icon"></a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container text-right" id="direitos">Mussel Enterprises @ Todos os Direitos Reservados 2016 - Desenvolvedor:
                    <a href="http://www.ouarmedia.com" target="_blank">Eduardo Martins Ramos</a>
                </div>
            </div>
        </footer>

 	</body>
 </html>
