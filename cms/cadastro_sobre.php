<?php
$conexao = @mysql_connect('localhost', 'root', 'bcd127');

mysql_select_db('db_centroestetico');    

if(isset($_GET['id'])){

    $sql = "select * from tbl_sobre where idSobre = ".$id.';';

    $resultadoSelect = mysql_query($sql);

    $sqlEstabelecimento = "select idEstabelecimento from tbl_sobre where idSobre = ".$id.';';

    $resultEstabelecimento = mysql_query($sql);

    while ($item = mysql_fetch_array($resultEstabelecimento)){
        $estabelecimento = $item['idEstabelecimento'];
        $visibilidade = $item['visibilidade'];
        $imagem = $item['imgSobre'];
        $sobre = $item['txtSobre'];
        $titulo = $item['titulo'];
    }
}

if(isset($_POST['btnSalvar'])){
    if(isset($_POST['ativo'])){
        $visibilidade = 1;
    } else{
        $visibilidade = 0;
    }

    $nome_arquivo = basename($_FILES['flefoto']['name']);

    $ext = strchr($nome_arquivo, ".");

    $nome_foto = pathinfo($nome_arquivo, PATHINFO_FILENAME);

    $nome_arquivo = md5(uniqid(time()).$nome_foto).$ext;

    $tamanho_arquivo = round(($_FILES['flefoto']['size'])/1024);

    $upload_dir = "../imagens/sobre/";

    $arquivos_permitidos = array(".jpg", ".png", ".gif", ".svg",".jpeg");

    $caminho_imagem = $upload_dir.$nome_arquivo;
    
    echo($caminho_imagem);

    if(in_array($ext, $arquivos_permitidos))
    {
        /*if($tamanho_arquivo<=5120){*/
        $arquivo_tmp = $_FILES['flefoto']['tmp_name'];
        if(move_uploaded_file($arquivo_tmp, $caminho_imagem)){
            $sql = "insert into tbl_sobre set idEstabelecimento=".$_POST['slcEstabelecimento'].", titulo = '".$_POST['txtTitulo']."', imgSobre = '".$caminho_imagem."', txtSobre = '".$_POST['txtSobre']."', visibilidade = ".$visibilidade.";";

            mysql_query($sql);
        } else{
            echo("Erro ao enviar o arquivo para o servidor");
        }
        /*} else{
            echo("Tamanho de arquivo inválido");
        }*/
    } else
    {
        echo("Arquivo não permitido");
    }
    
    header('location:adm_sobre.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CMS</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/toggle.css">
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
                <form name="novo_nivel" method="post" action="cadastro_sobre.php" enctype="multipart/form-data">
                    <select name="slcEstabelecimento">
                        <option value="1">Barbearia</option>
                        <option value="2">Centro Estético</option>
                    </select><br>
                    Titulo: <input type="text" name="txtTitulo"><br>
                    <input type="file" name="flefoto" ><br>
                    Sobre: <textarea rows="10" cols="50" style="resize: none" name="txtSobre"></textarea><br>
                    Visibilidade: <label class="switch">
                        <input type="checkbox" name="ativo">
                        <span class="slider round"></span>
                    </label><br>
                    <input type="submit" name="btnSalvar" value="Salvar">
                </form>
            </div>
        </div>
    </body>
</html>