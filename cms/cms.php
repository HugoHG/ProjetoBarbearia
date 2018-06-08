<?php
//Conecta com o banco
session_start();
$conexao = @mysqli_connect('192.168.0.2', 'pc320181', 'senai127', 'dbpc320181');

$sql = "select * from tbl_nivel";

$resultadoSelect = mysqli_query($conexao, $sql);

/*while($valor = mysqli_fetch_array($resultadoSelect)){
    echo($valor['nomeNivel']);
}*/

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
                <div id="div_img_banner">
                    <img src="../imagens/logobarbearia.jpg" id="img_banner">
                </div>
                <p id="nomeUsuario">Bem-vindo, <?php echo($_SESSION["nomeUsuario"]) ?></p>
                <a href="logout.php">LOGOUT</a>
            </div>
            <?php
            include('menu.php');
            ?>
            <div id="content">

            </div>
        </div>
    </body>
    </html>
<?php   
} else {
    echo("Login não realizado");
}
?>