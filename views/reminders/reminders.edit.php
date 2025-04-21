<?php $this->layout('../layout/template', ['title'=>'Adicionar Novo Lembrete']); ?>
<div class="col py-4 px-5 text-white" style="background-color: #0D0D0D;">
    <div class="home-title-content container p-0">
        <h2 class="mb-4">Lembretes</h2>
    </div>
    <div class="home-last-suppliers mb-4 container p-0">
        <div class="form-add-fornecimento-wrapper px-4 py-3">
        <div class="head d-flex align-items-center py-2 mb-2">
            <img src="<?=APP_URL;?>/public/assets/images/seta-direita-2.png" style="margin-right: 10px;">
            <a href="#" class="text-decoration-none text-white fw-bold" style="margin-right: 10px;">Voltar</a>
            <p class="p-0 m-0" style="margin-right: 10px;">Adicionar Novo Lembrete</p>
        </div>
        <?php if($empty_field): ?>
            <p class="text-danger p-0 my-3" style="font-size:15px;">Preencha todos os campos antes de adicionar um lembrete.</p>
        <?php endif; ?>
        <form action="<?=APP_URL;?>/lembretes/editar" method="post">
            <div class="form-group d-flex flex-column mb-4">
                <label for="reminder" class="mb-2">Lembrete:</label>
                <input type="text" name="reminder" id="reminder" class="text-white px-1 py-1 rounded" value="<?=$reminder->reminder;?>">
            </div>
            <input type="hidden" name="reminder_id" value="<?=$reminder->id;?>">
            <button type="submit" class="btn btn-success" style="width: 150px;">Editar</button>
        </form>
        </div>
    </div>
</div></h1>