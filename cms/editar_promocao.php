<?php
//Abre a sessão
session_start();

//abre a conexão
$conexao = @mysqli_connect('192.168.0.2', 'pc320181', 'senai127', 'dbpc320181');

$id = $_GET['id'];

//pega os dados antigos
if(isset($_GET['id'])){

    $sql = "select * from tbl_promocao where idPromocao = ".$id.';';

    $resultadoSelect = mysqli_query($conexao, $sql);

    while($promocao = mysqli_fetch_array($resultadoSelect)){
        $idProduto = $promocao['idProduto'];
        $desconto = $promocao['desconto'];
        $visibilidade = $promocao['visibilidade'];
    }
}

//salva os dados novos
if(isset($_POST['btnSalvar'])){

    if(isset($_POST['ativo'])){
        $visibilidade = 1;
    } else{
        $visibilidade = 0;
    }

    $sql = "update tbl_promocao set idProduto=".$_POST['idProduto'].", desconto=".$_POST['txtdesconto'].", visibilidade=".$visibilidade." where idPromocao=".$id;

    mysqli_query($conexao, $sql);

    header('location:adm_promocoes.php');
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
                <form name="novo_nivel" method="post" action="editar_promocao.php?id=<?php echo($id) ?>">
                    <table id="tabela_nivel">
                        <?php
                        $sql = "select * from tbl_produto";
                        $resultado = mysqli_query($conexao, $sql);
                        while ($produto = mysqli_fetch_array($resultado)){
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
    <?php   
} else {
    echo("Login não realizado");
}
?>