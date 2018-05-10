<?php
$conexao = @mysql_connect('localhost', 'root', 'bcd127');

mysql_select_db('db_centroestetico');

$sql = "select * from tbl_produto";

$resultadoSelect = mysql_query($sql);

/*while($valor = mysql_fetch_array($resultadoSelect)){
    echo($valor['nomeNivel']);
}*/

if(isset($_GET['modo'])){
    $modo = $_GET['modo'];
    $id = $_GET['id'];
    
    if($modo == 'excluir'){
        $sql = 'delete from tbl_produto where idProduto = '.$id.';';
        
        echo($sql);
        
        mysql_query($sql);
        
        header('location:adm_produtos.php');
    }
    
    if($modo == 'editar'){
        header('location:editar_produto.php?id='.$id);
    }
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
                <table id="tabela_nivel">
                    <tr>
                        <td>
                            id
                        </td>
                        <td>
                            Nome
                        </td>
                        <td>
                            Descrição
                        </td>
                        <td>
                            Foto
                        </td>
                        <td>
                            Valor
                        </td>
                        <td>
                            idEstabelecimento
                        </td>
                        <td>
                            <img src="imagens/editar.png">
                        </td>
                        <td>
                            <img src="imagens/excluir.png">
                        </td>
                    </tr>
                    <tr>
                        <?php
                        while($produto = mysql_fetch_array($resultadoSelect)){
                            echo('<tr>');
                            echo('<td>'.$produto['idProduto'].'</td>');
                            echo('<td>'.$produto['nomeProduto'].'</td>');
                            echo('<td>'.$produto['descProduto'].'</td>');
                            echo('<td>'.$produto['foto'].'</td>');
                            echo('<td>'.$produto['valor'].'</td>');
                            echo('<td>'.$produto['idEstabelecimento'].'</td>');
                            echo('<td><a href="adm_produtos.php?modo=editar&id='.$produto["idProduto"].'"><img src="imagens/editar.png"></a></td>');
                            echo('<td><a href="adm_produtos.php?modo=excluir&id='.$produto["idProduto"].'"><img src="imagens/excluir.png"></a></td>');
                            echo('</tr>');
                        }
                        ?>
                    </tr>
                </table>
                <div id="novo_nivel"><a href="cadastro_nivel.php">Novo nível</a></div>
            </div>
        </div>
    </body>
</html>