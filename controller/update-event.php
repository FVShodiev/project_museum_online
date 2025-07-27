<?php
    include '../function/connect.php';

    if(isset($_GET['action'])){
        switch ($_GET['action']) {
            case 'cancel':
                $sql = sprintf("UPDATE `events` SET `status`='Скоро' WHERE `event_id` = '%s'",$_GET['id']);
                $connect -> query($sql);
                header("Location: /admin/");
                exit;
            case 'delet':
                $sql = sprintf("DELETE FROM `events` WHERE `event_id` = '%s'",$_GET['id']);
                $connect -> query($sql);
                header("Location: /admin/");
                exit;
        }
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'], $_POST['date'])) {
        
        $ID = $_POST['id'];
        $date = $_POST['date'];

        $sql = "UPDATE `events` SET `date` = ?, `status` = 'Активен' WHERE `event_id` = ?";

        if ($stmt = $connect->prepare($sql)) {
            $stmt->bind_param("si", $date, $ID);

            if ($stmt->execute()) {
                header("Location: ../admin/");
                exit;
            } else {
                echo "Ошибка обновления данных: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Ошибка подготовки запроса: " . $connect->error;
        }
    } else {
        echo "Ошибка в коде";
    }


?>