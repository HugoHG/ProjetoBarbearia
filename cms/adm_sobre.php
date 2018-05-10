<?php
$conexao = @mysql_connect('localhost', 'root', 'bcd127');

mysql_select_db('db_centroestetico');

$sql = "select * from tbl_sobre";

$resultadoSelect = mysql_query($sql);

/*while($valor = mysql_fetch_array($resultadoSelect)){
    echo($valor['nomeNivel']);
}*/

if(isset($_GET['modo'])){
    $modo = $_GET['modo'];
    $id = $_GET['id'];
    
    if($modo == 'excluir'){
        $sql = 'delete from tbl_sobre where idSobre = '.$id.';';
        
        echo($sql);
        
        mysql_query($sql);
        
        header('location:adm_sobre.php');
    }
    
    if($modo == 'editar'){
        header('location:editar_sobre.php?id='.$id);
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
                            idSobre
                        </td>
                        <td>
                            idEstabelecimento
                        </td>
                        <td>
                            titulo
                        </td>
                        <td>
                            imgSobre
                        </td>
                        <td>
                            txtSobre
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
                        while($sobre = mysql_fetch_array($resultadoSelect)){
                            echo('<tr>');
                            echo('<td>'.$sobre['idSobre'].'</td>');
                            echo('<td>'.$sobre['idEstabelecimento'].'</td>');
                            echo('<td>'.$sobre['titulo'].'</td>');
                            echo('<td><img src="'.$sobre['imgSobre'].'" class="imgSobre"></td>');
                            echo('<td>'.$sobre['txtSobre'].'</td>');
                            echo('<td>'.$sobre['visibilidade'].'</td>');
                            echo('<td><a href="adm_sobre.php?modo=editar&id='.$sobre["idSobre"].'"><img src="imagens/editar.png"></a></td>');
                            echo('<td><a href="adm_sobre.php?modo=excluir&id='.$sobre["idSobre"].'"><img src="imagens/excluir.png"></a></td>');
                            echo('</tr>');
                        }
                        ?>
                    </tr>
                </table>
                <div id="novo_nivel"><a href="cadastro_sobre.php">Novo sobre</a></div>
            </div>
        </div>
    </body>
</html>