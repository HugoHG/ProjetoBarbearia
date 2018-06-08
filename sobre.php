<?php
$design = @$_GET['design'];

if(empty($design)){
    $design = 'css/style.css';
}

if ($design == 'css/style.css'){
    $imagem = 'imagens/cortes/gallery_01.jpg';
    $slider1 = "imagens/barbearia/img1.jpg";
    $slider2 = "imagens/barbearia/img2.jpg";
    $slider3 = "imagens/barbearia/img3.jpg";
    $estabelecimentoPag = 1;
} else if ($design == 'css/style2.css'){
    $imagem = 'imagens/centroestetico/spa-12.jpg';
    $slider1 = "imagens/centroestetico/img1.jpg";
    $slider2 = "imagens/centroestetico/img2.jpg";
    $slider3 = "imagens/centroestetico/img3.jpg";
    $estabelecimentoPag = 2;
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo($design) ?>" id="design">
    <link rel="stylesheet" type="text/css" href="css/styleslider.css">
    <meta charset="utf-8">
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
                window.location.replace("sobre.php?design=css/style2.css");
            } else if(d == 1){
                window.location.replace("sobre.php?design=css/style.css");
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

                if($design == 'css/style.css'){
                    echo('<button id="botaodesign" onclick="mudarDesign(2);"><img src="imagens/penelopeb.png"></button>');
                } else{
                    echo('<button id="botaodesign" onclick="mudarDesign(1);"><img src="imagens/logobarb.png"></button>');
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
                            $conexao = @mysqli_connect('192.168.0.2', 'pc320181', 'senai127', 'dbpc320181');

                            $sql = "select * from tbl_sobre where idEstabelecimento = ".$estabelecimentoPag." and visibilidade = 1";

                            $resultadoSelect = mysqli_query($conexao, $sql);

                            while ($item = mysqli_fetch_array($resultadoSelect)){
                                $caminhoimagem = str_replace("../", "", $item['imgSobre']);
                                echo('<h1>'.$item['titulo'].'</h1>');
                                echo('<p>'.$item['txtSobre'].'</p>');
                                ?>
                            </td>
                            <td>
                                <img src="<?php echo($caminhoimagem) ?>">
                                <?php
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