<?php
//Abrindo conexão com o banco
session_start();

$conexao = @mysqli_connect('192.168.0.2', 'pc320181', 'senai127', 'dbpc320181');

if(isset($_POST['btnSalvar'])){

	$nome_nivel = $_POST['nome_nivel'];

	//salvando no banco
	$sql = 'insert into tbl_nivel(nomeNivel) values ("'.$nome_nivel.'");';

	echo($sql);

	mysqli_query($conexao, $sql);

	header('location:cms.php');
}
if(@$_SESSION['logado'] == 1){
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>CMS</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div id="main">
			<div id="header">
				<h1 id="tituloCMS">CMS - Sistema de Gerenciamento do Site</h1>
				<div id="div_img_banner"><img src="../imagens/logobarbearia.jpg" id="img_banner"></div>
				<p id="nomeUsuario">Bem-vindo, <?php echo($_SESSION["nomeUsuario"]) ?></p>
				<a href="logout.php">LOGOUT</a>
			</div>
			<?php
			include('menu.php');
			?>
			<div id="content">
				<form name="novo_nivel" method="post" action="cadastro_produto.php">
					<input type="text" name="nome_nivel" placeholder="Insira o nome do novo nivel" maxlength="20">
					<input type="submit" name="btnSalvar" value="Salvar">
				</form>
			</div>
		</div>
	</body>
	</html>
	<?php   
} else {
	echo("Login não realizado");
}
?>