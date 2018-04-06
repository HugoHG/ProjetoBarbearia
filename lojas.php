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
                    window.location.replace("lojas.php?design=CSS/style2.css");
                } else if(d == 1){
                    window.location.replace("lojas.php?design=CSS/style.css");
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
                <div id="contentbarbearia">
                    <h1>Endereços</h1>
                    <ul>
                        <li>Itapevi: R. Joaquim Nunes, 7 - Centro</li>
                        <li>Barueri: Av. dos Patos, 51 - Aldeia da Serra</li>
                        <li>Osasco: Av. Antônio Carlos Costa, 263 - Bela Vista</li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>