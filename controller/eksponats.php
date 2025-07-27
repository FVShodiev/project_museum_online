<?php
    session_start();
    include '../function/connect.php';

    $sql=sprintf("INSERT INTO `eksponats`(`name`, `description`, `edu_name`,`interesting facts_1`,`interesting facts_2`,`interesting facts_3`,`img`,'3d_model') 
    VALUES ('%s','%s','%s','%s','%s','%s','%s','%s')",
    $_POST['name'],
    $_POST['description'],
    $_POST['edu_name'],
    $_POST['interesting_facts_1'],
    $_POST['interesting_facts_2'],
    $_POST['interesting_facts_3'],
    $_POST['img'],
    $_POST['model']);

    if(!$connect -> query($sql)){
        echo "Ошибка получения данных";
    } else {
        header("location: ../admin/");
        exit;
    }
?>