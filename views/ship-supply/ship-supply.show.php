<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Help Marine - Gerenciamento de Pastas</title>
    <link rel="stylesheet" href="../public/assets/css/default.css">
    <link rel="stylesheet" href="../public/assets/css/home.css">
    <link rel="stylesheet" href="../public/assets/css/navios-fornecidos.css">
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
                            <img src="../public/assets/images/file.png" alt="hugenerd" width="55" height="55" class="rounded-circle">
                            <div class="d-flex flex-column">
                                <span class="d-none d-sm-inline mx-3" style="font-size: 15px;">Bem-vindo</span>
                                <span class="d-none d-sm-inline mx-3" style="font-size: 13px;">Lucas Celestino</span>
                            </div>
                        </a>
                    </div>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <div class="border-menu">
                            <li class="d-flex align-items-center item-menu">
                                <img src="../public/assets/images/home.png" alt="Home" width="24" height="24">
                                <a href="navios-fornecidos.html"  class="nav-link align-middle text-light">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">HOME</span> </a>
                            </li>
                        </div>
                        <div class="border-menu">
                            <li class="d-flex align-items-center item-menu">
                                <img src="../public/assets/images/pirate-ship 6.png" alt="Home" width="24" height="24">
                                <a href="navios-fornecidos.html"  class="nav-link align-middle text-light">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">NAVIOS FORNECIDOS</span> </a>
                            </li>
                        </div>
                        <div class="border-menu">
                        <li class="d-flex align-items-center item-menu">
                            <img src="../public/assets/images/file-and-folder 2.png" alt="Controle de Pastas" width="24" height="24">
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link align-middle text-light">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">CONTROLE DE PASTAS</span> </a>
                        </li>
                        </div>
                        <div class="border-menu">
                        <li class="d-flex align-items-center item-menu">
                            <img src="../public/assets/images/lembrete-2.png" alt="Lembretes" width="24" height="24">
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link align-middle text-light">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">LEMBRETES</span> </a>
                        </li>
                        </div>
                        <div class="border-menu">
                        <li class="d-flex align-items-center item-menu">
                            <img src="../public/assets/images/sair-2.png" alt="Perfil" width="24" height="24">
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link align-middle text-light">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">PERFIL</span> </a>
                        </li>
                        </div>
                        <div class="border-menu">
                        <li class="d-flex align-items-center item-menu">
                            <img src="../public/assets/images/utilities-1.png" alt="Utilidades" width="24" height="24">
                            <a href="#submenu1" aria-disabled="true" data-bs-toggle="collapse" class="nav-link align-middle text-light disabled">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline text-secondary">UTILIDADES</span> </a>
                        </li>
                        </div>
                        <div class="border-menu">
                        <li class="d-flex align-items-center item-menu">
                            <img src="../public/assets/images/sair-2.png" alt="Sair" width="24" height="24">
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link align-middle text-light">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">SAIR</span> </a>
                        </li>
                        </div>
                    </ul>
                    <hr>
                </div>
            </div>
            <div class="col py-4 px-5 text-white" style="background-color: #0D0D0D;">
                <div class="home-title-content container p-0">
                    <h2 class="mb-4">Navios Fornecidos</h2>
                </div>
                <div class="home-last-suppliers mb-4 container p-0">
                  <div class="form-add-fornecimento-wrapper px-4 py-3">
                    <div class="head d-flex align-items-center py-2 mb-2">
                        <img src="../public/assets/images/seta-direita-2.png" style="margin-right: 10px;">
                        <a href="<?=APP_URL;?>/navios-fornecidos" class="text-decoration-none text-white fw-bold" style="margin-right: 10px;">Voltar</a>
                        <p class="p-0 m-0" style="margin-right: 10px;"><?=$ship->name?>  <?=$ship->acronym?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Nome do navio:</p>
                        <p class="my-0"><?=$ship->name;?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Sigla:</p>
                        <p class="my-0"><?=$ship->acronym;?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Porto:</p>
                        <p class="my-0"><?=$ship->harbor;?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Tipo de fornecimento:</p>
                        <p class="my-0"><?=$ship->type;?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Data de fornecimento:</p>
                        <p class="my-0"><?=$ship->supply_date;?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Responsável pelo navio:</p>
                        <p class="my-0"><?=$ship->responsible;?> / <?=$ship->second_responsible;?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Regime:</p>
                        <p class="my-0"><?=$ship->regime;?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Status:</p>
                        <?php if($ship->status == 0): ?>
                            <p class="p-1 m-0 bg-success rounded">Recebido</p>
                        <?php else: ?>
                            <p class="p-1 m-0 bg-danger rounded">Aguardando</p>
                        <?php endif; ?>
                    </div>
                    <div class="d-flex w-25 justify-content-between">
                        <a href="#" class="btn btn-warning" style="width: 120px;">Editar</a>
                        <a href="excluir/<?=$ship->id;?>" class="btn btn-danger" style="width: 120px;">Excluir</a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>