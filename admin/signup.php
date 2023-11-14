<?php
    require_once '../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo INCLUDE_PATH_ADMIN; ?>assets/css/style.css" rel="stylesheet">
    <title>Cadastre-se | My Blog</title>
</head>
<body>
    <!-- include path --> 
    <input type="hidden" name="include_path" value="<?php echo INCLUDE_PATH; ?>" />

    <!-- signup container -->
    <div class="register-container">
        <div class="register-box signup">
            <p class="form-message"></p>
            <div class="title">
                <h3>Cadastre-se</h3>
            </div>
            <form action="" method="post" enctype="multipart/form-data" class="add">
                <label for="user">Usuário</label>
                <input type="text" name="user" id="user" autofocus required />

                <label for="email">Email</label>
                <input type="email" name="email" id="email" required />

                <label for="password">Senha</label>
                <input type="password" name="password" id="password" required />

                <label for="name">Nome</label>
                <input type="text" name="name" id="name" required />

                <div class="change-register">Já tem uma conta? <a href="<?php echo INCLUDE_PATH_ADMIN; ?>login">Entre</a></div>

                <input type="hidden" name="signup" value="true" />
                <input type="hidden" name="form_name" value="user" />
                <input type="submit" name="register" value="Login" />
            </form>
        </div>
    </div>

    
    <script src="<?php echo INCLUDE_PATH; ?>assets/js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH_ADMIN; ?>assets/js/script.js"></script>
</body>
</html>
