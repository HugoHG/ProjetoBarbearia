<?php
//Abrindo conexão com o banco
session_start();

$conexao = @mysqli_connect('192.168.0.2', 'pc320181', 'senai127', 'dbpc320181');
//Fazendo o select
$sql = "select * from tbl_sobre";

$resultadoSelect = mysqli_query($conexao, $sql);

/*while($valor = mysqli_fetch_array($resultadoSelect)){
    echo($valor['nomeNivel']);
}*/

//Verificando o modo
if(isset($_GET['modo'])){
    $modo = $_GET['modo'];
    $id = $_GET['id'];
    
    //Modo excluir
    if($modo == 'excluir'){
        $sql = 'delete from tbl_sobre where idSobre = '.$id.';';
        
        echo($sql);
        
        mysqli_query($conexao, $sql);
        
        header('location:adm_sobre.php');
    }
    
    //Modo editar
    if($modo == 'editar'){
        header('location:editar_sobre.php?id='.$id);
    }
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
                            <img src="imagens/editar.png">
                        </td>
                        <td>
                            <img src="imagens/excluir.png">
                        </td>
                    </tr>
                    <tr>
                        <?php
                        while($sobre = mysqli_fetch_array($resultadoSelect)){
                            if($sobre['visibilidade'] == 1){
                                $checked = "checked";
                            } else{
                                $checked = "";
                            }
                            echo('<tr>');
                            echo('<td>'.$sobre['idSobre'].'</td>');
                            echo('<td>'.$sobre['idEstabelecimento'].'</td>');
                            echo('<td>'.$sobre['titulo'].'</td>');
                            echo('<td><img src="'.$sobre['imgSobre'].'" class="imgSobre"></td>');
                            echo('<td>'.$sobre['txtSobre'].'</td>');
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
    <?php   
} else {
    echo("Login não realizado");
}
?>