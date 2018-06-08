<?php
//conecta com o banco
$conexao = @mysqli_connect('192.168.0.2', 'pc320181', 'senai127', 'dbpc320181');

$id = $_POST['id'];

//faz o select
$sql = "select * from tbl_faleconosco where idFaleConosco = ".$_POST['id'].";";

$resultado = mysqli_query($conexao, $sql);
?>

<html>
    <head>
        <meta charset="utf-8">
        <script src="js/jquery.js"></script>
        <script>
            $(document).ready(function(){
                $(".fechar").click(function(){
                    $(".container").fadeOut(500);
                });
            });
        </script>
    </head>
    <body>
        <div class="fechar">
            <img src="imagens/fechar.png">
        </div>
        <?php
        while ($item = mysqli_fetch_array($resultado)){
            echo("Nome: ".$item['nome']);
            echo("<br>");
            echo("Telefone: ".$item['telefone']);
            echo("<br>");
            echo("Celular: ".$item['celular']);
            echo("<br>");
            echo("Email: ".$item['email']);
            echo("<br>");
            echo("Homepage: ".$item['homepage']);
            echo("<br>");
            echo("Facebook: ".$item['facebook']);
            echo("<br>");
            echo("Críticas: ".$item['criticas']);
            echo("<br>");
            echo("Info. Produtos: ".$item['infoprodutos']);
            echo("<br>");
            echo("Sexo: ".$item['sexo']);
            echo("<br>");
            echo("Profissão: ".$item['profissao']);
            echo("<br>");
        }
        ?>
    </body>
</html>