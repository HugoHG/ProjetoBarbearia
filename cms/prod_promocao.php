<?php
session_start();

$conexao = @mysqli_connect('192.168.0.2', 'pc320181', 'senai127', 'dbpc320181');

$sql = "select * from tbl_produto";

$resultado = mysqli_query($conexao, $sql);

if(isset($_POST['btnSalvar'])){
    if(isset($_POST['ativo'])){
        $ativo = 1;
    } else{
        $ativo = 0;
    }
    $sql = "insert into tbl_promocao (idProduto, desconto, visibilidade) values ('".$_POST['rdoAtivo']."', '".$_POST['txtDesconto']."', '".$ativo."')";
    
    mysqli_query($conexao, $sql);

    header('location:adm_promocoes.php');
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
                <form name="novo_nivel" method="post" action="prod_promocao.php">
                    <table id="tabela_nivel">
                        <tr>
                            <td>
                                idProduto
                            </td>
                            <td>
                                nomeProduto
                            </td>
                            <td>
                                descProduto
                            </td>
                            <td>
                                foto
                            </td>
                            <td>
                                valor
                            </td>
                            <td>
                                idEstabelecimento
                            </td>
                        </tr>
                        <?php
                        while ($produto = mysqli_fetch_array($resultado)){
                            ?>
                            <tr>
                                <td>id: <?php echo($produto['idProduto'])?></td>
                                <td>Nome: <?php echo($produto['nomeProduto'])?></td>
                                <td>Descrição: <?php echo($produto['descProduto'])?></td>
                                <td>Foto: <?php echo($produto['foto'])?></td>
                                <td>Valor: <?php echo($produto['valor'])?></td>
                                <td>idEstabelecimento: <?php echo($produto['idEstabelecimento'])?></td>
                                <td><input type="radio" name="rdoAtivo" value="<?php echo($produto['idProduto'])?>"></td>
                            </tr>
                            <?php    
                        }
                        ?>
                    </table>
                    <table>
                        <tr>
                            <td>
                                Desconto (porcentagem):
                            </td>
                            <td>
                                <input type="text" name="txtDesconto" pattern="[0-9]{1,3}" placeholder="Ex.: 050" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Ativo:
                            </td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" name="ativo">
                                    <span class="slider round"></span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="btnSalvar" value="Salvar">
                            </td>
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