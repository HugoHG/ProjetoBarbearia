<?php
$design = @$_GET['design'];

if(isset($_GET['errologin'])){
    if ($_GET['errologin'] == 1){
        echo('<script type="text/javascript">
            alert("Usuário e/ou senha incorreto(s)");
            </script>');
    }
}

if(empty($design)){
    $design = 'css/style.css';
}

if ($design == 'css/style.css'){
    $imagem = 'imagens/cortes/gallery_01.jpg';
    $slider1 = "imagens/barbearia/img1.jpg";
    $slider2 = "imagens/barbearia/img2.jpg";
    $slider3 = "imagens/barbearia/img3.jpg";
} else if ($design == 'css/style2.css'){
    $imagem = 'imagens/centroestetico/spa-12.jpg';
    $slider1 = "imagens/centroestetico/img1.jpg";
    $slider2 = "imagens/centroestetico/img2.jpg";
    $slider3 = "imagens/centroestetico/img3.jpg";
}

if(empty($design)){
    $design = 'css/style.css';
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo($design) ?>" id="design">
    <link rel="stylesheet" type="text/css" href="css/styleslider.css">
    <meta charset="utf-8">
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
                if (n > slides.length) {
                    slideIndex = 1
                } 
                if (n < 1) {
                    slideIndex = slides.length
                }
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
                    window.location.replace("homebarbearia.php?design=css/style2.css");
                } else if(d == 1){
                    window.location.replace("homebarbearia.php?design=css/style.css");
                }

            }

        </script>
        <title>Centro Estético</title>
    </head>
    <body onload="plusSlides(0);" id="bodybarbearia" onload="alerta(3)">
        <div id="main">
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

                if($design == 'css/style.css'){
                    echo('<button id="botaodesign" onclick="mudarDesign(2);"><img src="imagens/penelopeb.png"></button>');
                } else{
                    echo('<button id="botaodesign" onclick="mudarDesign(1);"><img src="imagens/logobarb.png"></button>');
                }

                ?>
                <div id="redesocial">
                    <img src="imagens/facebook.svg" id="rs1" alt="logo_facebook">
                    <img src="imagens/instagram.png" id="rs2" alt="logo_instagram">
                    <img src="imagens/twitter.png" id="rs3" alt="logo_twitter">
                </div> 
                <?php
                include('slider.php');
                ?>
                <div id="content">
                    <div id="menulateral">
                        <p>item 1</p>
                        <p>item 2</p>
                    </div>
                    <div id="caixaprodutos">
                        <div class="produto">
                            <img class="imgproduto" src="<?php echo($imagem) ?>" alt="Corte de cabelo">
                            <p>Nome:</p>
                            <p>Descrição:</p>
                            <p>Preço:</p>
                            <p><a href="#">Detalhes</a></p>
                        </div>
                        <div class="produto">
                            <img class="imgproduto" src="<?php echo($imagem) ?>" alt="Corte de cabelo">
                            <p>Nome:</p>
                            <p>Descrição:</p>
                            <p>Preço:</p>
                            <p><a href="#">Detalhes</a></p>
                        </div>
                        <div class="produto">
                            <img class="imgproduto" src="<?php echo($imagem) ?>" alt="Corte de cabelo">
                            <p>Nome:</p>
                            <p>Descrição:</p>
                            <p>Preço:</p>
                            <p><a href="#">Detalhes</a></p>
                        </div>
                        <div class="produto">
                            <img class="imgproduto" src="<?php echo($imagem) ?>" alt="Corte de cabelo">
                            <p>Nome:</p>
                            <p>Descrição:</p>
                            <p>Preço:</p>
                            <p><a href="#">Detalhes</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>