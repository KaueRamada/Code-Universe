<?php
    require '../config/config.php';
    $data = [];
    $data['posts'] = [];

    $sql = $pdo->prepare("SELECT * FROM `tb_categories`");
    $sql->execute();
    if($sql->rowCount() > 0) {
        $categories = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($categories as $key => $value) {
            $sql = $pdo->prepare("SELECT COUNT(*) FROM `tb_posts` WHERE category_id = ?");
            $sql->execute(array($value['id']));
            $data['posts'][] = $sql->fetchColumn();
        }
        $data['success'] = true;
    } else {
        $data['error'] = true;
    }
    
    die(json_encode($data));
?>
