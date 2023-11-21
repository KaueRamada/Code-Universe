<main class="article">
    <?php include 'header.php'; ?>
    <section class="article">
        <div class="outer-container">
            <div class="inner-container">
                <div class="content-article">
                    <?php
                    if (isset($_GET['id'])) {
                        $sql = $pdo->prepare("SELECT `post` FROM `tb_posts` WHERE id = ?");
                        $sql->execute(array($_GET['id']));
                        $post = $sql->fetchColumn();
                        echo $post;
                    }
                    ?>
                </div>
            </div>
        </div>
        <section>
</main>