<?php
    require_once '../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo INCLUDE_PATH_ADMIN; ?>assets/css/signup-style.css" rel="stylesheet">
    <title>Cadastre-se | Code Universe</title>
</head>
<body>
    <!-- include path --> 
    <input type="hidden" name="include_path" value="<?php echo INCLUDE_PATH; ?>" />

    <!-- signup container -->
    <div class="register-container">
        <div class="bg-right">
            <img src="assets/img/logo_sem_fundo.png">
            <div class="register-box signup">
            <p class="form-message"></p>
            <div class="title">
                <h3>Cadastre-se</h3>
            </div>
            <form action="" method="post" enctype="multipart/form-data" class="add">

            <input type="text" class="inputuser" name="name" id="name" required />
                    <label for="name" class="name">Nome</label>

                    <input type="text"  class="inputuser" name="user" id="user" required />
                    <label for="user" class="user">Usuário</label>

                    <input type="email" class="inputuser" name="email" id="email" required />
                    <label for="email" class="email">Email</label>

                    <input type="password" class="inputuser" name="password" id="password" required />
                    <label for="password" class="password">Senha</label>

                <div class="change-register">Já tem uma conta? <a href="<?php echo INCLUDE_PATH_ADMIN; ?>login">Entrar</a></div>

                <input type="hidden" name="signup" value="true" />
                <input type="hidden" name="form_name" value="user" />
                <input type="submit" name="register" value="Cadastrar" />
            </form>
        </div>
    </div>
    <div class="bg-left">
        <img src="assets\img\fundo_cadastro.png">
    </div>

    
    <script src="<?php echo INCLUDE_PATH; ?>assets/js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH_ADMIN; ?>assets/js/script.js"></script>
</body>
</html>
