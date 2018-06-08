<?php
//Abrindo conexão com o banco
session_start();
$conexao = @mysqli_connect('192.168.0.2', 'pc320181', 'senai127', 'dbpc320181');

//Fazendo o select
$sql = "select * from tbl_destaque";
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
        $sql = 'delete from tbl_destaque where idDestaque = '.$id.';';
        
        echo($sql);
        
        mysqli_query($conexao, $sql);
        
        header('location:adm_destaque.php');
    }
    
    //Modo editar
    if($modo == 'editar'){
        header('location:editar_destaque.php?id='.$id);
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
                <div id="div_img_banner">
                    <img src="../imagens/logobarbearia.jpg" id="img_banner">
                </div>
                <p id="nomeUsuario">Bem-vindo, <?php echo($_SESSION["nomeUsuario"]) ?></p>
                <a href="logout.php">LOGOUT</a>w
            </div>
            <?php
            include('menu.php');
            ?>
            <div id="content">
                <table id="tabela_nivel">
                    <tr>
                        <td>
                            idDestaque
                        </td>
                        <td>
                            Titulo
                        </td>
                        <td>
                            Imagem
                        </td>
                        <td>
                            Descrição
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
                        while($destaque = mysqli_fetch_array($resultadoSelect)){
                            echo('<tr>');
                            echo('<td>'.$destaque['idDestaque'].'</td>');
                            echo('<td>'.$destaque['titulo'].'</td>');
                            echo('<td><img src="'.$destaque['imagem'].'" class="imgSobre"></td>');
                            echo('<td>'.$destaque['descricao'].'</td>');
                            echo('<td>'.$destaque['idEstabelecimento'].'</td>');
                            echo('<td><a href="adm_destaque.php?modo=editar&id='.$destaque["idDestaque"].'"><img src="imagens/editar.png"></a></td>');
                            echo('<td><a href="adm_destaque.php?modo=excluir&id='.$destaque["idDestaque"].'"><img src="imagens/excluir.png"></a></td>');
                            echo('</tr>');
                        }
                        ?>
                    </tr>
                </table>
                <div id="novo_nivel"><a href="cadastro_destaque.php">Novo destaque</a></div>
            </div>
        </div>
    </body>
    </html>
    <?php   
} else {
    echo("Login não realizado");
}
?>