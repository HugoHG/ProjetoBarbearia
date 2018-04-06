<div id="camposlider">
    <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">

            <img src="<?php echo($slider1) ?>" style="height:500px; width:1300px;" alt="Imagem da barbearia">

        </div>

        <div class="mySlides fade">

            <img src="<?php echo($slider2) ?>" style="height:500px; width:1300px;" alt="Imagem da barbearia">

        </div>

        <div class="mySlides fade">

            <img src="<?php echo($slider3) ?>" style="height:500px; width:1300px;" alt="Imagem da barbearia">

        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- The dots/circles -->
    <div style="text-align:center; margin-top: -50px; position: absolute; margin-left: 600px;">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
</div>