<?php
    require '../config/config.php';
    $data = [];
    $form_name = (isset($_POST['formName'])) ? $_POST['formName'] : '';
    $action_name = (isset($_POST['actionName'])) ? $_POST['actionName'] : '';
    $index = (isset($_POST['index'])) ? $_POST['index'] : '';

    $data['formName'] = $form_name;
    $tableName = '';
    if($form_name == 'category') {
        $tableName = 'tb_categories';
    } else if($form_name == 'post') {
        $tableName = 'tb_posts';
    } else if($form_name == 'user') {
        $tableName = 'tb_admin_users';
    }

    $data['table'] = $tableName;
    $data['action'] = $action_name;
    $data['index'] = $index;

    if($action_name == 'edit' || $action_name == 'edit-password') {
        try {
            $sql = $pdo->prepare("SELECT * FROM `".$tableName."` WHERE id = ?");
            $sql->execute(array($index));
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $data['row'] = $row;

            if($form_name == 'post') {
                $sql = $pdo->prepare("SELECT * FROM `tb_admin_users` WHERE id = ?");
                $sql->execute(array($row['author_id']));
                $data['author'] = $sql->fetch(PDO::FETCH_ASSOC);
            }

            $data['success'] = true;
        } catch(PDOException $e) {
            $data['success'] = false;
            $data['error'] = "Erro ao editar campo";
            $data['error'] .= $e->getMessage();
        }
    } else if($action_name == 'delete') {
        try {
            $sql = $pdo->prepare("DELETE FROM `".$tableName."` WHERE id = ?");
            $sql->execute(array($index));
            $data['success'] = true;
        } catch(PDOException $e) {
            $data['success'] = false;
            $data['error'] = "Erro ao excluir campo";
        }
    } else {
        $data['error'] = "Erro no nome da ação";
    }

    die(json_encode($data));
?>
