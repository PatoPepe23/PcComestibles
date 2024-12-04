<div>
  <div class="row column-gap-5 row-gap-5">
    <div class="col-sm-12 col-md-12 col-lg oferta oferta-1">
        <div>
            <svg class="icon_defaultIcon__pltkn10 icon_bigIcon__pltkn12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" enable-background="new 0 0 24 24"><path d="M12 12c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM20 20h-16v-1c0-3.5 3.3-6 8-6s8 2.5 8 6v1zm-13.8-2h11.7c-.6-1.8-2.8-3-5.8-3s-5.3 1.2-5.9 3z"></path></svg>
            <h3>Hola me llamo Paco</p>
        </div>
      <img src="/Views/images/PcComestibles-Simple.png" alt="">
    </div>
    <div class="col-sm-12 col-md-12 col-lg oferta oferta-model-2 oferta-2">
        <div id="oferta-2-title">
            <h3>Nuevos ingredientes</h3>
        </div>    
        <div>
            <img src="/Views/images/PcComestibles-Simple.png" alt="">
        </div>
        <!--<svg class="icon_defaultIcon__pltkn10 icon_bigIcon__pltkn12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" enable-background="new 0 0 24 24"><path d="M12 12c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM20 20h-16v-1c0-3.5 3.3-6 8-6s8 2.5 8 6v1zm-13.8-2h11.7c-.6-1.8-2.8-3-5.8-3s-5.3 1.2-5.9 3z"></path></svg>-->
        <div>
            <h3>Hola me llamo Paco</p>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg oferta oferta-3">
        <div id="oferta-3-title">
            <h3>Nuevos ingredientes</h3>
        </div>    
        <div>
            <img src="/Views/images/PcComestibles-Simple.png" alt="">
        </div>
        <!--<svg class="icon_defaultIcon__pltkn10 icon_bigIcon__pltkn12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" enable-background="new 0 0 24 24"><path d="M12 12c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM20 20h-16v-1c0-3.5 3.3-6 8-6s8 2.5 8 6v1zm-13.8-2h11.7c-.6-1.8-2.8-3-5.8-3s-5.3 1.2-5.9 3z"></path></svg>-->
        <div>
            <h3>Hi, im a placeholder</p>
        </div>
    </div>
  </div>

    <div class="row mt-5">
        <h2>Oferstas Semanales</h2>
    </div>
    <div class="container m-0 p-0 mainSliderContainer">
        <div class="row flex-nowrap mainSlider-1" id="mainSlider" style="margin-left: 0px;">
            <?php

            foreach ($products as $row) {
                echo "<a class='card' href=''>
                        <div class='cardImage'>
                            <img src='/Views/images/".$row->getImage()."' class='' alt='...'>
                        </div>
                        <div class='cardButtons'>
                            <p class='trending'>Trending</p>
                            <p class='promotion'>Promocion</p>
                        </div>
                        <div class='card-body'>
                            <p class='card-text'>".$row->getName()."</p>
                            <div class='card-prices'>
                                <p class='card-price'>".$row->getPrice()."€</p>
                                <p class='card-old-price'>".$row->getOldPrice()."€</p>
                            </div>
                            <div class='free-deliver'>
                                <img src='/Views/images/PcComestibles-Simple.png' alt=''>
                                <p class='free-deliver-text'>Envio gratis con una compra superior a 50€</p>
                            </div>
                        </div>
                    </a>";
                }
            ?>
        </div>
        <button id="sliderLeft" class="sliderButton"><svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.556915 0.556885L10.5703 10.5703" stroke="black" stroke-width="1.88976" stroke-linejoin="bevel"/>
            <path d="M0.556915 19.4731L10.5703 9.45966" stroke="black" stroke-width="1.88976" stroke-linejoin="bevel"/>
            </svg>
        </button>
        <button id="sliderRight" class="sliderButton"><svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.556915 0.556885L10.5703 10.5703" stroke="black" stroke-width="1.88976" stroke-linejoin="bevel"/>
            <path d="M0.556915 19.4731L10.5703 9.45966" stroke="black" stroke-width="1.88976" stroke-linejoin="bevel"/>
            </svg>
        </button>
    </div>
    <h2>Tendencias</h2>
    <div class=" row gap-4 justify-content-center trends-container">
        <a href="" class="col-sm-12 col-md-12 col-lg-5 col-xxl trends">
            <div class="internal-trends">
                <img src="/Views/images/019225b2-b321-7989-b1d1-92a836ed6566.png" alt="">
            </div>
            <p>Lorem</p>
        </a>
        <a href="" class="col-sm-12 col-md-12 col-lg-5 col-xxl trends">
            <div class="internal-trends">
                <img src="/Views/images/arroz-soja.jfif" alt="">
            </div>
            <p>Lorem</p>
        </a>
        <a href="" class="col-sm-12 col-md-12 col-lg-5 col-xxl trends">
            <div class="internal-trends">
                <img src="/Views/images/arroz-tres-delicias.jfif" alt="">
            </div>
            <p>Lorem</p>
        </a>
        <a href="" class="col-sm-12 col-md-12 col-lg-5 col-xxl trends">
            <div class="internal-trends">
                <img src="/Views/images/ensalada-de-pasta.jpg" alt="">
            </div>
            <p>Lorem</p>
        </a>
        <a href="" class="col-sm-12 col-md-12 col-lg-5 col-xxl trends">
            <div class="internal-trends">
                <img src="/Views/images/f2b1ca714081b6fffb9e9da5b779afba.jpg" alt="">
            </div>
            <p>Lorem</p>
        </a>
    </div>
</div>