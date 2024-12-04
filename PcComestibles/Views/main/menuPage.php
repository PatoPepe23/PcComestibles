<div>
    <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active"><a href="">Menu</a></li>
    </ol>
    </nav>
</div>


<div class="row">
    <div class="col-2 p-1 menu-filter">
        <h4 class="p-0">Filtro</h4>
        <div class="row m-0 gap-1   ">
            <button class="col-8">Lorem</button>
            <button class="col-6">Lorem</button>
            <button class="col-5">Lorem</button>
            <button class="col-5">Lorem</button>
            <button class="col-6">Lorem</button>
        </div>
        <div class="row m-0">
            <h6 class="p-0">Busqueda de Filtros</h6>
            <div class="filter-searcher align-center">
                <input type="text" placeholder="Buscar...">
                <button class="p-0 m-0">
                    <svg class="icon_defaultIcon__pltkn10 icon_bigIcon__pltkn12" xmlns="http://www.w3.org/2000/svg" 
                    viewBox="0 0 24 24" enable-background="new 0 0 24 24"><path d="M12 12c-2.2 0-4-1.8-4-4s1.8-4 4-4 
                    4 1.8 4 4-1.8 4-4 4zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM20 20h-16v-1c0-3.5 3.3-6 8-6s8 
                    2.5 8 6v1zm-13.8-2h11.7c-.6-1.8-2.8-3-5.8-3s-5.3 1.2-5.9 3z"></path></svg>
                </button>
            </div>
        </div>
        <div>
            <h6 class="p-0">Precios</h6>
            <h2>Coming soon</h2>
        </div>
    </div>
    <div class="col-10">
        <div class="row">
            <?php

                for ($a = 0; $a < 6; $a++) {
                    echo "<a class='top-menu-types' href='''>
                            <img src='/Views/images/PcComestibles-Simple.png' alt='' width='100px' height='100px'>
                        </a>";
                    }
                ?>
        </div>
        <div class="row gap-5 justify-content-center midl-filter">
            <button class="top-filter col-1">Comprar</button>     
            <button class="top-filter col-1">Relevancia</button>
            <button class="top-filter col-1">Precio mas bajo</button>
            <button class="top-filter col-1">Precio mas alto</button>
            <button class="top-filter col-1">Mas vendido</button>
            <button class="top-filter col-1"  >Oferta</button>
            <p class="col-1 p-0 m-0 align-self-center">123 Bowls</p>
        </div>
        <div class="">
            <div class="row gap-4 mt-5">
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
        
    </div>
</div>