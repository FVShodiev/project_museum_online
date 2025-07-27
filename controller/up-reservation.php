<?php
    include '../function/connect.php';
    
    if(isset($_GET['action'])){
        switch ($_GET['action']) {
            case 'success':
                $sql=sprintf("UPDATE `reservation` SET `status`='%s' WHERE `reservation_id`='%s'",'Подтвержден',$_GET['id']);
                $connect->query($sql);
                header("location: ../admin/");
                exit;
            
            case 'cancel':
                $sql=sprintf("UPDATE `reservation` SET `status`='%s' WHERE `reservation_id`='%s'",'Отменен',$_GET['id']);
                $connect->query($sql);
                header("location: ../admin/");
                exit;
        }
    }

?>