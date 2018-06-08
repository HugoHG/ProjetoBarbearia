<?php
$conexao = @mysqli_connect('192.168.0.2', 'pc320181', 'senai127', 'dbpc320181');

$sql = "select * from tbl_produto where prodMes = 1 and idEstabelecimento = 1";

$resultadoSelect = mysqli_query($conexao, $sql);

while ($item = mysqli_fetch_array($resultadoSelect)){
    echo($item['nomeProduto']);
    echo($item['descProduto']);
    echo($item['valor']);
}
                    
?>