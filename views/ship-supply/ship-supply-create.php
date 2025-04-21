<?php $this->layout('../layout/template', ['title'=>'Adicionar novo fornecimento']); ?>
            <div class="col py-4 px-5 text-white" style="background-color: #0D0D0D;">
                <div class="home-title-content container p-0">
                    <h2 class="mb-4">Navios Fornecidos</h2>
                </div>
                <div class="home-last-suppliers mb-4 container p-0">
                  <div class="form-add-fornecimento-wrapper px-4 py-3">
                    <div class="head d-flex align-items-center py-2 mb-2">
                        <img src="<?=APP_URL?>/public/assets/images/seta-direita-2.png" style="margin-right: 10px;">
                        <a href="<?=APP_URL?>/navios-fornecidos" class="text-decoration-none text-white fw-bold" style="margin-right: 10px;">Voltar</a>
                        <p class="p-0 m-0" style="margin-right: 10px;">Adicionar Novo Fornecimento</p>
                    </div>
                    <?php if($empty_field): ?>
                        <p class="text-danger p-0 my-3" style="font-size:15px;">Preencha todos os campos antes de adicionar um fornecimento.</p>
                    <?php endif; ?>
                    <form action="<?=APP_URL?>/navios-fornecidos/adicionar" method="post">
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="ship-name" class="mb-2">Nome do navio:</label>
                            <input type="text" name="ship-name" id="ship-name" class="text-white px-1 py-1 rounded">
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="ship-acronym" class="mb-2">Sigla:</label>
                            <input type="text" name="ship-acronym" id="ship-acronym" class="text-white px-1 py-1 rounded">
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="ship-harbor" class="mb-2">Porto:</label>
                            <select name="ship-harbor" id="ship-harbor" class="form-select rounded text-white">
                            <option selected value="0">Selecione o porto de fornecimento</option>
                                <?php foreach($ship_harbor AS $harbor): ?>
                                    <option value="<?=$harbor->id;?>"><?=$harbor->name;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="ship-type" class="mb-2">Tipo de fornecimento:</label>
                            <select name="ship-type" id="ship-type" class="form-select rounded text-white">
                                <option selected value="0">Selecione o tipo do fornecimento</option>
                                <?php foreach($ship_type AS $type): ?>
                                    <option value="<?=$type->id;?>"><?=$type->name;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="supply-date" class="mb-2">Data do fornecimento:</label>
                            <input type="date" name="supply-date" id="supply-date" class="text-white px-1 py-1 rounded">
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="ship-responsible" class="mb-2">Responsável pelo navio:</label>
                            <select name="ship-responsible" id="ship-responsible" class="form-select rounded text-white">
                                <option selected value="0">Selecione o responsável pelo navio</option>
                                <?php foreach($ship_responsible AS $responsible): ?>
                                    <option value="<?=$responsible->id;?>"><?=$responsible->name;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="ship-second-responsible" class="mb-2">Segundo responsável pelo navio:</label>
                            <select name="ship-second-responsible" id="ship-second-responsible" class="form-select rounded text-white">
                                <option selected value="0">Selecione o segundo responsável pelo navio</option>
                                <option selected value="-">-</option>
                                <?php foreach($ship_second_responsible AS $secondResponsible): ?>
                                    <option value="<?=$secondResponsible->id;?>"><?=$secondResponsible->name;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="ship-regime" class="mb-2">Tipo de regime:</label>
                            <select name="ship-regime" id="ship-regime" class="form-select rounded text-white">
                            <option selected value="0">Selecione o regime do navio</option>
                                <?php foreach($ship_regime AS $regime): ?>
                                    <option value="<?=$regime->id;?>"><?=$regime->name;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="ship-status" class="mb-2">Status:</label>
                            <select name="ship-status" id="ship-status" class="form-select rounded text-white">
                                <option selected value="2">Selecione o status do fornecimento</option>
                                <option value="0">Recebido</option>
                                <option value="1">Aguardando</option>
                            </select>
                        </div>
                        <div class="d-flex align-items-center">
                        <button type="submit" class="btn btn-success" style="width: 150px; margin-right:20px;">Adicionar</button>
                        </div>
                    </form>
                  </div>
                </div>
            </div>