<?php
    require '../config/config.php';
    $data = [];

    $sql = $pdo->prepare("SELECT * FROM `tb_categories`");
    $sql->execute();
    if($sql->rowCount() > 0) {
        $data['categories'] = $sql->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $data['error'] = '<p style="margin-bottom: 20px;color:#777;">Nenhuma categoria cadastrada</p>';
    }
    
    die(json_encode($data));
?>
