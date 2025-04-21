<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HelpSupply - Gerenciamento de Fornecimentos - <?=$this->e($title); ?></title>
    <link rel="stylesheet" href="<?=APP_URL?>/public/assets/css/default.css">
    <link rel="stylesheet" href="<?=APP_URL?>/public/assets/css/home.css">
    <link rel="stylesheet" href="<?=APP_URL?>/public/assets/css/navios-fornecidos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid">
    <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 main-color">
                <div class="d-flex flex-column align-items-center align-items-sm-start mx-1 pt-2 text-light min-vh-100 pt-5 menu-wrapper">
                    <div class="dropdown pb-4">
                        <a class="d-flex align-items-center text-white text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?=APP_URL?>/public/assets/images/file.png" alt="hugenerd" width="55" height="55" class="rounded-circle">
                            <div class="d-flex flex-column">
                                <span class="d-none d-sm-inline mx-3" style="font-size: 15px;">Bem-vindo</span>
                                <span class="d-none d-sm-inline mx-3" style="font-size: 13px;">Lucas Celestino</span>
                            </div>
                        </a>
                        <!-- <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sair</a></li>
                        </ul> -->
                    </div>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <div class="border-menu">
                            <li class="d-flex align-items-center item-menu">
                                <img src="<?=APP_URL?>/public/assets/images/home.png" alt="Home" width="24" height="24">
                                <a href="navios-fornecidos.html"  class="nav-link align-middle text-light">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">HOME</span> </a>
                            </li>
                        </div>
                        <div class="border-menu">
                            <li class="d-flex align-items-center item-menu">
                                <img src="<?=APP_URL?>/public/assets/images/pirate-ship 6.png" alt="Home" width="24" height="24">
                                <a href="navios-fornecidos.html"  class="nav-link align-middle text-light">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">NAVIOS FORNECIDOS</span> </a>
                            </li>
                        </div>
                        <div class="border-menu">
                        <li class="d-flex align-items-center item-menu">
                            <img src="<?=APP_URL?>/public/assets/images/file-and-folder 2.png" alt="Controle de Pastas" width="24" height="24">
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link align-middle text-light">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">CONTROLE DE PASTAS</span> </a>
                        </li>
                        </div>
                        <div class="border-menu">
                        <li class="d-flex align-items-center item-menu">
                            <img src="<?=APP_URL?>/public/assets/images/lembrete-2.png" alt="Lembretes" width="24" height="24">
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link align-middle text-light">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">LEMBRETES</span> </a>
                        </li>
                        </div>
                        <div class="border-menu">
                        <li class="d-flex align-items-center item-menu">
                            <img src="<?=APP_URL?>/public/assets/images/sair-2.png" alt="Perfil" width="24" height="24">
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link align-middle text-light">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">PERFIL</span> </a>
                        </li>
                        </div>
                        <div class="border-menu">
                        <li class="d-flex align-items-center item-menu">
                            <img src="<?=APP_URL?>/public/assets/images/utilities-1.png" alt="Utilidades" width="24" height="24">
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link align-middle text-light">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">UTILIDADES</span> </a>
                        </li>
                        </div>
                        <div class="border-menu">
                        <li class="d-flex align-items-center item-menu">
                            <img src="<?=APP_URL?>/public/assets/images/sair-2.png" alt="Sair" width="24" height="24">
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link align-middle text-light">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">SAIR</span> </a>
                        </li>
                        </div>
                    </ul>
                    <hr>
                </div>
            </div>
            <?=$this->section('content')?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>