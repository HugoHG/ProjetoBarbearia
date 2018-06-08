<?php
//Abrindo conexão com o banco
session_start();

$conexao = @mysqli_connect('192.168.0.2', 'pc320181', 'senai127', 'dbpc320181');

if(isset($_GET['id'])){

    $sql = "select * from tbl_lojas where idLoja = ".$id.';';

    $resultadoSelect = mysqli_query($conexao, $sql);
}

if(isset($_POST['btnSalvar'])){
    //salvando no banco
    $sql = "insert into tbl_lojas set cidadeLoja = '".$_POST['cidadeLoja']."', enderecoLoja = '".$_POST['enderecoLoja']."', detalhesLoja = '".$_POST['detalhesLoja']."', ativo = 1;";

    echo($sql);
    
    mysqli_query($conexao, $sql);
    
    header('location:adm_lojas.php');
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
                <form name="frmLoja" method="post" action="cadastro_loja.php">
                    <table id="tabelaLojas">
                        <tr>
                            <td>
                                Cidade:
                            </td>
                            <td>
                                <input type="text" name="cidadeLoja" maxlength="255" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Endereço:
                            </td>
                            <td>
                                <input type="text" name="enderecoLoja" maxlength="255" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Detalhes:
                            </td>
                            <td>
                                <input type="text" name="detalhesLoja">
                            </td>
                        </tr>
                        <tr>
                            <input type="submit" name="btnSalvar" value="Salvar">
                        </tr>
                    </table>
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