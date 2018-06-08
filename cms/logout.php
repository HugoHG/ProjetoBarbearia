<?php
//pega a sessao
session_start();
//esvazia as variáveis
unset($_SESSION["nomeUsuario"]);
unset($_SESSION['logado']);
//destrói a sessão
session_destroy();
header('location:../homebarbearia.php');
?>