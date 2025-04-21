<?php $this->layout('../layout/template', ['title'=>'Controle de Pastas']); ?>
        <div class="col py-4 px-5 text-white" style="background-color: #0D0D0D;">
            <div class="home-title-content container p-0">
                <h2 class="mb-4">Controle de Pastas</h2>
            </div>
            <div class="home-last-suppliers mb-4 container p-0">
            <table class="table">
                <div class="title pt-3 pb-3 px-2 d-flex justify-content-between align-items-center">
                    <a href="<?=APP_URL?>/controle-pastas/adicionar" class="btn btn-success">Adicionar Novo</a>
                    <form action="<?=APP_URL;?>/controle-pastas/pesquisar" method="get" class="form-navios-fornecidos-index">
                        <div class="form-group dfkdfk d-flex">
                            <input type="search" name="search" id="search" placeholder="Digite o número da invoice ou sigla...">
                            <button type="submit">
                                <img src="<?=APP_URL?>/public/assets/images/search-icon.png" alt="Pesquisar" width="25">
                            </button>
                        </div>
                    </form>
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
                        Invoice
                        <a href="#">
                            <img src="<?=APP_URL?>/public/assets/images/jogar-5.png" alt="Filtro">
                        </a>
                    </th>
                    <th>
                        Navio
                        <a href="#">
                            <img src="<?=APP_URL?>/public/assets/images/jogar-5.png" alt="Filtro">
                        </a>
                    </th>
                    <th>
                        Sigla
                        <a href="#">
                            <img src="<?=APP_URL?>/public/assets/images/jogar-5.png" alt="Filtro">
                        </a>
                    </th>
                    <th>
                        Cliente
                        <a href="#">
                            <img src="<?=APP_URL?>/public/assets/images/jogar-5.png" alt="Filtro">
                        </a>
                    </th>
                    <th>
                        Status da pasta
                        <a href="#">
                            <img src="<?=APP_URL?>/public/assets/images/jogar-5.png" alt="Filtro">
                        </a>
                    </th>
                    <th>Resp</th>
                    <th>Opções</th>
                    </tr>
                </thead>
                <tbody class="controle-tbody">
                    <?php if(isset($all_folders) && !empty($all_folders)): ?>
                    <?php foreach($all_folders as $folder): ?>
                    <tr>
                    <th style="font-size:14px;" scope="row" class="px-3"><?=$folder->id;?></th>
                    <td style="font-size:13px;"><?=$folder->invoice_number;?></td>
                    <td style="font-size:10px;" class="text-uppercase"><?=$folder->ship_name;?></td>
                    <td style="font-size:13px;"><?=$folder->ship_acronym;?></td>
                    <td style="font-size:11px;"><?=$folder->customer_name;?></td>
                    <td>
                    <?php
                    switch($folder->folder_status_id){
                        case 1:
                            echo '<p style="background-color:#7b54f0;" class="p-0 m-0 text-uppercase info-controle-pastas-btn">Aberta</p>';
                            break;
                        case 2:
                            echo '<p class="p-0 m-0 bg-primary text-uppercase info-controle-pastas-btn">Feita</p>';
                            break;
                        case 3:
                            echo '<p class="p-0 m-0 bg-danger text-uppercase info-controle-pastas-btn">Racine</p>';
                            break;
                        case 4:
                            echo '<p class="p-0 m-0 bg-info text-uppercase info-controle-pastas-btn">Assinada</p>';
                            break;
                        case 5:
                            echo '<p class="p-0 m-0 bg-warning text-uppercase info-controle-pastas-btn">Pendências</p>';
                            break;
                        case 6:
                            echo '<p class="p-0 m-0 bg-success text-uppercase info-controle-pastas-btn">Enviada P/ Cliente</p>';
                            break;
                        case 7:
                            echo '<p style="background-color:#1c8079;" class="p-0 px-1 m-0 text-uppercase info-controle-pastas-btn">Ag. Assinatura Master</p>';
                            break;
                    }
                    ?>
                    </td>
                    <td>
                        <?php if($folder->folder_responsible_name == 1): ?>
                            <p class="p-0 m-0 td-lucas px-2" style="background-color: #305ac2;">Lucas</p>
                        <?php elseif($folder->folder_responsible_name == 2): ?>
                            <p class="p-0 m-0 td-lucas px-2" style="background-color: #da8ced;">Tamires</p>
                        <?php else: ?>
                            <p class="p-0 m-0 td-lucas px-2" style="background-color:rgb(48, 48, 48);">Aguardando</p>
                        <?php endif; ?>
                    </td>
                    <td class="infos p-0">
                        <div class="d-flex py-1">
                            <a href="<?=APP_URL;?>/controle-pastas/exibir/<?=$folder->id;?>" class="btn btn-success" style="width: 50px; margin-right:10px !important;">Exibir</a>
                            <a href="<?=APP_URL;?>/controle-pastas/editar/<?=$folder->id;?>" class="btn btn-warning" style="width: 50px; margin-right:10px !important;">Editar</a>
                            <a href="<?=APP_URL;?>/controle-pastas/excluir/<?=$folder->id;?>" class="btn btn-danger" style="width: 60px; margin-right:10px !important;">Excluir</a>
                        </div>
                    </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
                </table>
                <?php if(!isset($all_folders) && empty($all_folders)): ?>
                    <p>Não existem pastas cadastradas...</p>
                <?php endif; ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination border-0">
                      <li class="page-item border-0">
                      <a class="page-link paginacao-item" aria-label="Previous" href="<?=APP_URL;?>/controle-pastas?page=<?= $page - 1 ?>">
                        <span aria-hidden="true">&laquo;</span>
                        </a>
                      </li> 
                      <li class="page-item">
                      <a class="page-link paginacao-item" aria-label="Next" href="<?=APP_URL;?>/controle-pastas?page=<?= $page + 1 ?>" style="margin-left:10px;">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    </html>