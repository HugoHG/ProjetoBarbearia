<?php
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
                    window.location.replace("sobre.php?design=CSS/style2.css");
                } else if(d == 1){
                    window.location.replace("sobre.php?design=CSS/style.css");
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
                <div id="contentsobre">
                    <table>
                        <tr>
                            <td style="vertical-align:top;">
                                <?php
                                if ($design == 'CSS/style.css'){
                                    echo('<h1>Sobre a barbearia</h1>');
                                    echo('<p>Inspirada nas antigas barbearias nova-iorquinas típicas de filmes da máfia das décadas de 40, 50 e 60, a Barbearia Corleone chega com a intenção de resgatar a cultura masculina, perdida ao longo dos anos, em que os homens se encontravam para fazer a barba à navalha e cortar os cabelos enquanto fumavam seus charutos, bebiam e conversavam.</p>');
                                    echo('<p>Entre toalhas quentes e massagem facial, os melhores cremes e espumas preparam o rosto dos nossos clientes. E hoje, eles e nossos visitantes ainda podem aproveitar o espaço da nossa cervejaria, que conta com um cardápio com mais de 450 rótulos de cerveja para escolher, degustar ou levar para casa. </p>');
                                } else if ($design == 'CSS/style2.css'){
                                    echo('<h1>Sobre o centro estético</h1>');
                                    echo('<p>Há mais de 6 anos o Centro Estético Penélope tem como objetivo de atender e satisfazer as necessidades das pessoas que querem se cuidar, mas não dispõem de tempo. Composto por uma equipe de profissionais qualificados e experientes, diversidade em Tratamentos Estéticos Faciais e Corporal, temos ainda Salão de Cabeleireiro, Espaço para Depilação, Manicure e Pedicure. Tudo isso para atender a sua necessidade, porque aqui você é o centro da nossa motivação.</p>');
                                };
                                ?>

                            </td>
                            <td>
                                <?php
                                if ($design == 'CSS/style.css'){
                                    echo('<img src="imagens/simbolobarbe.png" alt="simbolo_barbearia">');
                                } else if ($design == 'CSS/style2.css'){
                                    echo('<img src="imagens/centroestetico/desenhoest.png" alt="simbolo_estetica">');
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>