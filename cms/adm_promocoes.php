<?php
$conexao = @mysql_connect('localhost', 'root', 'bcd127');

mysql_select_db('db_centroestetico');

$sql = "select tbl_produto.idProduto, descProduto, foto, valor, idEstabelecimento, tbl_promocao.desconto, tbl_promocao.idPromocao, tbl_produto.nomeProduto, tbl_promocao.visibilidade
from tbl_produto 
inner join tbl_promocao on tbl_promocao.idProduto = tbl_produto.idProduto;";

$resultadoSelect = mysql_query($sql);

/*while($valor = mysql_fetch_array($resultadoSelect)){
    echo($valor['nomeNivel']);
}*/

if(isset($_GET['modo'])){
    $modo = $_GET['modo'];
    $id = $_GET['id'];
    
    if($modo == 'excluir'){
        $sql = 'delete from tbl_promocao where idPromocao = '.$id.';';
        
        echo($sql);
        
        mysql_query($sql);
        
        header('location:adm_promocoes.php');
    }
    
    if($modo == 'editar'){
        header('location:editar_promocao.php?id='.$id);
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
                            idPromoção
                        </td>
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
                            Foto
                        </td>
                        <td>
                            Valor
                        </td>
                        <td>
                            idEstabelecimento
                        </td>
                        <td>
                            desconto
                        </td>
                        <td>
                            preço real
                        </td>
                        <td>
                            visibilidade
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
                        while($promocao = mysql_fetch_array($resultadoSelect)){
                            $preco_real = $promocao['valor'] - ($promocao['desconto'] * $promocao['valor']/100);
                            
                            echo('<tr>');
                            echo('<td>'.$promocao['idPromocao'].'</td>');
                            echo('<td>'.$promocao['idProduto'].'</td>');
                            echo('<td>'.$promocao['nomeProduto'].'</td>');
                            echo('<td>'.$promocao['descProduto'].'</td>');
                            echo('<td>'.$promocao['foto'].'</td>');
                            echo('<td>'.$promocao['valor'].'</td>');
                            echo('<td>'.$promocao['idEstabelecimento'].'</td>');
                            echo('<td>'.$promocao['desconto'].'</td>');
                            echo('<td>'.$preco_real.'</td>');
                            echo('<td>'.$promocao['visibilidade'].'</td>');
                            echo('<td><a href="adm_promocoes.php?modo=editar&id='.$promocao["idPromocao"].'"><img src="imagens/editar.png"></a></td>');
                            echo('<td><a href="adm_promocoes.php?modo=excluir&id='.$promocao["idPromocao"].'"><img src="imagens/excluir.png"></a></td>');
                            echo('</tr>');
                        }
                        ?>
                    </tr>
                </table>
                <div id="novo_nivel"><a href="prod_promocao.php">Nova promoção</a></div>
            </div>
        </div>
    </body>
</html>