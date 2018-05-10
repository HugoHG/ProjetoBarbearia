<?php
$conexao = @mysql_connect('localhost', 'root', 'bcd127');

mysql_select_db('db_centroestetico');

if(isset($_POST['btnSalvar'])){

    $sql = 'insert into tbl_usuarios(nomeUsuario, usuario, senha) values ("'.$_POST['nome_usuario'].'", "'.$_POST['login_usuario'].'", "'.$_POST['senha_usuario'].'");';

    //echo($sql);

    mysql_query($sql);

    header('location:adm_usuarios.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CMS</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div id="main">
            <div id="header">
                <h1 id="tituloCMS">CMS - Sistema de Gerenciamento do Site</h1>
                <div id="div_img_banner"><img src="../imagens/logobarbearia.jpg" id="img_banner"></div>
            </div>
            <?php
            include('menu.php');
            ?>
            <div id="content">
                <form name="novo_nivel" method="post" action="cadastro_usuario.php">
                    <table>
                        <tr><td><input type="text" name="nome_usuario" placeholder="Insira o nome do novo usuario" maxlength="100"></td></tr>
                        <tr><td><input type="text" name="login_usuario" placeholder="Insira o login do novo usuario" maxlength="50"></td></tr>
                        <tr><td><input type="text" name="senha_usuario" placeholder="Insira a senha do novo usuario" maxlength="20"></td></tr>
                        <tr><td><input type="submit" name="btnSalvar" value="Salvar"></td></tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>