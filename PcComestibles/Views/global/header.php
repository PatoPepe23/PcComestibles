<?php

if (!isset($_SESSION['username'])) {
    session_start();
}

?>

<header class="container-fluid text-center">
    <div class="row fixed">
        <div class="col-4 header-left d-none d-lg-flex">
            <a href="">
                <img src="/Views/images/PcComestibles-2.0.png" alt="Logo de PCcomestibles" height="70px">
            </a>
            <button class="header-drop-left" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.000244141 1C0.506836 1 16.0001 1 16.0001 1" stroke="black" stroke-width="1.88976" stroke-linejoin="bevel"/>
                    <path d="M0 7.52069H15.9999" stroke="black" stroke-width="1.88976" stroke-linejoin="bevel"/>
                    <path d="M0.000244141 14.0377C0.506836 14.0377 16.0001 14.0377 16.0001 14.0377" stroke="black" stroke-width="1.88976" stroke-linejoin="bevel"/>
                </svg>
                Todas las categorias
            </button>

            <div class="offcanvas offcanvas-start" data-bs-backdrop="true" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="staticBackdropLabel">Categorias</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
                <div class="offcanvas-body">
                    <div>
                        <a href="/">Home</a>
                        <a href="/menu">Menu</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 header-left d-lg-none">
            <a href="">
                <img src="/Views/images/PcComestibles-Simple.png" alt="Logo de PCcomestibles" height="70px">
            </a>
            <button class="header-drop-left" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.000244141 1C0.506836 1 16.0001 1 16.0001 1" stroke="black" stroke-width="1.88976" stroke-linejoin="bevel"/>
                    <path d="M0 7.52069H15.9999" stroke="black" stroke-width="1.88976" stroke-linejoin="bevel"/>
                    <path d="M0.000244141 14.0377C0.506836 14.0377 16.0001 14.0377 16.0001 14.0377" stroke="black" stroke-width="1.88976" stroke-linejoin="bevel"/>
                </svg>
            </button>

            <div class="offcanvas offcanvas-start" data-bs-backdrop="true" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="staticBackdropLabel">Categorias</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
                <div class="offcanvas-body">
                    <div>
                        Meter cosas (Muy importante)
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5" id="search">
            <div id="headerSelect">
                <select name="" id="headerSearchFilter" class= "d-none d-lg-flex">
                    <option value="">Black Friday</option>
                    <option value="">Todo el catalogo</option>
                    <option value="">Reacondicionados</option>
                </select>
            </div>
            <form action="" id="headerForm">
                <div id="headerSearcher">
                    <input type="text" placeholder="Buscar">
                    <button type="submit" class="search-svg">
                        <svg class="icon_defaultIcon__pltkn10 icon_bigIcon__pltkn12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" enable-background="new 0 0 24 24"><path d="M12 12c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM20 20h-16v-1c0-3.5 3.3-6 8-6s8 2.5 8 6v1zm-13.8-2h11.7c-.6-1.8-2.8-3-5.8-3s-5.3 1.2-5.9 3z"></path></svg> 
                    </button>
                </div>
            </form>
        </div>
        <?php
        if (isset($_SESSION['username'])) { ?>
            <div class="col-3" id="profile-buttons">
                <button class="btn btn-primary normal-button" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <svg class="icon_defaultIcon__pltkn10 icon_bigIcon__pltkn12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" enable-background="new 0 0 24 24"><path d="M12 12c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM20 20h-16v-1c0-3.5 3.3-6 8-6s8 2.5 8 6v1zm-13.8-2h11.7c-.6-1.8-2.8-3-5.8-3s-5.3 1.2-5.9 3z"></path></svg> 
                    <p class="d-none d-lg-flex"><?=$_SESSION['username']?></p>
                </button>
                <button class="btn btn-primary normal-button" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight-2" aria-controls="offcanvasRight">
                    <svg class="icon_defaultIcon__pltkn10 icon_bigIcon__pltkn12" xmlns="http://www.w3.org/2000/svg " viewBox="0 0 24 24" enable-background="new 0 0 24 24"><path d="M12 12c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM20 20h-16v-1c0-3.5 3.3-6 8-6s8 2.5 8 6v1zm-13.8-2h11.7c-.6-1.8-2.8-3-5.8-3s-5.3 1.2-5.9 3z"></path></svg> 
                    <p class="d-none d-lg-flex">Cesta</p>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasRightLabel">Mi Cuenta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <form action="/loguot" method="PSOT">
                            <button>Cerrar seion</button>
                        </form>
                    </div>
                </div>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight-2" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasRightLabel">Mi Cesta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div>
                            <p>Cosas de mi cesta</p>
                            
                            <?php foreach($_SESSION['cart'] as $product){ ?>
                                <div class='border'>
                                    <img src='/Views/images/<?= $product['product']->getImage()?>' alt='' height='50px' width='50px'>
                                    <p><?=$product['product']->getName()?></p>
                                    <div class='cart_buttons'>
                                        <button id='cart_less'>-</button>
                                        <h5><?=$product['cuantity']?></h5>
                                        <button id='cart_plus'>+</button>
                                    </div>
                                    <form action="/deleteFromCart" method="POST">
                                        <input type="text" value=<?= $product['product']->getID() ?> hidden>
                                        <button>borrar</button>
                                    </form>
                                </div>
                           <?php } ?>
                        
                        </div>
                    </div>
                </div>
            </div>
        <?php } else{?>
            
            <div class="col-3" id="profile-buttons">
            <a class="normal-button" href="/login">
            <svg class="icon_defaultIcon__pltkn10 icon_bigIcon__pltkn12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" enable-background="new 0 0 24 24"><path d="M12 12c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM20 20h-16v-1c0-3.5 3.3-6 8-6s8 2.5 8 6v1zm-13.8-2h11.7c-.6-1.8-2.8-3-5.8-3s-5.3 1.2-5.9 3z"></path></svg> 
            <p class= "d-none d-lg-flex">Cuenta</p>
            </a>
            <a class="normal-button">
            <svg class="icon_defaultIcon__pltkn10 icon_bigIcon__pltkn12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" enable-background="new 0 0 24 24"><path d="M12 12c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM20 20h-16v-1c0-3.5 3.3-6 8-6s8 2.5 8 6v1zm-13.8-2h11.7c-.6-1.8-2.8-3-5.8-3s-5.3 1.2-5.9 3z"></path></svg> 
            <p class= "d-none d-lg-flex">Cesta</p>
            </a>
            </div>
        <?php }?>
    </div>
    <div class="container-fluid m-0 p-0">
        <nav id="header-nav" class="row">
            <a href="" class="normal-button col-2 col-auto">¡Ofertas flash!</a>
            <a href="" class="normal-button col-2 col-auto">¡Ofertas BLACK FRIDAY!</a>
        </nav>
    </div>
    
</header>