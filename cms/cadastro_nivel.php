<?php
$conexao = @mysql_connect('localhost', 'root', 'bcd127');

mysql_select_db('db_centroestetico');

if(isset($_POST['btnSalvar'])){
    
    $nome_nivel = $_POST['nome_nivel'];

    $sql = 'insert into tbl_nivel(nomeNivel) values ("'.$nome_nivel.'");';
    
    echo($sql);

    mysql_query($sql);
    
    header('location:cms.php');
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
                <form name="novo_nivel" method="post" action="cadastro_nivel.php">
                    <input type="text" name="nome_nivel" placeholder="Insira o nome do novo nivel" maxlength="20">
                    <input type="submit" name="btnSalvar" value="Salvar">
                </form>
            </div>
        </div>
    </body>
</html>