<?php
$conexao = @mysql_connect('localhost', 'root', 'bcd127');

mysql_select_db('db_centroestetico');

$sql = "select * from tbl_usuarios";

$resultadoSelect = mysql_query($sql);

/*while($valor = mysql_fetch_array($resultadoSelect)){
    echo($valor['nomeNivel']);
}*/

if(isset($_GET['modo'])){
    $modo = $_GET['modo'];
    $id = $_GET['id'];
    
    if($modo == 'excluir'){
        $sql = 'delete from tbl_usuarios where idUsuario = '.$id.';';
        
        echo($sql);
        
        mysql_query($sql);
        
        header('location:adm_usuarios.php');
        
    }
    
    if($modo == 'editar'){
        header('location:editar_usuario.php?id='.$id);
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
                            Login
                        </td>
                        <td>
                            Senha
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
                        while($usuario = mysql_fetch_array($resultadoSelect)){
                            echo('<tr>');
                            echo('<td>'.$usuario['idUsuario'].'</td>');
                            echo('<td>'.$usuario['nomeUsuario'].'</td>');
                            echo('<td>'.$usuario['usuario'].'</td>');
                            echo('<td>'.$usuario['senha'].'</td>');
                            echo('<td>'.$usuario['ativo'].'</td>');
                            echo('<td><a href="adm_usuarios.php?modo=editar&id='.$usuario["idUsuario"].'"><img src="imagens/editar.png"></a></td>');
                            echo('<td><a href="adm_usuarios.php?modo=excluir&id='.$usuario["idUsuario"].'"><img src="imagens/excluir.png"></a></td>');
                            echo('</tr>');
                        }
                        ?>
                    </tr>
                </table>
                <div id="novo_nivel"><a href="cadastro_usuario.php">Novo usuário</a></div>
            </div>
        </div>
    </body>
</html>