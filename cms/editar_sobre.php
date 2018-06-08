<?php
//Abre a sessão
session_start();

//abre a conexão
$conexao = @mysqli_connect('192.168.0.2', 'pc320181', 'senai127', 'dbpc320181');

$imagem = "";

//pega os dados antigos
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "select * from tbl_sobre where idSobre = ".$id.';';

    $resultadoSelect = mysqli_query($conexao, $sql);

    $sqlEstabelecimento = "select idEstabelecimento from tbl_sobre where idSobre = ".$id.';';

    $resultEstabelecimento = mysqli_query($conexao, $sql);

    while ($item = mysqli_fetch_array($resultEstabelecimento)){
        $estabelecimento = $item['idEstabelecimento'];
        $visibilidade = $item['visibilidade'];
        $imagem = $item['imgSobre'];
        $sobre = $item['txtSobre'];
        $titulo = $item['titulo'];
    }
}

//salva os dados novos
if(isset($_POST['txtTitulo'])){
    if(isset($_POST['ativo'])){
        $visibilidade = 1;
        $sql = "update tbl_sobre set visibilidade = 0 where idEstabelecimento = ".$_POST['slcEstabelecimento'].";";
        mysqli_query($conexao, $sql);
    } else{
        $visibilidade = 0;
    }

    //$nome_arquivo = basename($_FILES['flefoto']['name']);

    $imagem_banco = "";

    echo($_POST['txtfoto']);

    $nome_foto = $_POST['txtfoto'];

    if($_POST['rdoImagem'] == 'manter'){
        $imagem_banco = $_POST['imgCarregada'];
    } else {
        $imagem_banco = $nome_foto;
    }

    $sql = "update tbl_sobre set titulo = '".$_POST['txtTitulo']."', imgSobre = '".$imagem_banco."', txtSobre = '".$_POST['txtSobre']."', visibilidade = ".$visibilidade.", idEstabelecimento =".$_POST['slcEstabelecimento']." where idSobre = ".$_POST['idSobre'];

    mysqli_query($conexao, $sql);

    header('location:adm_sobre.php');

    //echo($sql);
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
        </div>
        <?php
        include('menu.php');
        ?>
        <div id="content">
            <div id="visualizar">
                <img src="<?php echo($imagem) ?>">
            </div>

            <form name="frmfoto" method="post" action="uploadfoto.php" enctype="multipart/form-data" id="frmfoto">
                <input type="file" name="flefoto" id="fotos">
            </form>

            <form name="novo_sobre" method="post" action="editar_sobre.php" enctype="multipart/form-data">
                <input type="hidden" name="imgCarregada" value="<?php echo($imagem) ?>">
                <input type="hidden" name="idSobre" value="<?php echo($id) ?>">
                <select name="slcEstabelecimento">
                    <option value="1" <?php if($estabelecimento == 1){
                        echo("selected");
                    } ?>>Barbearia</option>
                    <option value="2" <?php if($estabelecimento == 2){
                        echo("selected");
                    } ?>>Centro Estético</option>
                </select><br>
                <input type="radio" name="rdoImagem" value="manter" checked="true">Manter imagem
                <input type="radio" name="rdoImagem" value="trocar">Trocar imagem<br>
                Titulo: <input type="text" name="txtTitulo" maxlength="50" required value="<?php echo($titulo) ?>"><br><br>
                Sobre: <textarea rows="10" cols="50" style="resize: none" name="txtSobre"><?php echo($sobre) ?></textarea><br>
                Visibilidade: 
                <label class="switch">
                    <input type="checkbox" name="ativo" <?php
                    if($visibilidade == 1){
                        echo("checked");
                    }
                    ?>>
                    <span class="slider round"></span>
                </label><br>
                <input type="hidden" name="txtfoto">
                <input type="submit" name="btnSalvar" value="Salvar">
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