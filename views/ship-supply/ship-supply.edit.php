<?php $this->layout('../layout/template', ['title'=>'Editar fornecimento']); ?>
            <div class="col py-4 px-5 text-white" style="background-color: #0D0D0D;">
                <div class="home-title-content container p-0">
                    <h2 class="mb-4">Navios Fornecidos</h2>
                </div>
                <div class="home-last-suppliers mb-4 container p-0">
                  <div class="form-add-fornecimento-wrapper px-4 py-3">
                    <div class="head d-flex align-items-center py-2 mb-2">
                        <img src="<?=APP_URL?>/public/assets/images/seta-direita-2.png" style="margin-right: 10px;">
                        <a href="<?=APP_URL?>/navios-fornecidos" class="text-decoration-none text-white fw-bold" style="margin-right: 10px;">Voltar</a>
                        <p class="p-0 m-0" style="margin-right: 10px;">Editar Fornecimento</p>
                    </div>
                    <form action="<?=APP_URL?>/navios-fornecidos/editar" method="post">
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="ship_name" class="mb-2">Nome do navio:</label>
                            <input type="text" name="ship_name" id="ship_name" class="text-white px-1 py-1 rounded" value="<?=$ship->ship_name;?>">
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="ship_acronym" class="mb-2">Sigla:</label>
                            <input type="text" name="ship_acronym" id="ship_acronym" class="text-white px-1 py-1 rounded" value="<?=$ship->acronym;?>">
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="ship_harbor" class="mb-2">Porto:</label>
                            <select name="ship_harbor" id="ship_harbor" class="form-select rounded text-white">
                                <option>Selecione o porto de fornecimento</option>
                                <?php foreach($ship_harbor AS $harbor): ?>
                                    <option <?=$ship->ship_harbor == $harbor->name ? 'selected' : ''?> value="<?=$harbor->id;?>"><?=$harbor->name;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="ship_type" class="mb-2">Tipo de fornecimento:</label>
                            <select name="ship_type" id="ship_type" class="form-select rounded text-white">
                            <option>Selecione o tipo do fornecimento</option>
                                <?php foreach($ship_type AS $type): ?>
                                    <option <?=$ship->ship_type_name == $type->name ? 'selected' : ''?> value="<?=$type->id;?>"><?=$type->name;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="ship_supply" class="mb-2">Data do fornecimento:</label>
                            <input type="date" name="ship_supply" id="ship_supply" class="text-white px-1 py-1 rounded" value="<?=$ship->supply_date;?>">
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="ship_responsible" class="mb-2">Responsável pelo navio:</label>
                            <select name="ship_responsible" id="ship_responsible" class="form-select rounded text-white">
                                <option>Selecione o responsável pelo navio</option>
                                <?php foreach($ship_responsible AS $responsible): ?>
                                    <option <?=$ship->ship_first_responsible == $responsible->name ? 'selected' : ''?> value="<?=$responsible->id;?>"><?=$responsible->name;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="ship_second_responsible" class="mb-2">Segundo responsável pelo navio:</label>
                            <select name="ship_second_responsible" id="ship_second_responsible" class="form-select rounded text-white">
                                <option>Selecione o segundo responsável pelo navio</option>
                                <option value="-">-</option>
                                <?php foreach($ship_second_responsible AS $second_responsible): ?>
                                    <option <?=$ship->ship_second_responsible == $second_responsible->name ? 'selected' : ''?> value="<?=$second_responsible->id;?>"><?=$second_responsible->name;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="ship_regime" class="mb-2">Tipo de regime:</label>
                            <select name="ship_regime" id="ship_regime" class="form-select rounded text-white">
                                <option>Selecione o regime do navio</option>
                                <?php foreach($ship_regime AS $regime): ?>
                                    <option <?=$ship->ship_regime == $regime->name ? 'selected' : ''?> value="<?=$regime->id;?>"><?=$regime->name;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="ship_status" class="mb-2">Status:</label>
                            <select name="ship_status" id="ship_status" class="form-select rounded text-white">
                                <option>Selecione o status do fornecimento</option>
                                <?php if($ship->status == 0): ?>
                                    <option selected value="0">Recebido</option>
                                    <option value="1">Aguardando</option>
                                <?php else: ?>                                                  
                                    <option selected value="1">Aguardando</option>
                                    <option value="0">Recebido</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <input type="hidden" name="ship_id" value="<?=$ship->id;?>">
                        <button type="submit" class="btn btn-success" style="width: 150px;">Editar</button>
                    </form>
                  </div>
                </div>
            </div>