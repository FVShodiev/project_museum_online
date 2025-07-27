<?php
    session_start();
    include '../function/connect.php';
    
    $stmt = $connect->prepare("INSERT INTO `users`(`surname`, `name`, `patronymic`, `login`, `email`, `phone`, `password`, `role`) VALUES
        (?,?,?,?,?,?,?,?)");
    
    $log=$_POST['login'];
    $checklog=$connect->prepare("SELECT count(*) FROM users WHERE login=?");
    $checklog->bind_param("s",$log);
    $checklog->execute();
    $checklog->bind_result($checklogin);
    $checklog->fetch();
    $checklog->close();

    if ($checklogin>0) {
        header("location: ../page/reg.php?message=Логин уже занят!");
        exit;
    }



    if($_POST['password'] != $_POST['password-repeat']){
        header("location: ../page/reg.php?message=Пароли не совпадают!");
        exit;
    }else{
        if($stmt){
            $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $role="Пользователь";
            $stmt->bind_param("ssssssss",
            $_POST['surname'],
            $_POST['name'],
            $_POST['patronymic'],
            $_POST['login'],
            $_POST['email'],
            $_POST['phone'],
            $hashed_password,
            $role);
        }

        if(!$stmt->execute()){
            header('location: ../page/reg.php?message_hesh=Не удачное хеширование пароля');
            exit;
        }else{
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['role'] = $role;
            header("location: ../page/profile.php");
            exit;
        }
    }

 ?>