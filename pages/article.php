<?php include 'header.php'; ?>

<main class="article">
    <div class="content">
    <?php
        if(isset($_GET['id'])) {
            $sql = $pdo->prepare("SELECT `post` FROM `tb_posts` WHERE id = ?");
            $sql->execute(array($_GET['id']));
            $post = $sql->fetchColumn();
            echo $post;
        }
    ?>
    </div>
</main>
