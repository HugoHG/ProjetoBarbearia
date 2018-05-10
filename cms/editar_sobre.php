<?php
$conexao = @mysql_connect('localhost', 'root', 'bcd127');

mysql_select_db('db_centroestetico');    

$id = $_GET['id'];

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

    $sql = "update tbl_sobre set idEstabelecimento=".$_POST['slcEstabelecimento'].", titulo = '".$_POST['txtTitulo']."', imgSobre = '".$_POST['txtImagem']."', txtSobre = '".$_POST['txtSobre']."', visibilidade = ".$visibilidade." where idSobre=".$id;

    //echo($sql);

    mysql_query($sql);

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
                <form name="novo_nivel" method="post" action="editar_sobre.php?id=<?php echo($id) ?>">
                    <select name="slcEstabelecimento">
                        <option value="1" <?php if($estabelecimento == 1){ echo("selected");}?>>Barbearia</option>
                        <option value="2" <?php if($estabelecimento == 2){ echo("selected");}?>>Centro Estético</option>
                    </select>
                    <input type="text" name="txtTitulo" value="<?php echo($titulo) ?>">
                    <input type="text" name="txtImagem" value="<?php echo($imagem) ?>">
                    <textarea rows="10" cols="50" style="resize: none" name="txtSobre"><?php echo($sobre) ?></textarea>
                    <label class="switch">
                        <input type="checkbox" name="ativo" 
                               <?php
                                if($visibilidade == 1){
                                    echo("checked");
                                };
                               ?>>
                        <span class="slider round"></span>
                    </label>
                    <input type="submit" name="btnSalvar" value="Salvar">
                </form>
            </div>
        </div>
    </body>
</html>