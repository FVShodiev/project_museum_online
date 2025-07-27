<?php
    // добавление нового мероприятия
    session_start();
    include '../function/connect.php';

    $sql=sprintf("INSERT INTO `events`(`name`, `date`, `description`,`img`,`status`) 
        VALUES 
        ('%s','%s','%s','%s','Ожидает подтверждения')",
    $_POST['name'],
    $_POST['date'],
    $_POST['description'],
    $_POST['img']);
    
    if(!$connect -> query($sql)){
        echo "Ошибка получения данных";
    }

    header("location: ../admin/");
    exit;

?>