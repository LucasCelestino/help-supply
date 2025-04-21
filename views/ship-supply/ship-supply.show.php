<?php $this->layout('../layout/template', ['title'=>$ship->ship_name." - ".$ship->acronym]); ?>
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
                            <a href="#submenu1" aria-disabled="true" data-bs-toggle="collapse" class="nav-link align-middle text-light disabled">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline text-secondary">UTILIDADES</span> </a>
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
            <div class="col py-4 px-5 text-white" style="background-color: #0D0D0D;">
                <div class="home-title-content container p-0">
                    <h2 class="mb-4">Navios Fornecidos</h2>
                </div>
                <div class="home-last-suppliers mb-4 container p-0">
                  <div class="form-add-fornecimento-wrapper px-4 py-3">
                    <div class="head d-flex align-items-center py-2 mb-2">
                        <img src="<?=APP_URL?>/public/assets/images/seta-direita-2.png" style="margin-right: 10px;">
                        <a href="<?=APP_URL;?>/navios-fornecidos" class="text-decoration-none text-white fw-bold" style="margin-right: 10px;">Voltar</a>
                        <p class="p-0 m-0" style="margin-right: 10px;"><?=$ship->ship_name?>  <?=$ship->acronym?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Nome do navio:</p>
                        <p class="my-0"><?=$ship->ship_name;?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Sigla:</p>
                        <p class="my-0"><?=$ship->acronym;?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Porto:</p>
                        <p class="my-0"><?=$ship->ship_harbor;?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Tipo de fornecimento:</p>
                        <p class="my-0"><?=$ship->ship_type_name;?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Data de fornecimento:</p>
                        <p class="my-0"><?=date('d/m/Y', strtotime($ship->supply_date));?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Responsável pelo navio:</p>
                        <p class="my-0"><?=$ship->ship_first_responsible;?> / <?=$ship->ship_second_responsible;?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Regime:</p>
                        <p class="my-0"><?=$ship->ship_regime;?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Status:</p>
                        <?php if($ship->status == 0): ?>
                            <p class="p-1 m-0 bg-success rounded">Recebido</p>
                        <?php else: ?>
                            <p class="p-1 m-0 bg-danger rounded">Aguardando</p>
                        <?php endif; ?>
                    </div>
                  </div>
                </div>
            </div>
        </div>