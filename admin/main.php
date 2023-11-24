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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- chart.js -->
    
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
    ?>

    <!-- include path -->
    <input type="hidden" name="include_path" value="<?php echo INCLUDE_PATH; ?>" />

    <!-- user id and role -->
    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>" />
    <input type="hidden" name="user_role" value="<?php echo $user['role']; ?>" />

    <!-- background -->
    <div class="background"></div>

    <!-- header links verification by user role -->
    <?php
        $display = 'none';
        if($_SESSION['myblog-role'] == 0) {
            $display = 'flex';
        }
    ?>

    <!-- admin panel container -->
    <div class="panel-container">
        <header>
            <h3><?php echo 'Olá, <span>'.$_SESSION['myblog-name'].'</span>!'; ?></h3>
            <div class="menu">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH_ADMIN; ?>">Painel</a></li>
                    <li style="display:<?php echo $display; ?>;" class="action" dropdown="0">
                        <a href="">Categorias</a>
                        <span></span>
                        <ul class="dropdown">
                            <li><a href="" index="0">Adicionar categoria</a></li>
                            <li><a href="" index="1">Gerenciar categorias</a></li>
                        </ul>
                    </li>
                    <li class="mobile <?php echo $display; ?>"><a href="" index="0">Adicionar categoria</a></li>
                    <li class="mobile <?php echo $display; ?>"><a href="" index="1">Gerenciar categorias</a></li>
                    <li class="action" dropdown="1">
                        <a href="">Postagens</a>
                        <span></span>
                        <ul class="dropdown">
                            <li><a href="" index="2">Adicionar postagem</a></li>
                            <li><a href="" index="3">Gerenciar postagens</a></li>
                        </ul>
                    </li>
                    <li class="mobile"><a href="" index="2">Adicionar postagem</a></li>
                    <li class="mobile"><a href="" index="3">Gerenciar postagens</a></li>
                    <li style="display:<?php echo $display; ?>;" class="action" dropdown="2">
                        <a href="">Usuários</a>
                        <span></span>
                        <ul class="dropdown">
                            <li><a href="" index="4">Adicionar usuário</a></li>
                            <li><a href="" index="5">Gerenciar usuários</a></li>
                        </ul>
                    </li>
                    <li class="mobile <?php echo $display; ?>"><a href="" index="4">Adicionar usuário</a></li>
                    <li class="mobile <?php echo $display; ?>"><a href="" index="5">Gerenciar usuários</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Blog</a></li>
                    <li><a href="?logout">Sair</a></li>
                </ul>
            </div>
            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </header>

        <div class="main">
            <div class="window dashboard">
                <div class="profile-info">
                    <div class="section-title">Meu perfil</div>
                    <div class="profile-photo">
                        <img src="<?php echo INCLUDE_PATH_ADMIN.$_SESSION['myblog-profile-photo']; ?>" alt="Foto de perfil" />
                    </div>
                    <div class="info">
                        <?php
                            echo '<div>Nome: '.$_SESSION['myblog-name'].'</div><br>';
                            echo '<div>Nome de usuário: '.$_SESSION['myblog-user'].'</div><br>';
                            echo '<div>Email: '.$_SESSION['myblog-email'].'</div><br>';
                            echo '<div>Permissão: '.$_SESSION['myblog-role-name'].'</div>';
                        ?>
                    </div>
                    <div class="action-btn edit"><a href="" name="edit" index="<?php echo $_SESSION['myblog-id']; ?>">Editar</a></div>
                </div>
                <div class="statistics">
                    <div class="section-title">Estatísticas</div>
                    <div class="totals">
                        <div class="total-categories">
                            Categorias:
                            <?php
                                $sql = $pdo->prepare("SELECT COUNT(*) FROM `tb_categories`");    
                                $sql->execute();
                                echo $sql->fetchColumn();
                            ?>
                        </div>
                        <div class="total-posts">
                            Postagens:
                            <?php
                                $sql = $pdo->prepare("SELECT COUNT(*) FROM `tb_posts`");    
                                $sql->execute();
                                echo $sql->fetchColumn();
                            ?>
                        </div>
                        <div class="total-users">
                            Usuários:
                            <?php
                                $sql = $pdo->prepare("SELECT COUNT(*) FROM `tb_admin_users`");    
                                $sql->execute();
                                echo $sql->fetchColumn();
                            ?>
                        </div>
                    </div>
                    <div class="charts">
                        <div class="chart1">
                            <div class="title">Postagens por categoria:</div>
                            <canvas id="myChart1">
                        </div>
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
