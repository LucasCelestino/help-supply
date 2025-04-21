<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=APP_URL?>/public/assets/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>HelpSupply - Gerenciamento de Fornecimentos - Login</title>
  </head>
  <body class="d-flex justify-content-center align-items-center">
    
    <div class="login-wrapper rounded py-3 px-4">
        <h1 class="text-center title text-white text-uppercase fw-bold">HelpSupply</h1>
        <p class="text-center subtitle text-white">Sistema para gerenciamento de fornecimentos</p>
        <form action="<?=APP_URL?>/login" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label text-white">Usuário</label>
                <input type="text" class="form-control py-2" name="username" id="username" aria-describedby="username" placeholder="Digite seu nome de usuário...">
            </div>
            <div class="mb-4">
                <label for="password" class="form-label text-white">Senha</label>
                <input type="password" class="form-control py-2" name="password" id="password" placeholder="Digite sua senha...">
            </div>
            <?php if(isset($_GET['empty_field']) && $_GET['empty_field'] == true): ?>
              <p class="text-danger p-0 my-3" style="font-size:12px;">Preencha todos os campos antes de prosseguir...</p>
            <?php endif; ?>
            <?php if(isset($_GET['incorret_password']) && $_GET['incorret_password'] == true): ?>
              <p class="text-danger p-0 my-3" style="font-size:12px;">As senhas não conferem, tente novamente...</p>
            <?php endif; ?>
            <button type="submit" class="btn btn-login w-100 text-white" name="action" style="background-color:rgb(15, 15, 15) !important;">Entrar</button>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>