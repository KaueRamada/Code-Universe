<?php include 'header.php'; ?>

<main>
    <section class="posts">
        <h1 class="title">Posts</h1>
        <div class="posts-content">
        <?php
            $categoryName = $_GET['category'];
            $sql = $pdo->prepare("SELECT id FROM `tb_categories` WHERE name = ?");
            $sql->execute(array($categoryName));
            $categoryId = $sql->fetchColumn();

            $sql = $pdo->prepare("SELECT * FROM `tb_posts` WHERE category_id = ? AND published = 1");
            $sql->execute(array($categoryId));
            if($sql->rowCount() == 0) {
                echo 'Nenhum post com a categoria "'.$categoryName.'"';
            } else {
                $posts = $sql->fetchAll(PDO::FETCH_ASSOC);
                foreach($posts as $key => $value) { 
                    $sql = $pdo->prepare("SELECT `name` FROM `tb_categories` WHERE id = ?");
                    $sql->execute(array($value['category_id']));
                    $category = $sql->fetchColumn();
                    echo '
                    <div class="post">
                        <div class="image">
                            <img src="'.INCLUDE_PATH_ADMIN.$value['thumbnail'].'" alt="" />
                        </div>
                        <div class="content">
                            <div class="title">'.$value['title'].'</div>
                            <div class="subtitle">'.$value['subtitle'].'</div>
                            <div class="read-more"><a href="article?id='.$value['id'].'">Ler mais</a></div>
                            <div class="category">'.$category.'</div>
                        </div>
                    </div>
                    ';
                }
            }
        ?>
        </div>
    </section>
</main>
