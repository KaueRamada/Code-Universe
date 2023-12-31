<main>
    <?php include 'header.php'; ?>
    <div class="loader-container">
        <div class="loader">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
    </div>
    <section class="posts" id="postsSection">
        <h1 class="title">POSTAGENS</h1>
        <div class="posts-content">
            <?php
            $searchTerm = isset($_GET['text']) ? $_GET['text'] : '';

            // Verificar se há um filtro de categoria
            $categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';

            if (!empty($searchTerm)) {
                if (!empty($categoryFilter)) {
                    $sql = $pdo->prepare("SELECT id FROM `tb_categories` WHERE name LIKE ?");
                    $sql->execute(array('%' . $categoryFilter . '%'));
                    $categoryId = $sql->fetchColumn();

                    $sql = $pdo->prepare("SELECT * FROM `tb_posts` WHERE (title LIKE ? OR category_id = ?) AND published = 1");
                    $sql->execute(array('%' . $searchTerm . '%', $categoryId));
                } else {
                    $sql = $pdo->prepare("SELECT * FROM `tb_posts` WHERE title LIKE ? OR category_id IN (SELECT id FROM `tb_categories` WHERE name LIKE ?) AND published = 1");
                    $sql->execute(array('%' . $searchTerm . '%', '%' . $searchTerm . '%'));
                }
            } else {
                if (!empty($categoryFilter)) {
                    $sql = $pdo->prepare("SELECT id FROM `tb_categories` WHERE name LIKE ?");
                    $sql->execute(array('%' . $categoryFilter . '%'));
                    $categoryId = $sql->fetchColumn();

                    $sql = $pdo->prepare("SELECT * FROM `tb_posts` WHERE category_id = ? AND published = 1");
                    $sql->execute(array($categoryId));
                } else {
                    $sql = $pdo->prepare("SELECT * FROM `tb_posts` WHERE published = 1");
                    $sql->execute();
                }
            }

            if ($sql->rowCount() == 0) {
                echo '<p style="color: white;">Nenhum post encontrado com o termo "' . $searchTerm . '"</p>';
            } else {
                $posts = $sql->fetchAll(PDO::FETCH_ASSOC);
                foreach ($posts as $key => $value) {
                    $sql = $pdo->prepare("SELECT `name` FROM `tb_categories` WHERE id = ?");
                    $sql->execute(array($value['category_id']));
                    $category = $sql->fetchColumn();
                    echo '
        <div class="post">
            <div class="image">
                <img src="' . INCLUDE_PATH_ADMIN . $value['thumbnail'] . '" alt="" />
            </div>
            <div class="content">
                <div class="title">' . $value['title'] . '</div>
                <div class="subtitle">' . $value['subtitle'] . '</div>
                <div class="read-more"><a href="article?id=' . $value['id'] . '">Ler mais</a></div>
                <div class="category">' . $category . '</div>
            </div>
        </div>
        ';
                }
            }

            ?>
        </div>
    </section>
</main>