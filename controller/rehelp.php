<?php
    // ответ администратора
    session_start();
    include '../function/connect.php';

    $sql=sprintf("INSERT INTO `rehelp`(`user_id`, `text`) VALUES ('%s','%s')",
    $_POST['id'],
    $_POST['text']);
    $connect->query($sql);

    header("location: ../admin/");
    exit;
?>