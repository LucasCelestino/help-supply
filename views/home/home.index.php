<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HelpSupply - Gerenciamento de Pastas</title>
    <link rel="stylesheet" href="public/assets/css/default.css">
    <link rel="stylesheet" href="public/assets/css/home.css">
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
                            <img src="public/assets/images/file.png" alt="hugenerd" width="55" height="55" class="rounded-circle">
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
                                <img src="public/assets/images/home.png" alt="Home" width="24" height="24">
                                <a href="navios-fornecidos.html"  class="nav-link align-middle text-light">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">HOME</span> </a>
                            </li>
                        </div>
                        <div class="border-menu">
                            <li class="d-flex align-items-center item-menu">
                                <img src="public/assets/images/pirate-ship 6.png" alt="Home" width="24" height="24">
                                <a href="navios-fornecidos.html"  class="nav-link align-middle text-light">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">NAVIOS FORNECIDOS</span> </a>
                            </li>
                        </div>
                        <div class="border-menu">
                        <li class="d-flex align-items-center item-menu">
                            <img src="public/assets/images/file-and-folder 2.png" alt="Controle de Pastas" width="24" height="24">
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link align-middle text-light">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">CONTROLE DE PASTAS</span> </a>
                        </li>
                        </div>
                        <div class="border-menu">
                        <li class="d-flex align-items-center item-menu">
                            <img src="public/assets/images/lembrete-2.png" alt="Lembretes" width="24" height="24">
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link align-middle text-light">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">LEMBRETES</span> </a>
                        </li>
                        </div>
                        <div class="border-menu">
                        <li class="d-flex align-items-center item-menu">
                            <img src="public/assets/images/sair-2.png" alt="Perfil" width="24" height="24">
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link align-middle text-light">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">PERFIL</span> </a>
                        </li>
                        </div>
                        <div class="border-menu">
                        <li class="d-flex align-items-center item-menu">
                            <img src="public/assets/images/utilities-1.png" alt="Utilidades" width="24" height="24">
                            <a href="#submenu1" aria-disabled="true" data-bs-toggle="collapse" class="nav-link align-middle text-light disabled">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline text-secondary">UTILIDADES</span> </a>
                        </li>
                        </div>
                        <div class="border-menu">
                        <li class="d-flex align-items-center item-menu">
                            <img src="public/assets/images/sair-2.png" alt="Sair" width="24" height="24">
                            <a href="loggout" class="nav-link align-middle text-light">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">SAIR</span> </a>
                        </li>
                        </div>
                    </ul>
                    <hr>
                </div>
            </div>
            <div class="col py-4 px-5 text-white" style="background-color: #0D0D0D;">
                <div class="home-title-content container p-0">
                    <h2 class="mb-4">Últimas Informações</h2>
                </div>
                <div class="container home-last-infos-content px-0 mb-4 d-flex justify-content-between">
                    <div class="item">
                        <div class="d-flex px-4 h-100 align-items-center">
                            <p class="title-card-last-infos"><?=$this->e($folders_with_racine);?> Pastas Racine</p>
                            <img src="public/assets/images/folders.png" width="85">
                        </div>
                    </div>
                    <div class="item">
                        <div class="d-flex px-4 h-100 align-items-center">
                            <p class="title-card-last-infos"><?=$this->e($folders_with_pendings);?> Pastas Pendências</p>
                            <img src="public/assets/images/folders.png" width="85">
                        </div>
                    </div>
                    <div class="item">
                        <div class="d-flex px-4 h-100 align-items-center">
                            <p class="title-card-last-infos"><?=$this->e($folders_send);?> Pastas Enviadas</p>
                            <img src="public/assets/images/folders.png" width="85">
                        </div>
                    </div>
                </div>
                <div class="home-title-content container p-0">
                    <h2 class="mb-4">Painel</h2>
                </div>
                <div class="home-last-suppliers mb-4 container p-0">
                    <table class="table">
                        <div class="title pt-3 pb-2 px-2 d-flex">
                            <h2 class="m-0" style="margin-right: 10px !important;">Últimos Navios Fornecidos</h2>
                            <a class="text-decoration-none text-white sdsodokds" style="font-size: 13px;" href="#">Ver Mais</a>
                        </div>
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Navio</th>
                            <th>Sigla</th>
                            <th>Porto</th>
                            <th>Tipo</th>
                            <th>Data de Fornecimento</th>
                            <th>Status</th>
                            <th>Opções</th>
                          </tr>
                        </thead>
                        <?php if(isset($last_supplies) && !empty($last_supplies)): ?>
                        <tbody>
                          <?php foreach($last_supplies as $lastSupply): ?>
                          <tr>
                            <th scope="row" class="px-3"><?=$lastSupply->id;?></th>
                            <td><?=$lastSupply->name;?></td>
                            <td><?=$lastSupply->acronym;?></td>
                            <td><?=$lastSupply->harbor;?></td>
                            <td><?=$lastSupply->type;?></td>
                            <td><?=$lastSupply->supply_date;?></td>
                            <td class="infos">
                                <?php if($lastSupply->status == 0): ?>
                                    <p class="p-0 m-0 bg-success">Recebido</p>
                                <?php else: ?>
                                    <p class="p-0 m-0 bg-danger">Aguardando</p>
                                <?php endif; ?>
                            </td>
                            <td class="infos">
                                <a href="#">Ver detalhes</a>
                            </td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                        <?php endif; ?>
                      </table>
                      <?php if(!isset($last_supplies) && empty($last_supplies)): ?>
                      <p>Não existem navios fornecidos no momento...</p>
                      <?php endif; ?>
                </div>
                <div class="home-last-cards container p-0">
                    <div class="home-title-content">
                        <h2 class="mb-4">Últimos Lembretes Cadastrados</h2>
                    </div>
                    <div class="cards-wrapper d-flex justify-content-between">
                        <div class="card py-3 text-white" style="width: 18rem;">
                            <div class="card-body">
                              <h5 class="card-title">Credit notes sempre separados nos scans</h5>
                              <p class="card-text">Criado em: 06/04/2025</p>
                              <div class="d-flex">
                                <a href="#" class="btn btn-danger btn-lasts-cards">Editar</a>
                                <a href="#" class="btn btn-warning btn-lasts-cards">Excluir</a>
                              </div>
                            </div>
                        </div>
                        <div class="card py-3 text-white" style="width: 18rem;">
                            <div class="card-body">
                              <h5 class="card-title">Credit notes sempre separados nos scans</h5>
                              <p class="card-text">Criado em: 06/04/2025</p>
                              <div class="d-flex">
                                <a href="#" class="btn btn-danger btn-lasts-cards">Editar</a>
                                <a href="#" class="btn btn-warning btn-lasts-cards">Excluir</a>
                              </div>
                            </div>
                        </div>
                        <div class="card py-3 text-white" style="width: 18rem;">
                            <div class="card-body">
                              <h5 class="card-title">Credit notes sempre separados nos scans</h5>
                              <p class="card-text">Criado em: 06/04/2025</p>
                              <div class="d-flex">
                                <a href="#" class="btn btn-danger btn-lasts-cards">Editar</a>
                                <a href="#" class="btn btn-warning btn-lasts-cards">Excluir</a>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>