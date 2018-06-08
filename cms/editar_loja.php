<?php
//Abre a sessão
session_start();

//abre a conexão
$conexao = @mysqli_connect('192.168.0.2', 'pc320181', 'senai127', 'dbpc320181');

$id = $_GET['id'];

//pega os dados antigos
if(isset($_GET['id'])){

    $sql = "select * from tbl_lojas where idLoja = ".$id.';';

    $resultadoSelect = mysqli_query($conexao, $sql);

    while($loja = mysqli_fetch_array($resultadoSelect)){
        $enderecoLoja = $loja['enderecoLoja'];
        $cidadeLoja = $loja['cidadeLoja'];
        $detalhesLoja = $loja['detalhesLoja'];
        $visibilidade = $loja['ativo'];
    }
}

//salva os dados novos
if(isset($_POST['btnSalvar'])){
    if(isset($_POST['ativo'])){
        $visibilidade = 1;
    } else{
        $visibilidade = 0;
    }

    $sql = "update tbl_lojas set cidadeLoja = '".$_POST['cidadeLoja']."', enderecoLoja = '".$_POST['enderecoLoja']."', detalhesLoja = '".$_POST['detalhesLoja']."', ativo = ".$visibilidade." where idLoja = ".$id;

    //echo($sql);
    
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
        <link rel="stylesheet" type="text/css" href="css/toggle.css">
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
                <form name="editar_loja" method="post" action="editar_loja.php?id=<?php echo($id) ?>">
                    <table id="tabelaLojas">
                        <tr>
                            <td>
                                Cidade:
                            </td>
                            <td>
                                <input type="text" name="cidadeLoja" maxlength="255" value="<?php echo($cidadeLoja) ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Endereço:
                            </td>
                            <td>
                                <input type="text" name="enderecoLoja" maxlength="255" value="<?php echo($enderecoLoja) ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Detalhes:
                            </td>
                            <td>
                                <input type="text" name="detalhesLoja" value="<?php echo($detalhesLoja) ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Visibilidade:
                            </td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" name="ativo" <?php
                                    if($visibilidade == 1){
                                        echo("checked");
                                    }
                                    ?>>
                                    <span class="slider round"></span>
                                </label>
                            </td>
                        </tr>
                    </table>
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