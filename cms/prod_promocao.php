<?php
$conexao = @mysql_connect('localhost', 'root', 'bcd127');

mysql_select_db('db_centroestetico');

$sql = "select * from tbl_produto";

$resultado = mysql_query($sql);

if(isset($_POST['btnSalvar'])){
    if(isset($_POST['ativo'])){
        $ativo = 1;
    } else{
        $ativo = 0;
    }
    $sql = "insert into tbl_promocao (idProduto, desconto, visibilidade) values ('".$_POST['rdoAtivo']."', '".$_POST['txtDesconto']."', '".$ativo."')";
    
    mysql_query($sql);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CMS</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/toggle.css">
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
                <form name="novo_nivel" method="post" action="adm_produtos.php">
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
                        while ($produto = mysql_fetch_array($resultado)){
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
                    <input type="text" name="txtDesconto" placeholder="Desconto" required>
                    <label class="switch">
                        <input type="checkbox" name="ativo">
                        <span class="slider round"></span>
                    </label>
                    <input type="submit" name="btnSalvar" value="Salvar">
                </form>
            </div>
        </div>
    </body>
</html>