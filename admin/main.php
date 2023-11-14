<?php
    require_once '../config/config.php';

    // session verification
    if(Panel::isLogged()) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo INCLUDE_PATH_ADMIN; ?>assets/css/style.css" rel="stylesheet"> <!-- css file -->

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> <!-- jQuery API -->
    <script src="https://cdn.tiny.cloud/1/4lj4mvfi4znfzdptgzp5yjmk2o8iwz5eppug7ae1kmjtdqsv/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> <!-- TinyMCE editor -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@2/dist/tinymce-jquery.min.js"></script> <!-- TinyMCE jQuery integration -->
    <script src="https://kit.fontawesome.com/52201d9086.js" crossorigin="anonymous"></script> <!-- font awesome icons -->

    <title>Painel de Controle | My Blog</title>
</head>
<body>
    <?php
        // logout
        if(isset($_GET['logout'])) {
            Panel::logout();
        }

        // get user id
        try {
            $sql = $pdo->prepare("SELECT * FROM `tb_admin_users` WHERE user = ?");
            $sql->execute(array($_SESSION['myblog-user']));
            $user = $sql->fetch();
        } catch(PDOException $e) {
            echo 'Erro ao selecionar id do usuário<br>'.$e->getMessage();
        }

        // user permissions
        $sql = $pdo->prepare("SELECT role")
    ?>

    <!-- include path -->
    <input type="hidden" name="include_path" value="<?php echo INCLUDE_PATH; ?>" />

    <!-- user id and role -->
    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>" />
    <input type="hidden" name="user_role" value="<?php echo $user['role']; ?>" />
 
    <!-- admin panel container -->
    <div class="panel-container">
        <header>
            <h3><?php echo 'Olá, <span>'.$_SESSION['myblog-name'].'</span>!'; ?></h3>
            <div class="menu">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH_ADMIN; ?>">Painel</a></li>
                <?php if($_SESSION['myblog-role'] == 0) { ?>
                    <li class="action" dropdown="0">
                        <a href="">Categorias</a>
                        <span></span>
                        <ul class="dropdown">
                            <li><a href="" index="0">Adicionar categoria</a></li>
                            <li><a href="" index="1">Gerenciar categorias</a></li>
                        </ul>
                    </li>
                    <li class="action" dropdown="1">
                        <a href="">Postagens</a>
                        <span></span>
                        <ul class="dropdown">
                            <li><a href="" index="2">Adicionar postagem</a></li>
                            <li><a href="" index="3">Gerenciar postagens</a></li>
                        </ul>
                    </li>
                    <li class="action" dropdown="2">
                        <a href="">Usuários</a>
                        <span></span>
                        <ul class="dropdown">
                            <li><a href="" index="4">Adicionar usuário</a></li>
                            <li><a href="" index="5">Gerenciar usuários</a></li>
                        </ul>
                    </li>
                <?php } else if($_SESSION['myblog-role'] == 1) { ?>
                    <li class="action" dropdown="0">
                        <a href="">Postagens</a>
                        <span></span>
                        <ul class="dropdown">
                            <li><a href="" index="2">Adicionar postagem</a></li>
                            <li><a href="" index="3">Gerenciar postagens</a></li>
                        </ul>
                    </li>
                <?php } ?>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Blog</a></li>
                    <li><a href="?logout">Sair</a></li>
                </ul>
            </div>
        </header>

        <div class="main">
            <div class="window dashboard">
                <div class="profile-info">
                    <?php
                        echo $_SESSION['myblog-user'].'<br>'.$_SESSION['myblog-email'].'<br>'.$_SESSION['myblog-name'].'<br>'.$_SESSION['myblog-role-name'];
                    ?>
                    <div class="profile-photo">
                        <img src="<?php echo INCLUDE_PATH_ADMIN.$_SESSION['myblog-profile-photo']; ?>" alt="Foto de perfil" />
                    </div>

                </div>
            </div>

            <div class="window action-window">
                <div class="title"></div>
                <form action="" method="post" enctype="multipart/form-data"></form>
                <div class="actions"></div>
                <table></table>
            </div>
        </div>
    </div>
    
    <script src="<?php echo INCLUDE_PATH_ADMIN; ?>assets/js/script.js"></script> <!-- main javascript file --> 
</body>
</html>

<?php
    } else {
        echo '<title>Erro na sessão</title>';
        echo '<p style="font-size: 18px;">Erro ao iniciar sessão. <a href="login">Entre</a> ou <a href="signup">cadastre-se</a></p>';
    }    
?>
