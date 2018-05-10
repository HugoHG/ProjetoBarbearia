<?php
$conexao = @mysql_connect('localhost', 'root', 'bcd127');

mysql_select_db('db_centroestetico');

$sql = "select * from tbl_faleconosco";

$resultadoSelect = mysql_query($sql);

/*while($valor = mysql_fetch_array($resultadoSelect)){
    echo($valor['nomeNivel']);
}*/

if(isset($_GET['modo'])){
    $modo = $_GET['modo'];
    $id = $_GET['id'];
    
    if($modo == 'excluir'){
        $sql = 'delete from tbl_faleconosco where idFaleConosco = '.$id.';';
        
        echo($sql);
        
        mysql_query($sql);
        
        header('location:adm_faleconosco.php');
        
    }
    
    if($modo == 'editar'){
        header('location:editar_faleconosco.php?id='.$id);
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>CMS</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/jquery.js"></script>
        <script>
            $(document).ready(function(){
               $(".visualizar").click(function(){
                   $(".container").fadeIn(500);
               });
            });
            
            function modal(idItem){
                $.ajax({
                    type: "POST",
                    url: "modal_faleconosco.php",
                    data: {id:idItem},
                    success: function(dados){
                        $(".modal").html(dados);
                    }
                });
            }
        </script>
    </head>
    <body>
        <div class="container">
            <div class="modal">
            </div>
        </div>
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
                            Telefone
                        </td>
                        <td>
                            Celular
                        </td>
                        <td>
                            E-mail
                        </td>
                        
                        <td>
                            Homepage
                        </td>
                        
                        <td>
                            Facebook
                        </td>
                        
                        <td>
                            Criticas
                        </td>
                        
                        <td>
                            Inf. Produtos
                        </td>
                        
                        <td>
                            Sexo
                        </td>
                        
                        <td>
                            Profissão
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
                        while($mensagem = mysql_fetch_array($resultadoSelect)){
                            echo('<tr>');
                            echo('<td>'.$mensagem['idFaleConosco'].'</td>');
                            echo('<td>'.$mensagem['nome'].'</td>');
                            echo('<td>'.$mensagem['telefone'].'</td>');
                            echo('<td>'.$mensagem['celular'].'</td>');
                            echo('<td>'.$mensagem['email'].'</td>');
                            echo('<td>'.$mensagem['homepage'].'</td>');
                            echo('<td>'.$mensagem['facebook'].'</td>');
                            echo('<td>'.$mensagem['criticas'].'</td>');
                            echo('<td>'.$mensagem['infoprodutos'].'</td>');
                            echo('<td>'.$mensagem['sexo'].'</td>');
                            echo('<td>'.$mensagem['profissao'].'</td>');
                            echo('<td class = "visualizar"><a href="#"><img src="imagens/visualizar.png" onclick="modal('.$mensagem["idFaleConosco"].')"></a></td>');
                            echo('<td><a href="adm_faleconosco.php?modo=excluir&id='.$mensagem["idFaleConosco"].'"><img src="imagens/excluir.png"></a></td>');
                            echo('</tr>');
                                          
                    }
                        ?>
                    </tr>
                </table>
                <div id="novo_nivel"></div>
            </div>
        </div>
    </body>
</html>