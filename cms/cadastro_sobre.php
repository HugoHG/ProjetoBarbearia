<?php
//Abrindo conexão com o banco
session_start();

$conexao = @mysqli_connect('192.168.0.2', 'pc320181', 'senai127', 'dbpc320181');

if(isset($_POST['txtTitulo'])){
    if(isset($_POST['ativo'])){
        $visibilidade = 1;
        $sql = "update tbl_sobre set visibilidade = 0 where idEstabelecimento = ".$_POST['slcEstabelecimento'].";";
        mysqli_query($conexao, $sql);
        //echo($sql);
    } else{
        $visibilidade = 0;
    }

    //definindo caminho da foto
    $nome_foto = $_POST['txtfoto'];

    //salvando no banco
    $sql = "insert into tbl_sobre set idEstabelecimento=".$_POST['slcEstabelecimento'].", titulo = '".$_POST['txtTitulo']."', imgSobre = '".$nome_foto."', txtSobre = '".$_POST['txtSobre']."', visibilidade = ".$visibilidade.";";

    mysqli_query($conexao, $sql);
    
    //echo($sql);

    header('location:adm_sobre.php');
}
if(@$_SESSION['logado'] == 1){
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>CMS</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/toggle.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.form.js"></script>

        <script>
            $(document).ready(function(){
                $('#fotos').live('change', function(){
                    //Criando uma imagem em .gif para colocar o gif animado
                    $('#visualizar').html('<img src="gifs/barbershop.gif">');
                    //Temporizador de 2 segundos para executar o gif animado e depois fazer o ajaxForm

                    setTimeout(function(){
                        //forçando via ajax um submit do form da foto, já que não temos um botão
                        $('#frmfoto').ajaxForm({
                            target:'#visualizar'
                            //target:'#visualizar' - retorna a imagem na div visualizar ('callback do formulário'). É um parâmetro da função.
                        }).submit();
                    },1000);

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
                <div id="visualizar">

                </div>

                <form name="frmfoto" method="post" action="uploadfoto.php" enctype="multipart/form-data" id="frmfoto">
                    <input type="file" name="flefoto" id="fotos">
                </form>

                <form name="novo_sobre" method="post" action="cadastro_sobre.php" enctype="multipart/form-data">
                    <select name="slcEstabelecimento">
                        <option value="1">Barbearia</option>
                        <option value="2">Centro Estético</option>
                    </select><br>
                    Titulo: <input type="text" name="txtTitulo" maxlength="50" required><br><br>
                    Sobre: <textarea rows="10" cols="50" style="resize: none" name="txtSobre"></textarea><br>
                    Visibilidade: 
                    <label class="switch">
                        <input type="checkbox" name="ativo">
                        <span class="slider round"></span>
                    </label><br>
                    <input type="hidden" name="txtfoto">
                    <input type="submit" name="btnSalvar" value="Salvar" class="btnNovo">
                </form>
            </div>
        </div>
    </body>
    </html>
    <?php   
} else {
    echo("Login não realizado");
}
?>