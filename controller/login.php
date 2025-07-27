<?php
    session_start();
    include '../function/connect.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $stmt = $connect->prepare("SELECT `user_id`, `login`, `password`, `role` FROM `users` WHERE `login` = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $db_login, $hashed_password, $role);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                $_SESSION['login'] = $db_login;
                $_SESSION['role'] = $role;
                header("Location: ../page/profile.php"); 
                exit;
            } else {
                header("Location: ../page/authorization.php?message=Логин или пароль не совпадает!");
                exit;
            }
        } else {
            header("Location: ../page/authorization.php?message=Логин или пароль не совпадает!");
            exit;
        }
    }
 ?>