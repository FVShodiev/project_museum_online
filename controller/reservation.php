<?php
    //отправка данных формы бронирования 
    session_start();
    include '../function/connect.php';

    $select=sprintf("SELECT `user_id` FROM `users` WHERE `login`='%s'", $_SESSION['login']);
    $select_result=$connect->query($select);
    $select_row=$select_result->fetch_assoc();
    $id_user=$select_row['user_id'];

    $sql=sprintf("INSERT INTO `reservation`( `user_id`, `day`, `time`,`status`, `message`) 
    VALUES 
    ('%s','%s','%s','%s','%s')",
    $id_user,$_POST['day'],$_POST['time'],"На рассмотрении",$_POST['message']);
    $connect->query($sql);

    header("location: ../page/profile.php");
    exit;
?>