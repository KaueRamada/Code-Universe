<?php
require_once '../config/config.php';
if (Panel::isLogged()) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo INCLUDE_PATH_ADMIN; ?>assets/css/header-main.css" rel="stylesheet"> <!-- css file -->
        <!-- <link href="<?php echo INCLUDE_PATH_ADMIN; ?>assets/css/style.css" rel="stylesheet"> -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <!-- jQuery API -->
        <script src="https://cdn.tiny.cloud/1/4lj4mvfi4znfzdptgzp5yjmk2o8iwz5eppug7ae1kmjtdqsv/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script> <!-- TinyMCE editor -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@2/dist/tinymce-jquery.min.js"></script> <!-- TinyMCE jQuery integration -->
        <link href="fontawesome/css/all.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/52201d9086.js" crossorigin="anonymous"></script>
        <!-- font awesome icons -->

        <title>Painel de Controle | Code Universe</title>
    </head>

    <body>
        <?php
        // logout
        if (isset($_GET['logout'])) {
            Panel::logout();
        }

        // get user id
        try {
            $sql = $pdo->prepare("SELECT * FROM `tb_admin_users` WHERE user = ?");
            $sql->execute(array($_SESSION['myblog-user']));
            $user = $sql->fetch();
        } catch (PDOException $e) {
            echo 'Erro ao selecionar id do usuário<br>' . $e->getMessage();
        }

        // user permissions
        $sql = $pdo->prepare("SELECT role")
            ?>

        <!-- include path -->
        <input type="hidden" name="include_path" value="<?php echo INCLUDE_PATH; ?>" />

        <!-- user id and role -->
        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>" />
        <input type="hidden" name="user_role" value="<?php echo $user['role']; ?>" />
        <header>
            <nav class="navbar">
                <h3>
                    <?php echo 'Olá, <span>' . $_SESSION['myblog-name'] . '</span>!'; ?>
                </h3>
                <ul class="nav-itens">
                    <div class="content-itens">
                        <li><a href="<?php echo INCLUDE_PATH_ADMIN; ?>">PAINEL</a></li>
                        <?php if ($_SESSION['myblog-role'] == 0) { ?>
                            <li dropdown="0"><a href="">CATEGORIAS</a>
                                <ul class="dropdown">
                                    <div>
                                        <a href="" index="0">Adicionar categoria</a>
                                    </div>
                                    <div>
                                        <a href="" index="1">Gerenciar categorias</a>
                                    </div>
                                </ul>
                            </li>
                            <li><a href="">POSTAGENS</a>
                                <ul class="dropdown">
                                    <div>
                                        <a href="" index="2">Adicionar postagem</a>
                                    </div>
                                    <div>
                                        <a href="" index="3">Gerenciar postagens</a>
                                    </div>
                                </ul>
                            </li>
                            <li><a href="">USUÁRIOS</a>
                                <ul class="dropdown">
                                    <div>
                                        <a href="" index="4">Adicionar usuário</a>
                                    </div>
                                    <div>
                                        <a href="" index="5">Gerenciar usuários</a>
                                    </div>
                                </ul>
                            </li>
                        <?php } else if ($_SESSION['myblog-role'] == 1) { ?>
                            li><a href="">POSTAGENS</a>
                                <ul class="dropdown">
                                    <div>
                                        <a href="" index="2">Adicionar postagem</a>
                                    </div>
                                    <div>
                                        <a href="" index="3">Gerenciar postagens</a>
                                    </div>
                            </li>
                        <?php } ?>
                    </div>
                    <li class="return"><a href="<?php echo INCLUDE_PATH; ?>">CODE UNIVERSE</a></li>
                    <li class="logout"><a href="?logout">SAIR</a></li>
                </ul>
            </nav>
        </header>
        <?php
} else {
    echo '<title>Erro na sessão</title>';
    echo '<p style="font-size: 18px;">Erro ao iniciar sessão. <a href="login">Entre</a> ou <a href="signup">cadastre-se</a></p>';
}
?>