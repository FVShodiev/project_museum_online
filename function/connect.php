<?php 
    $connect = new mysqli("localhost", "root", "", "db_m_o");

    if($connect->connect_error){
        die("Ошибка подключения к базе данных!");
    }
?>