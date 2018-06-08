<?php
$nome_arquivo = basename($_FILES['flefoto']['name']);

$ext = strchr($nome_arquivo, ".");

$nome_foto = pathinfo($nome_arquivo, PATHINFO_FILENAME);

$nome_arquivo = md5(uniqid(time()).$nome_foto).$ext;

$tamanho_arquivo = round(($_FILES['flefoto']['size'])/1024);

$upload_dir = "../imagens/sobre/";

$arquivos_permitidos = array(".jpg", ".png", ".gif", ".svg",".jpeg");

$caminho_imagem = $upload_dir.$nome_arquivo;

if(in_array($ext, $arquivos_permitidos))
{
    /*if($tamanho_arquivo<=5120){*/
    $arquivo_tmp = $_FILES['flefoto']['tmp_name'];
    if(move_uploaded_file($arquivo_tmp, $caminho_imagem)){
        echo("<img src='".$caminho_imagem."'>");
        echo("<script>
                novo_sobre.txtfoto.value='$caminho_imagem';
            </script>");
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
?>