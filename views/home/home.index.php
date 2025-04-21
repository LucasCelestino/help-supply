<?php $this->layout('../layout/template'); ?>
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
                            <td class="text-uppercase"><?=$lastSupply->ship_name;?></td>
                            <td><?=$lastSupply->acronym;?></td>
                            <td><?=$lastSupply->harbor;?></td>
                            <td><?=$lastSupply->ship_type_name;?></td>
                            <td><?=date('d/m/Y', strtotime($lastSupply->supply_date));?></td>
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
                <div class="home-last-cards container p-0 mt-5">
                    <div class="home-title-content">
                        <h2 class="mb-4">Últimos Lembretes Cadastrados</h2>
                    </div>
                    <div class="cards-wrapper d-flex justify-content-start">
                    <?php if(isset($last_reminders) && !empty($last_reminders)): ?>
                        <?php foreach($last_reminders as $lastReminder): ?>
                        <div class="card py-3 text-white" style="width: 18rem; margin-right:30px;">
                            <div class="card-body">
                              <h5 class="card-title"><?=$lastReminder->reminder;?></h5>
                              <p class="card-text">Criado em: <?=date('d/m/Y', strtotime($lastReminder->created_at));?></p>
                              <div class="d-flex">
                                <a href="#" class="btn btn-danger btn-lasts-cards">Editar</a>
                                <a href="#" class="btn btn-warning btn-lasts-cards">Excluir</a>
                              </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>    
                        <p style="font-size:15px;">Não existem lembretes cadastrados no momento...</p>
                    <?php endif; ?>
                    </div>
                </div>
            </div>