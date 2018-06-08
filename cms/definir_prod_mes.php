<?php
//abrindo sessão
session_start();

$id = $_POST['id'];

//pega a id do estabelecimento
$estab = $_POST['estab'];

$idEst = 1;

if($estab == 'ativo1'){
	$idEst = 1;
}

if($estab == 'ativo2'){
	$idEst = 2;
}

$conexao = @mysqli_connect('192.168.0.2', 'pc320181', 'senai127', 'dbpc320181');

//tira todos os outros produtos do mes ativos
$sql = "update tbl_produto set prodMes = 0 where idEstabelecimento = ".$idEst;

mysqli_query($conexao, $sql);

//insere o produto no banco
$sql = "update tbl_produto set prodMes = 1 where idProduto = ".$id;

mysqli_query($conexao, $sql);
?>