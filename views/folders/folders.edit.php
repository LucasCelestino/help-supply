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
                        <p class="p-0 m-0" style="margin-right: 10px;">Editar Pasta</p>
                    </div>
                    <form action="<?=APP_URL?>/controle-pastas/editar" method="post">
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="invoice_number" class="mb-2">Invoice:</label>
                            <input type="text" name="invoice_number" id="invoice_number" class="text-white px-1 py-1 rounded" value="<?=$folder->invoice_number;?>">
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="ship_name" class="mb-2">Navio:</label>
                            <input type="text" name="ship_name" id="ship_name" class="text-white px-1 py-1 rounded" value="<?=$folder->ship_name;?>">
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="acronym" class="mb-2">Sigla:</label>
                            <input type="text" name="acronym" id="acronym" class="text-white px-1 py-1 rounded" value="<?=$folder->ship_acronym;?>">
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="customer" class="mb-2">Cliente:</label>
                            <select name="customer" id="customer" class="form-select rounded text-white">
                                <option>Selecione o cliente</option>
                                <?php foreach($customers AS $customer): ?>
                                    <option <?=$folder->customer_name == $customer->name ? 'selected' : ''?> value="<?=$customer->id;?>"><?=$customer->name;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="supply_date" class="mb-2">Data do fornecimento:</label>
                            <input type="date" name="supply_date" id="supply_date" class="text-white px-1 py-1 rounded" value="<?=$folder->supply_date;?>">
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="receipt_date" class="mb-2">Data do recebimento:</label>
                            <input type="date" name="receipt_date" id="receipt_date" class="text-white px-1 py-1 rounded" value="<?=$folder->receipt_date;?>">
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="folder_status" class="mb-2">Status da pasta:</label>
                            <select name="folder_status" id="folder_status" class="form-select rounded text-white">
                                <option>Selecione o status da pasta</option>
                                <?php foreach($folder_status AS $status): ?>
                                    <option <?=$folder->folder_status_name == $status->name ? 'selected' : ''?> value="<?=$status->id;?>"><?=$status->name;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="pending_reason" class="mb-2">Motivo da pendência (caso exista):</label>
                            <input type="text" name="pending_reason" id="pending_reason" class="text-white px-1 py-1 rounded" value="<?=$folder->pending_reason;?>">
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="folder_responsible" class="mb-2">Responsável pela pasta:</label>
                            <select name="folder_responsible" id="folder_responsible" class="form-select rounded text-white">
                                <option>Selecione o responsável pela pasta</option>
                                <?php if($folder->folder_responsible_name == 1): ?>
                                    <option selected value="1">Lucas</option>
                                    <option value="2">Tamires</option>
                                    <option value="3">Aguardando</option>
                                <?php elseif($folder->folder_responsible_name == 2): ?>                                                  
                                    <option selected value="2">Tamires</option>
                                    <option value="1">Lucas</option>
                                    <option value="3">Aguardando</option>
                                <?php else: ?>
                                    <option selected value="3">Aguardando</option>
                                    <option value="1">Lucas</option>
                                    <option value="2">Tamires</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <input type="hidden" name="folder_id" value="<?=$folder->id;?>">
                        <button type="submit" class="btn btn-success" style="width: 150px;">Editar</button>
                    </form>
                  </div>
                </div>
            </div>