<?php
    require_once '../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo INCLUDE_PATH_ADMIN; ?>assets/css/login-style.css" rel="stylesheet">
    <title>Acesse sua conta | Code Universe</title>
</head>
<body>
    <?php
        // login verification
        $error = false;
        if(isset($_POST['register'])) {
            if($_POST['user'] == '' || $_POST['password'] == '') {
                $error = true;
                echo "<script>alert('Usuário ou senha incorretos')</script>";
            } else {
                $sql = $pdo->prepare("SELECT * FROM `tb_admin_users` WHERE user = ? OR email = ?");
                $sql->execute(array($_POST['user'], $_POST['user']));
                if($sql->rowCount() == 1) {
                    $info = $sql->fetch();
                    $hash = $info['password'];
                    if(password_verify($_POST['password'], $hash)) {
                        $_SESSION['myblog-login'] = true;
                        $_SESSION['myblog-user'] = $info['user'];
                        $_SESSION['myblog-email'] = $info['email'];
                        $_SESSION['myblog-password'] = $info['password'];
                        $_SESSION['myblog-name'] = $info['name'];
                        $_SESSION['myblog-profile-photo'] = $info['profile_photo'];
                        $_SESSION['myblog-role'] = $info['role'];
                        $_SESSION['myblog-role-name'] = Panel::getRole($info['role']);
                        header('Location: '.INCLUDE_PATH_ADMIN);
                        die();
                    } else {
                        $error = true;
                        echo "<script>alert('Usuário ou senha incorretos')</script>";
                    }
                } else {
                    $error = true;
                    echo "<script>alert('Usuário ou senha incorretos')</script>";
                }
            }
        }
    ?>

    <!-- include path --> 
    <input type="hidden" name="include_path" value="<?php echo INCLUDE_PATH; ?>" />

    <!-- login container -->
    <div class="register-container">
        <!--<?php //if($error) echo '<p class="form-message">Erro ao enviar o formulário</p>'; ?>-->
        <div class="register-box login">
            <div class="title">
                <h3>Entre</h3>
            </div>
            <form action="" method="post">
            <input type="text" name="user" class="inputuser" id="user" required />
                <label for="user" class="user">Usuário ou email</label>

                
                <input type="password" name="password" class="inputuser" id="password" required />
                <label for="password" class="password">Senha</label>

                <div class="remember">
                    <input type="checkbox" name="remember" id="remember" />
                    <label for="remember">Lembrar Senha</label>
                </div>
                <div class="change-register">Não tem uma conta? <a href="<?php echo INCLUDE_PATH_ADMIN; ?>signup">Cadastre-se</a></div>
                <input type="submit" name="register" value="Entrar" />
            </form>
        </div>
    </div>
</body>
</html>
