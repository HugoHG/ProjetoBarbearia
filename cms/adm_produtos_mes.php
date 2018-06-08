<?php
//Abrindo conexão com o banco
session_start();

$conexao = @mysqli_connect('192.168.0.2', 'pc320181', 'senai127', 'dbpc320181');

//Fazendo o select
$sql = "select * from tbl_produto";

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
        $sql = 'delete from tbl_produto where idProduto = '.$id.';';
        
        echo($sql);
        
        mysqli_query($conexao, $sql);
        
        header('location:adm_produtos.php');
    }
    
    //Modo editar
    if($modo == 'editar'){
        header('location:editar_produto.php?id='.$id);
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
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.form.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".rdoAtivo").click(function(){
                    $.ajax({
                       type: "POST",
                       url: "definir_prod_mes.php",
                       data: {id:$(this).val(), estab : $(this).attr('name')},
                       success: function(dados){
                       }
                   });
                });
            });
        </script>
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
                            Definir Prod. Mês
                        </td>
                    </tr>
                    <tr>
                        <?php
                        $checked = "";
                        while($produto = mysqli_fetch_array($resultadoSelect)){
                            if($produto['prodMes'] == 1){
                                $checked = "checked";
                            } else{
                                $checked = "";
                            }
                            echo('<tr>');
                            echo('<td>'.$produto['idProduto'].'</td>');
                            echo('<td>'.$produto['nomeProduto'].'</td>');
                            echo('<td>'.$produto['descProduto'].'</td>');
                            echo('<td>'.$produto['foto'].'</td>');
                            echo('<td>'.$produto['valor'].'</td>');
                            echo('<td>'.$produto['idEstabelecimento'].'</td>');
                            echo('<td><input type="radio" class="rdoAtivo" name="ativo'.$produto['idEstabelecimento'].'" value="'.$produto['idProduto'].'" '.$checked);
                            echo('></td>');
                            echo('<input type="hidden" name="txtEstab" class="txtEstab" value="'.$produto['idEstabelecimento'].'">');
                        }
                        ?>
                    </tr>
                </table>
            </div>
        </div>
    </body>
    </html>
    <?php   
} else {
    echo("Login não realizado");
}
?>