<?php
//pega o design
if($design == "css/style.css"){
    echo('<img src="imagens/logobarbearia.jpg" id="imglogo" alt="Logo do site">');
} elseif($design == "css/style2.css"){
    echo('<img src="imagens/penelope.png" id="imglogo" alt="Logo do site">');
}
?>

<nav>
    <ul id="menu">
        <li><a href="homebarbearia.php?design=<?php echo($design); ?>">Home</a></li>
        <li>Produtos
            <ul class="submenu">
                <li><a href="produtos_servicos.php?design=<?php echo($design); ?>">Produtos e serviços em destaque</a></li>
                <li><a href="promocoes.php?design=<?php echo($design); ?>">Promoções</a></li>
                <li><a href="produtos_do_mes.php?design=<?php echo($design); ?>">Produto do mês</a></li>
            </ul>
        </li>
        <li>Sobre
            <ul class="submenu">
                <li><a href="sobre.php?design=<?php echo($design); ?>">Sobre a barbearia e o centro estético</a></li>
                <li><a href="lojas.php?design=<?php echo($design); ?>">Lojas</a></li>
            </ul>
        </li>
        <li><a href="faleconosco.php?design=<?php echo($design); ?>">Fale Conosco</a></li>
    </ul>
</nav>
<form name="frmLogin" method="post" action="login.php">
    <input type="submit" value="Ok" id="btnOk">
    <div class="camposlogin">
        <p>Senha</p>
        <input type="text" name="txtSenha">
    </div>
    <div class="camposlogin">
        <p>Usuario</p>
        <input type="txtUsuario" name="txtUsuario">
    </div>
</form>