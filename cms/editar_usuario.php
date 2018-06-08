<?php
//Abre a sessão
session_start();

//abre a conexão
$conexao = @mysqli_connect('192.168.0.2', 'pc320181', 'senai127', 'dbpc320181');

$id = $_GET['id'];

//pega os dados antigos
if(isset($_GET['id'])){

    $sql = "select * from tbl_usuarios where idUsuario = ".$id.';';

    $resultadoSelect = mysqli_query($conexao, $sql);

    while($usuario = mysqli_fetch_array($resultadoSelect)){
        $loginUsuario = $usuario['usuario'];
        $senhaUsuario = $usuario['senha'];
        $nomeUsuario = $usuario['nomeUsuario'];
    }
}

//salva os dados novos
if(isset($_POST['btnSalvar'])){

    $sql = "update tbl_usuarios set nomeUsuario='".$_POST['nome_usuario']."', usuario='".$_POST['login_usuario']."', senha='".$_POST['senha_usuario']."' where idUsuario=".$id;

    //echo($sql);
    
    mysqli_query($conexao, $sql);
    
    header('location:adm_usuarios.php');
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
    <?php   
} else {
    echo("Login não realizado");
}
?>