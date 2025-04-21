<?php $this->layout('../layout/template', ['title'=>$folder->ship_name." - ".$folder->ship_acronym]); ?>
            <div class="col py-4 px-5 text-white" style="background-color: #0D0D0D;">
                <div class="home-title-content container p-0">
                    <h2 class="mb-4">Controle de Pastas</h2>
                </div>
                <div class="home-last-suppliers mb-4 container p-0">
                  <div class="form-add-fornecimento-wrapper px-4 py-3">
                    <div class="head d-flex align-items-center py-2 mb-2">
                        <img src="<?=APP_URL?>/public/assets/images/seta-direita-2.png" style="margin-right: 10px;">
                        <a href="<?=APP_URL?>/controle-pastas" class="text-decoration-none text-white fw-bold" style="margin-right: 10px;">Voltar</a>
                        <p class="p-0 m-0" style="margin-right: 10px;"><?=$folder->invoice_number;?> - <?=$folder->ship_name;?> - <?=$folder->ship_acronym;?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Invoice:</p>
                        <p class="my-0"><?=$folder->invoice_number;?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Navio:</p>
                        <p class="my-0"><?=$folder->ship_name;?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Sigla:</p>
                        <p class="my-0"><?=$folder->ship_acronym;?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Cliente:</p>
                        <p class="my-0"><?=$folder->customer_name;?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Data de fornecimento:</p>
                        <p class="my-0"><?=date('d/m/Y', strtotime($folder->supply_date));?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Data de recebimento:</p>
                        <p class="my-0"><?=date('d/m/Y', strtotime($folder->receipt_date));?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Responsável pela pasta:</p>
                        <td>
                            <?php if($folder->folder_responsible_name == 1): ?>
                                <p class="p-1 m-0 td-lucas px-2 rounded" style="background-color: #305ac2;">Lucas</p>
                            <?php else: ?>
                                <p class="p-1 m-0 td-lucas px-2 rounded" style="background-color: #da8ced;">Tamires</p>
                            <?php endif; ?>
                        </td>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Motivo da pendência:</p>
                        <p class="my-0"><?=$folder->pending_reason;?></p>
                    </div>
                    <div class="info-wrapper d-flex align-items-center py-2 mb-4">
                        <p class="px-2 my-0 fw-bold">Status da pasta:</p>
                        <?php
                        switch($folder->folder_status_id){
                            case 1:
                                echo '<p style="background-color:#7b54f0;" class="p-2 m-0 text-uppercase info-controle-pastas-btn rounded">Aberta</p>';
                                break;
                            case 2:
                                echo '<p class="p-2 m-0 bg-primary text-uppercase info-controle-pastas-btn rounded">Feita</p>';
                                break;
                            case 3:
                                echo '<p class="p-2 m-0 bg-danger text-uppercase info-controle-pastas-btn rounded">Racine</p>';
                                break;
                            case 4:
                                echo '<p class="p-2 m-0 bg-info text-uppercase info-controle-pastas-btn rounded">Assinada</p>';
                                break;
                            case 5:
                                echo '<p class="p-2 m-0 bg-warning text-uppercase info-controle-pastas-btn rounded">Pendências</p>';
                                break;
                            case 6:
                                echo '<p class="p-2 m-0 bg-success text-uppercase info-controle-pastas-btn rounded">Enviada P/ Cliente</p>';
                                break;
                            case 7:
                                echo '<p style="background-color:#1c8079;" class="p-2 px-1 m-0 text-uppercase info-controle-pastas-btn rounded">Ag. Assinatura Master</p>';
                                break;
                        }
                        ?>
                    </div>
                  </div>
                </div>
            </div>