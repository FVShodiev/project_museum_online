<?php
    // Отправка отзыва
    session_start();
    include '../function/connect.php';

    $select = sprintf("SELECT `user_id` FROM `users` WHERE `login` = '%s'", $_SESSION['login']);
    $select_result = $connect->query($select);
    $select_row = $select_result->fetch_assoc();
    $id_user = $select_row['user_id'];


    $sql=sprintf("INSERT INTO `help`(`user_id`, `text`, `status`) VALUES ('%s','%s','Новое')",
    $id_user,$_POST['message']);
    $connect->query($sql);

    header("location: ../page/profile.php");
    exit;
?>