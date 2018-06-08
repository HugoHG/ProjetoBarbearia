<?php
//inicia a sessão
session_start();
//pega as variáveis digitadas
$_SESSION["nomeUsuario"] = "";
$_SESSION['logado'] = 0;
$loginUser = $_POST['txtUsuario'];
$loginPass = $_POST['txtSenha'];
$controle = 0;

//conecta com o banco
$conexao = @mysqli_connect('192.168.0.2', 'pc320181', 'senai127', 'dbpc320181');

$sql = "select * from tbl_usuarios";

$resultadoSelect = mysqli_query($conexao, $sql);

//verifica usuário e senha no banco
while ($item = mysqli_fetch_array($resultadoSelect)){
	$usuario = $item['usuario'];
	$senha = $item['senha'];
	$_SESSION["nomeUsuario"] = $item['nomeUsuario'];
	if ($usuario == $loginUser){
		if ($senha == $loginPass){
			$_SESSION["logado"] = 1;
			header('location: cms/cms.php');
			$controle = 1;
		}
	}
}
if($controle == 0){
	header('location: homebarbearia.php?errologin=1');
}
?>