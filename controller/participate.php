<?php
    session_start();
    include '../function/connect.php';
    
    if(!isset($_SESSION['login'])){
        header("Location: ../page/authorization.php");
        exit;
    }else{

        if(isset($_GET['id'])){

        $select=sprintf("SELECT `user_id` FROM `users` WHERE `login`='%s'", $_SESSION['login']);
        $select_result=$connect->query($select);
        $select_row=$select_result->fetch_assoc();
        $id_user=$select_row['user_id'];

        $sql=sprintf("INSERT INTO `activ-event`(`event_id`, `user_id`) 
        VALUES 
        ('%s','%s')",
        $_GET['id'],$id_user);
        $connect->query($sql);

        header("location: ../page/events.php?message=Ждем ваш визит");
        exit;
        
        }
    }
?>