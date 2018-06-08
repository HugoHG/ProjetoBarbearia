<?php
//Abrindo conexão com o banco
session_start();
$conexao = @mysqli_connect('192.168.0.2', 'pc320181', 'senai127', 'dbpc320181');

//Fazendo o select
$sql = "select * from tbl_lojas";
$resultadoSelect = mysqli_query($conexao, $sql);

if (!$resultadoSelect) {
    printf("Error: %s\n", mysqli_error($conexao));
    exit();
}

/*while($valor = mysqli_fetch_array($resultadoSelect)){
    echo($valor['nomeNivel']);
}*/

//Verificando o modo
if(isset($_GET['modo'])){
    $modo = $_GET['modo'];
    $id = $_GET['id'];
    
    //Modo excluir
    if($modo == 'excluir'){
        $sql = 'delete from tbl_lojas where idLoja = '.$id.';';
        
        mysqli_query($conexao, $sql);
        
        header('location:adm_lojas.php');
    }
    
    //Modo editar
    if($modo == 'editar'){
        header('location:editar_loja.php?id='.$id);
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
                            id
                        </td>
                        <td>
                            Cidade
                        </td>
                        <td>
                            Endereço
                        </td>
                        <td>
                            Detalhes
                        </td>
                        <td>
                            Ativo
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
                        while($loja = mysqli_fetch_array($resultadoSelect)){
                            echo('<tr>');
                            echo('<td>'.$loja['idLoja'].'</td>');
                            echo('<td>'.$loja['cidadeLoja'].'</td>');
                            echo('<td>'.$loja['enderecoLoja'].'</td>');
                            echo('<td>'.$loja['detalhesLoja'].'</td>');
                            echo('<td>'.$loja['ativo'].'</td>');
                            echo('<td><a href="adm_lojas.php?modo=editar&id='.$loja["idLoja"].'"><img src="imagens/editar.png"></a></td>');
                            echo('<td><a href="adm_lojas.php?modo=excluir&id='.$loja["idLoja"].'"><img src="imagens/excluir.png"></a></td>');
                            echo('</tr>');
                        }
                        ?>
                    </tr>
                </table>
                <div id="novo_nivel"><a href="cadastro_loja.php">Nova loja</a></div>
            </div>
        </div>
    </body>
    </html>
    <?php   
} else {
    echo("Login não realizado");
}
?>