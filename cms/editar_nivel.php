<?php
//Abre a sessão
session_start();

//abre a conexão
$conexao = @mysqli_connect('192.168.0.2', 'pc320181', 'senai127', 'dbpc320181');

$id = $_GET['id'];

//pega os dados antigos
if(isset($_GET['id'])){

    $sql = "select * from tbl_nivel where idNivel = ".$id.';';

    $resultadoSelect = mysqli_query($conexao, $sql);

    while($nivel = mysqli_fetch_array($resultadoSelect)){
        $nome = $nivel['nomeNivel'];
    }
}

//salva os dados novos
if(isset($_POST['btnSalvar'])){

    $sql = "update tbl_nivel set nomeNivel='".$_POST['nome_nivel']."' where idNivel=".$id;

    //echo($sql);
    
    mysqli_query($conexao, $sql);
    
    header('location:adm_niveis.php');
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
                <form name="novo_nivel" method="post" action="editar_nivel.php?id=<?php echo($id) ?>">
                    <input type="text" name="nome_nivel" maxlength="20" placeholder="Insira o nome do novo nivel" maxlength="20" value="<?php echo($nome);?>">
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