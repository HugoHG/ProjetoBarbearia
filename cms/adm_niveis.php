<?php
$conexao = @mysql_connect('localhost', 'root', 'bcd127');

mysql_select_db('db_centroestetico');

$sql = "select * from tbl_nivel";

$resultadoSelect = mysql_query($sql);

/*while($valor = mysql_fetch_array($resultadoSelect)){
    echo($valor['nomeNivel']);
}*/

if(isset($_GET['modo'])){
    $modo = $_GET['modo'];
    $id = $_GET['id'];
    
    if($modo == 'excluir'){
        $sql = 'delete from tbl_nivel where idNivel = '.$id.';';
        
        echo($sql);
        
        mysql_query($sql);
        
        header('location:adm_niveis.php');
    }
    
    if($modo == 'editar'){
        header('location:editar_nivel.php?id='.$id);
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
                            Nível
                        </td>
                        <td>
                            Atividade
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
                        while($nivel = mysql_fetch_array($resultadoSelect)){
                            echo('<tr>');
                            echo('<td>'.$nivel['idNivel'].'</td>');
                            echo('<td>'.$nivel['nomeNivel'].'</td>');
                            echo('<td>'.$nivel['ativo'].'</td>');
                            echo('<td><a href="adm_niveis.php?modo=editar&id='.$nivel["idNivel"].'"><img src="imagens/editar.png"></a></td>');
                            echo('<td><a href="adm_niveis.php?modo=excluir&id='.$nivel["idNivel"].'"><img src="imagens/excluir.png"></a></td>');
                            echo('</tr>');
                        }
                        ?>
                    </tr>
                </table>
                <div id="novo_nivel"><a href="cadastro_nivel.php">Novo sobre</a></div>
            </div>
        </div>
    </body>
</html>