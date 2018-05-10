<?php
$conexao = @mysql_connect('localhost', 'root', 'bcd127');

mysql_select_db('db_centroestetico');    

$id = $_GET['id'];

if(isset($_GET['id'])){

    $sql = "select * from tbl_usuarios where idUsuario = ".$id.';';

    $resultadoSelect = mysql_query($sql);

    while($usuario = mysql_fetch_array($resultadoSelect)){
        $loginUsuario = $usuario['usuario'];
        $senhaUsuario = $usuario['senha'];
        $nomeUsuario = $usuario['nomeUsuario'];
    }
}

if(isset($_POST['btnSalvar'])){

    $sql = "update tbl_usuarios set nomeUsuario='".$_POST['nome_usuario']."', usuario='".$_POST['login_usuario']."', senha='".$_POST['senha_usuario']."' where idUsuario=".$id;

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
                <form name="novo_nivel" method="post" action="editar_usuario.php?id=<?php echo($id) ?>">
                    <input type="text" name="nome_usuario" placeholder="Insira o nome do novo nivel" maxlength="20" value="<?php echo($nomeUsuario);?>">
                    <input type="text" name="login_usuario" placeholder="Insira o nome do novo nivel" maxlength="20" value="<?php echo($loginUsuario);?>">
                    <input type="text" name="senha_usuario" placeholder="Insira o nome do novo nivel" maxlength="20" value="<?php echo($senhaUsuario);?>">
                    <input type="submit" name="btnSalvar" value="Salvar">
                </form>
            </div>
        </div>
    </body>
</html>