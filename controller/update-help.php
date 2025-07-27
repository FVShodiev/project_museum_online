<?php
   include '../function/connect.php';

    // контроль комментариев 

    if(isset($_GET['action'])){
        switch ($_GET['action']) {
            case 'danger':
                $sql = sprintf("UPDATE `help` SET `status`='Важно' WHERE `help_id` = '%s'",$_GET['id']);
                $connect -> query($sql);
                header("Location: /admin/");
                exit;
            case 'delet':
                $sql = sprintf("DELETE FROM `help` WHERE `help_id` = '%s'",$_GET['id']);
                $connect -> query($sql);
                header("Location: /admin/");
                exit;
            case 'update':
                $sql=sprintf("UPDATE `help` SET `status`='Новое' WHERE `help_id`='%s'",$_GET['id']);
                $connect ->query($sql);
                header("Location: /admin/");
                exit;
        }
    }
?>