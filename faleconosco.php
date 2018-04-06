<?php
$conexao = mysqli_connect('localhost', 'root', 'bcd127', 'db_centroestetico');

session_start();


$design = @$_GET['design'];


if(empty($design)){
    $design = 'CSS/style.css';
}

if ($design == 'CSS/style.css'){
    $imagem = 'imagens/cortes/gallery_01.jpg';
    $slider1 = "imagens/barbearia/img1.jpg";
    $slider2 = "imagens/barbearia/img2.jpg";
    $slider3 = "imagens/barbearia/img3.jpg";
} else if ($design == 'CSS/style2.css'){
    $imagem = 'imagens/centroestetico/spa-12.jpg';
    $slider1 = "imagens/centroestetico/img1.jpg";
    $slider2 = "imagens/centroestetico/img2.jpg";
    $slider3 = "imagens/centroestetico/img3.jpg";
}


//mysql_select_db('db_centroestetico');

$nome = "";
$telefone = "";
$celular = "";
$email = "";
$homepage = "";
$facebook = "";
$criticas = "";
$sexo = "";
$profissao = "";

if(isset($_POST['btnSalvar'])){
    $nome = $_POST['txtNome'];
    $telefone = $_POST['txtTelefone'];
    $celular = $_POST['txtCelular'];
    $email = $_POST['txtEmail'];
    $homepage = $_POST['txtHomepage'];
    $facebook = $_POST['txtFacebook'];
    $criticas = $_POST['txtCriticas'];
    $informacoes = $_POST['txtInformacoes'];
    $sexo = $_POST['rdoSexo'];
    $profissao = $_POST['txtProfissao'];

    $sql = "insert into tbl_faleconosco (nome, telefone, celular, email, homepage, facebook, criticas, infoprodutos, sexo, profissao) values  ('".$nome."','".$telefone."','".$celular."','".$email."','".$homepage."','".$facebook."','".$criticas."','".$informacoes."','".$sexo."','".$profissao."');";

    mysqli_query($conexao, $sql);

    header('location:index.php');

    /*echo($sql);*/
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo($design) ?>" id="design">
        <link rel="stylesheet" type="text/css" href="CSS/styleslider.css">
        <title>Centro Estético</title>
        <script>


            var slideIndex = 1;
            showSlides(slideIndex);

            // Next/previous controls
            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            // Thumbnail image controls
            function currentSlide(n) {
                showSlides(slideIndex = n);
            }

            function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("dot");
                if (n > slides.length) {slideIndex = 1} 
                if (n < 1) {slideIndex = slides.length}
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none"; 
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex-1].style.display = "block"; 
                dots[slideIndex-1].className += " active";
            }

            function mudarDesign(d){
                if(d == 2){
                    window.location.replace("faleconosco.php?design=CSS/style2.css");
                } else if(d == 1){
                    window.location.replace("faleconosco.php?design=CSS/style.css");
                }

            }

            function validar(caracter, blockType, campo){

                /*document.getElementById(campo).style="background-color:#ffffff;";*/

                //tratamento para verificar de qual tipo de navrgador esta vindo a tecla
                if(window.event){
                    //Recebe a ascci do IE

                    var letra = caracter.charCode;


                    //Recebe a ascci de outros navegadores
                }else{
                    var letra = caracter.which;
                }
                if (blockType == 'number'){
                    if (letra < 48 || letra > 57){
                        if (letra != 8 && letra!= 32){
                            /*document.getElementById(campo).style="background-color:#F08080;";*/
                            return false;

                        }

                    }
                }else if(blockType == 'caracter'){

                    if (letra >= 48 && letra <= 57){
                        /*document.getElementById(campo).style="background-color:#F08080;";*/
                        return false;
                    }
                }
            }
        </script>
    </head>
    <body onload="plusSlides(0);" id="bodybarbearia">

        <div id="main">
            <div id="redesocial">
                <div id="rs1"></div>
                <div id="rs2"></div>
                <div id="rs3"></div>
            </div>
            <div id="headerdiv">
                <div id="headerdentro">
                    <header>
                        <?php
                        include 'menu.php';
                        ?>
                    </header>
                </div>
            </div>
            <div id="abaixodoheader">

                <?php

                if($design == 'CSS/style.css'){
                    echo('<button id="botaodesign" onclick="mudarDesign(2);">Mudar design</button>');
                } else{
                    echo('<button id="botaodesign" onclick="mudarDesign(1);">Mudar design</button>');
                }

                ?>

                <?php
                include('slider.php');
                ?>
                <div id="contentfaleconosco">
                    <h1>Fale Conosco</h1>
                    <form name="formulario" method="post" action="faleconosco.php" id="formulario">
                        <div id="divform">
                            <p>Nome*:</p>
                            <input type="text" name="txtNome" style="width:250px;" required>
                            <p>Telefone:</p>
                            <input type="tel" name="txtTelefone" id="telefone" required onkeypress="return validar(event,'number','telefone')"; pattern="\(\d{2}\)\d{4}-\d{4}">
                            <p>Celular*:</p>
                            <input type="tel" name="txtTelefone"  id="celular" required onkeypress="return validar(event,'number','telefone');">
                            <p>Email*:</p>
                            <input type="email" name="txtEmail" style="width:250px;" required>
                            <p>Home Page:</p>
                            <input type="text" name="txtHomepage" style="width:250px;">
                            <p>Facebook:</p>
                            <input type="text" name="txtFacebook" style="width:250px;">
                            <p>Sugestões/críticas:</p>
                            <textarea name="txtCriticas"></textarea>
                            <p>Informações de produtos:</p>
                            <input type="text" name="txtInformacoes">
                            <p>Sexo*:</p>
                            <input type="radio" name="rdoSexo" value="f" required>F
                            <input type="radio" name="rdoSexo" value="m" required>M
                            <p>Profissão*:</p>
                            <input type="text" name="txtProfissao" style="width:250px;" required>
                            <button type="submit" name="btnSalvar">Salvar</button>
                            <button type="reset" name="btnLimpar">Limpar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>