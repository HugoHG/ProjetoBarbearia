<?php
$conexao = @mysql_connect('localhost', 'root', 'bcd127');

mysql_select_db('db_centroestetico');    

$id = $_GET['id'];

if(isset($_GET['id'])){

    $sql = "select * from tbl_nivel where idNivel = ".$id.';';

    $resultadoSelect = mysql_query($sql);

    while($nivel = mysql_fetch_array($resultadoSelect)){
        $nome = $nivel['nomeNivel'];
    }
}

if(isset($_POST['btnSalvar'])){

    $sql = "update tbl_nivel set nomeNivel='".$_POST['nome_nivel']."' where idNivel=".$id;

    //echo($sql);
    
    mysql_query($sql);
    
    header('location:adm_niveis.php');
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
                <form name="novo_nivel" method="post" action="editar_nivel.php?id=<?php echo($id) ?>">
                    <input type="text" name="nome_nivel" placeholder="Insira o nome do novo nivel" maxlength="20" value="<?php echo($nome);?>">
                    <input type="submit" name="btnSalvar" value="Salvar">
                </form>
            </div>
        </div>
    </body>
</html>