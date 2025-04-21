<?php $this->layout('../layout/template', ['title'=>'Lembretes']); ?>
            <div class="col py-4 px-5 text-white" style="background-color: #0D0D0D;">
                <div class="home-title-content container p-0">
                    <h2 class="mb-4">Lembretes</h2>
                </div>
                <div class="home-last-suppliers mb-4 container p-0">
                <table class="table">
                    <div class="title pt-3 pb-3 px-2 d-flex align-items-center">
                        <a href="<?=APP_URL;?>/lembretes/adicionar" class="btn btn-success">Adicionar Novo</a>
                        <a href="#" class="px-3 text-decoration-none text-white font-modify-mont" style="font-size: 13px;">Alterar Quais Lembretes Aparecem na Home</a>
                    </div>
                    <thead>
                      <tr>
                        <th>
                            No.
                            <a href="#">
                                <img src="<?=APP_URL?>/public/assets/images/jogar-5.png" alt="Filtro">
                            </a>
                        </th>
                        <th>
                            Lembrete
                            <a href="#">
                                <img src="<?=APP_URL?>/public/assets/images/jogar-5.png" alt="Filtro">
                            </a>
                        </th>
                        <th>
                            Adicionado em
                            <a href="#">
                                <img src="<?=APP_URL?>/public/assets/images/jogar-5.png" alt="Filtro">
                            </a>
                        </th>
                        <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody class="controle-tbody">
                        <?php if(isset($reminders) && !empty($reminders)): ?>
                        <?php foreach($reminders AS $reminder): ?>
                      <tr>
                        <th scope="row" class="px-3"><?=$reminder->id;?></th>
                        <td><?=$reminder->reminder;?></td>
                        <td><?=date('d/m/Y', strtotime($reminder->created_at));?></td>
                        <td class="infos p-0">
                            <div class="d-flex py-1">
                                <a href="<?=APP_URL;?>/lembretes/editar/<?=$reminder->id;?>" class="btn btn-warning" style="width: 80px; margin-right:10px !important;">Editar</a>
                                <a href="<?=APP_URL;?>/lembretes/excluir/<?=$reminder->id;?>" class="btn btn-danger" style="width: 80px; margin-right:10px !important;">Excluir</a>
                            </div>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                  <?php if(!isset($reminders) && empty($reminders)): ?>
                      <p>Não existem lembretes cadastrados no momento...</p>
                      <?php endif; ?>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination border-0">
                      <li class="page-item border-0">
                      <a class="page-link paginacao-item" aria-label="Previous" href="<?=APP_URL;?>/lembretes?page=<?= $page - 1 ?>">
                        <span aria-hidden="true">&laquo;</span>
                        </a>
                      </li> 
                      <li class="page-item">
                      <a class="page-link paginacao-item" aria-label="Next" href="<?=APP_URL;?>/lembretes?page=<?= $page + 1 ?>" style="margin-left:10px;">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
            </div>