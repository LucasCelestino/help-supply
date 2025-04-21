<?php $this->layout('../layout/template', ['title'=>'Perfil']); ?>
            <div class="col py-4 px-5 text-white" style="background-color: #0D0D0D;">
                <div class="home-title-content container p-0">
                    <h2 class="mb-4">Perfil</h2>
                </div>
                <div class="home-last-suppliers mb-4 container p-0">
                  <div class="form-add-fornecimento-wrapper px-4 py-3">
                    <div class="head d-flex align-items-center py-2 mb-2">
                        <img src="<?=APP_URL?>/public/assets/images/seta-direita-2.png" style="margin-right: 10px;">
                        <a href="#" class="text-decoration-none text-white fw-bold" style="margin-right: 10px;">Voltar</a>
                    </div>
                    <?php if($incorrect_field): ?>
                        <p class="text-danger p-0 my-3" style="font-size:15px;">As senhas não conferem, verifique e tente novamente.</p>
                    <?php endif; ?>
                    <?php if($empty_field): ?>
                        <p class="text-danger p-0 my-3" style="font-size:15px;">Preencha todos os campos antes de editar o seu usuário.</p>
                    <?php endif; ?>
                    <?php if(isset($_GET['success']) && !empty($_GET['success'])): ?>
                        <p class="text-success p-0 my-3" style="font-size:15px;">Usuário atualizado com sucesso!</p>
                    <?php endif; ?>
                    <form action="<?=APP_URL?>/perfil/editar" method="post">
                        <!-- <div class="form-group d-flex flex-column mb-4">
                            <label for="perfil-photo" class="mb-2">Foto de perfil:</label>
                            <input type="file" name="perfil-photo" id="perfil-photo" class="text-white px-1 py-1 rounded">
                        </div> -->
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="user_name" class="mb-2">Nome:</label>
                            <input type="text" name="user_name" id="user_name" class="text-white px-1 py-1 rounded">
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="user_login" class="mb-2">Login:</label>
                            <input type="text" name="user_login" id="user_login" class="text-white px-1 py-1 rounded">
                            <div id="emailHelp" class="form-text">
                                <p class="p-0 m-0" style="font-size:12px !important; color:#858585;">Login que você usa para entrar no sistema.</p>
                            </div>
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="user_new_password" class="mb-2">Senha:</label>
                            <input type="password" name="user_new_password" id="user_new_password" class="text-white px-1 py-1 rounded" placeholder="Digite uma nova senha, caso queira trocar a sua senha atual...">
                            <div id="emailHelp" class="form-text">
                                <p class="p-0 m-0" style="font-size:12px !important; color:#858585;">Senha que você usa usa para entrar no sistema.</p>
                            </div>
                        </div>
                        <div class="form-group d-flex flex-column mb-4">
                            <label for="user_new_password_confirmed" class="mb-2">Confirmar Senha:</label>
                            <input type="password" name="user_new_password_confirmed" id="user_new_password_confirmed" class="text-white px-1 py-1 rounded" placeholder="Confirme sua senha...">
                        </div>
                        <input type="hidden" name="user_id" value="<?=$user->id;?>">
                        <button type="submit" class="btn btn-success" style="width: 150px;">Salvar</button>
                    </form>
                  </div>
                </div>
            </div>