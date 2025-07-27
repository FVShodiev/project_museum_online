<?php
  session_start();  

    $menu = "";

    if(isset($_SESSION['login'])){
        if($_SESSION['role'] == "Администратор"){
            $menu .= '<li class="nav-item">
                        <a class="nav-link text-dark p-2" href="../admin/">Админ панель</a>
                      </li>';
        }elseif ($_SESSION['role']=="Пользователь") {
          $menu .= '<li class="nav-item">
                      <a class="nav-link text-dark p-2" href="../page/profile.php">Личный кабинет</a>
                    </li>';
        }
        $menu .= '<li class="nav-item">
                    <a class="nav-link text-dark p-2" href="../controller/logout.php">Выход</a>
                  </li>';
    }else{
        $menu = '<li class="nav-item">
                  <a class="nav-link text-dark p-2" href="../page/reg.php">Регистрация</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link text-dark p-2" href="../page/authorization.php">Вход</a>
                </li>';
    }

?>

<!DOCTYPE html>
<html lang="ru">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="/assets/css/style.css">
      <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
      <link rel="icon" href="../img/logo.png" type="image/x-icon">
      <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
      <title>МузейОнлайн</title>
  </head>

  <section>
    <div class="container">
      <nav class="navbar navbar-dark bg-dark mt-2 py-4 p-4 rounded">
          <div class="container-fluid">
            <a class="navbar-brand fs-3 fw-semibold" href="../">МузейОнлайн</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
              <ul class="navbar-nav me-auto mb-2 fw-semibold">
                <li class="nav-item">
                  <a class="nav-link" href="../page/events.php">Мероприятия</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../page/eksponats.php">Экспонаты</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../page/3D eksponats.php">3D экспонаты</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../page/info.php">Лекции</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../page/reservation.php">Записаться</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle " href="#" data-bs-toggle="dropdown" aria-expanded="false">Профиль</a>
                  <ul class="dropdown-menu">
                    <?php
                      echo $menu;
                    ?>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
      </nav>
    </div>
  </section>
