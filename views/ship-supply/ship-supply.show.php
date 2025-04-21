<?php $this->layout('../layout/template', ['title'=>$ship->ship_name." - ".$ship->acronym]); ?>
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