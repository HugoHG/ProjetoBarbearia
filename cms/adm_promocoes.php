<?php
//Abrindo conexão com o banco
session_start();
$conexao = @mysqli_connect('192.168.0.2', 'pc320181', 'senai127', 'dbpc320181');

//Fazendo o select
$sql = "select * from view_promocoes";

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
        $sql = 'delete from tbl_promocao where idPromocao = '.$id.';';
        
        echo($sql);
        
        mysqli_query($conexao, $sql);
        
        header('location:adm_promocoes.php');
    }
    
    //Modo editar
    if($modo == 'editar'){
        header('location:editar_promocao.php?id='.$id);
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
                        while($promocao = mysqli_fetch_array($resultadoSelect)){
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
    <?php   
} else {
    echo("Login não realizado");
}
?>