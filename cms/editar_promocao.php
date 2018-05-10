<?php
$conexao = @mysql_connect('localhost', 'root', 'bcd127');

mysql_select_db('db_centroestetico');    

$id = $_GET['id'];

if(isset($_GET['id'])){

    $sql = "select * from tbl_promocao where idPromocao = ".$id.';';

    $resultadoSelect = mysql_query($sql);

    while($promocao = mysql_fetch_array($resultadoSelect)){
        $idProduto = $promocao['idProduto'];
        $desconto = $promocao['desconto'];
        $visibilidade = $promocao['visibilidade'];
    }
}

if(isset($_POST['btnSalvar'])){

    if(isset($_POST['ativo'])){
        $visibilidade = 1;
    } else{
        $visibilidade = 0;
    }

    $sql = "update tbl_promocao set idProduto=".$_POST['idProduto'].", desconto=".$_POST['txtdesconto'].", visibilidade=".$visibilidade." where idPromocao=".$id;

    mysql_query($sql);

    header('location:adm_promocoes.php');
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
                <form name="novo_nivel" method="post" action="editar_promocao.php?id=<?php echo($id) ?>">
                    <table id="tabela_nivel">
                        <?php
                          $sql = "select * from tbl_produto";
                          $resultado = mysql_query($sql);
                          while ($produto = mysql_fetch_array($resultado)){
                        ?>
                        <tr>
                            <td>id: <?php echo($produto['idProduto'])?></td>
                            <td>Nome: <?php echo($produto['nomeProduto'])?></td>
                            <td>Descrição: <?php echo($produto['descProduto'])?></td>
                            <td>Foto: <?php echo($produto['foto'])?></td>
                            <td>Valor: <?php echo($produto['valor'])?></td>
                            <td>idEstabelecimento: <?php echo($produto['idEstabelecimento'])?></td>
                            <td><input type="radio" name="idProduto" value="<?php echo($produto['idProduto'])?>"
                                       <?php if($produto['idProduto'] == $idProduto){echo("checked");}?>></td>
                        </tr>
                        <?php    
                      }
                        ?>
                    </table>
                    Desconto: <input type="text" name="txtdesconto" value="<?php echo($desconto) ?>">
                    <br>
                    Visibilidade: 
                    <label class="switch">
                        <input type="checkbox" name="ativo" 
                               <?php
                                if($visibilidade == 1){
                                    echo("checked");
                                };
                               ?>>
                        <span class="slider round"></span>
                    </label>
                    <br>
                    <input type="submit" name="btnSalvar" value="Salvar">
                </form>
            </div>
        </div>
    </body>
</html>