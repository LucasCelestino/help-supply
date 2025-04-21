<?php $this->layout('../layout/template', ['title'=>'Adicionar Nova Pasta']); ?>
            <div class="col py-4 px-5 text-white" style="background-color: #0D0D0D;">
                <div class="home-title-content container p-0">
                    <h2 class="mb-4">Controle de Pastas</h2>
                </div>
                <div class="home-last-suppliers mb-4 container p-0">
                  <div class="form-add-fornecimento-wrapper px-4 py-3">
                    <div class="head d-flex align-items-center py-2 mb-2">
                        <img src="<?=APP_URL?>/public/assets/images/seta-direita-2.png" style="margin-right: 10px;">
                        <a href="<?=APP_URL?>/controle-pastas" class="text-decoration-none text-white fw-bold" style="margin-right: 10px;">Voltar</a>
                        <p class="p-0 m-0" style="margin-right: 10px;">Adicionar Nova Pasta</p>
                    </div>
                    <?php if($empty_field): ?>
                        <p class="text-danger p-0 my-3" style="font-size:15px;">Preencha todos os campos antes de adicionar uma pasta.</p>
                    <?php endif; ?>
                    <form action="<?=APP_URL?>/controle-pastas/adicionar" method="post">
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="invoice_number" class="mb-2">Invoice:</label>
                            <input type="text" name="invoice_number" id="invoice_number" class="text-white px-1 py-1 rounded">
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="ship_name" class="mb-2">Navio:</label>
                            <input type="text" name="ship_name" id="ship_name" class="text-white px-1 py-1 rounded">
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="acronym" class="mb-2">Sigla:</label>
                            <input type="text" name="acronym" id="acronym" class="text-white px-1 py-1 rounded">
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="customer" class="mb-2">Cliente:</label>
                            <select name="customer" id="customer" class="form-select rounded text-white">
                                <option selected>Selecione o cliente</option>
                                <?php foreach($customers as $customer): ?>
                                    <option value="<?=$customer->id?>"><?=$customer->name;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="supply_date" class="mb-2">Data do fornecimento:</label>
                            <input type="date" name="supply_date" id="supply_date" class="text-white px-1 py-1 rounded">
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="receipt_date" class="mb-2">Data do recebimento:</label>
                            <input type="date" name="receipt_date" id="receipt_date" class="text-white px-1 py-1 rounded">
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="folder_status" class="mb-2">Status da pasta:</label>
                            <select name="folder_status" id="folder_status" class="form-select rounded text-white">
                                <option selected>Selecione o status da pasta</option>
                                <?php foreach($folder_status as $status): ?>
                                    <option value="<?=$status->id?>"><?=$status->name;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="pending_reason" class="mb-2">Motivo da pendência (caso exista):</label>
                            <input type="text" name="pending_reason" id="pending_reason" class="text-white px-1 py-1 rounded">
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="folder_responsible" class="mb-2">Responsável pela pasta:</label>
                            <select name="folder_responsible" id="folder_responsible" class="form-select rounded text-white">
                                <option selected>Selecione o responsável pela pasta</option>
                                <option value="1">Lucas</option>
                                <option value="2">Tamires</option>
                                <option value="3">Aguardando</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success" style="width: 150px;">Adicionar</button>
                    </form>
                  </div>
                </div>
            </div>