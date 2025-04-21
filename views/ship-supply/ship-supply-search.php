<?php $this->layout('../layout/template', ['title'=>'Resultados da pesquisa']); ?>
            <div class="col py-4 px-5 text-white" style="background-color: #0D0D0D;">
                <div class="home-title-content container p-0">
                    <h2 class="mb-4">Navios Fornecidos</h2>
                </div>
                <div class="home-last-suppliers mb-4 container p-0">
                <table class="table">
                    <div class="title pt-3 pb-3 px-2 d-flex justify-content-between align-items-center">
                        <a href="<?=APP_URL;?>/navios-fornecidos/adicionar" class="btn btn-success">Adicionar Novo</a>
                        <form action="<?=APP_URL;?>/navios-fornecidos/pesquisar" method="get" class="form-navios-fornecidos-index">
                            <div class="form-group dfkdfk d-flex">
                                <input type="search" name="search" id="search" placeholder="Digite o nome do navio ou sigla...">
                                <button type="submit">
                                    <img src="<?=APP_URL;?>/public/assets/images/search-icon.png" alt="Pesquisar" width="25">
                                </button>
                            </div>
                        </form>
                    </div>
                    <thead>
                      <tr>
                        <th>
                            No.
                            <a href="#">
                                <img src="<?=APP_URL;?>/public/assets/images/jogar-5.png" alt="Filtro">
                            </a>
                        </th>
                        <th>
                            Navio
                            <a href="#">
                                <img src="<?=APP_URL;?>/public/assets/images/jogar-5.png" alt="Filtro">
                            </a>
                        </th>
                        <th>Sigla</th>
                        <th>
                            Porto
                            <a href="#">
                                <img src="<?=APP_URL;?>/public/assets/images/jogar-5.png" alt="Filtro">
                            </a>
                        </th>
                        <th>Tipo</th>
                        <th>
                            Data de Fornecimento
                            <a href="#">
                                <img src="<?=APP_URL;?>/public/assets/images/jogar-5.png" alt="Filtro">
                            </a>
                        </th>
                        <th>
                            Status
                            <a href="#">
                                <img src="<?=APP_URL;?>/public/assets/images/jogar-5.png" alt="Filtro">
                            </a>
                        </th>
                        <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($last_supplies) && !empty($last_supplies)): ?>
                        <tbody>
                          <?php foreach($last_supplies as $lastSupply): ?>
                          <tr>
                            <th scope="row" class="px-3"><?=$lastSupply->id;?></th>
                            <td><?=$lastSupply->name;?></td>
                            <td><?=$lastSupply->acronym;?></td>
                            <td><?=$lastSupply->ship_harbor;?></td>
                            <td><?=$lastSupply->ship_type_name;?></td>
                            <td style="width:230px !important;"><?=date('d/m/Y', strtotime($lastSupply->supply_date));?></td>
                            <td class="infos">
                                <?php if($lastSupply->status == 0): ?>
                                    <p class="p-0 m-0 bg-success">Recebido</p>
                                <?php else: ?>
                                    <p class="p-0 m-0 bg-danger">Aguardando</p>
                                <?php endif; ?>
                            </td>
                            <td class="infos p-0">
                                <div class="d-flex py-1">
                                    <a href="<?=APP_URL;?>/exibir/<?=$lastSupply->id;?>" class="btn btn-success" style="width: 80px; margin-right:10px !important;">Exibir</a>
                                    <a href="<?=APP_URL;?>/editar/<?=$lastSupply->id;?>" class="btn btn-warning" style="width: 80px; margin-right:10px !important;">Editar</a>
                                    <a href="<?=APP_URL;?>/excluir/<?=$lastSupply->id;?>" class="btn btn-danger" style="width: 80px; margin-right:10px !important;">Excluir</a>
                                </div>
                            </td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                        <?php endif; ?>
                      </table>
                      <?php if(!isset($last_supplies) && empty($last_supplies)): ?>
                      <p>Não existem navios fornecidos no momento...</p>
                      <?php endif; ?>
                    </tbody>
                  </table>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination border-0">
                      <li class="page-item border-0">
                      <a class="page-link paginacao-item" aria-label="Previous" href="<?=APP_URL;?>/navios-fornecidos?page=<?= $page - 1 ?>">
                        <span aria-hidden="true">&laquo;</span>
                        </a>
                      </li> 
                      <li class="page-item">
                      <a class="page-link paginacao-item" aria-label="Next" href="<?=APP_URL;?>/navios-fornecidos?page=<?= $page + 1 ?>" style="margin-left:10px;">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
            </div>