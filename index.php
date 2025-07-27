<?php

  session_start();

  $files=['inc/header.php','function/function.php','controller/slider.php'];
  foreach ($files as $file) {
    include $file;
  }

?>

  <section>
    <div class="container">
      <button onclick="scrollToTop()" id="scrollToTopBtn" title="Наверх" class="rounded">&and;</button>
      
      <h4 class="text mt-5">Лекция</h4>
        <hr class="featurette-divider">
          <div class="row featurette text-center">
            <div class="col-md-7 order-md-2 py-5">
              <h5 class="featurette-heading fw-normal lh-1">Минералы и горные породы</h5>
              <p class="text">Добро пожаловать на лекцию! Сегодня мы познакомимся с основами минералогии — науки, изучающей минералы, их свойства, классификацию и способы идентификации.</p>
              <p>
                Сперва разберем основные понятия, минералы — это естественные, неорганические вещества с определённым химическим составом и кристаллической структурой. Они образуются в результате геологических процессов и являются строительными блоками горных пород. Горные породы — это агрегаты одного или нескольких минералов, которые образуют часть земной коры. Горные породы можно классифицировать на три основные группы: магматические, осадочные и метаморфические.
              </p>
              <div class="col d-flex justify-content-center mt-4">
                <a href="page/info.php" class="btn btn-outline-dark fw-semibold">Подробнее</a>
              </div>
            </div>
            <div class="col-md-5 order-md-1">
              <img class="card-img rounded" src="img/lecture/Минералы и горные породы.jpg">
            </div>
          </div>

      <h4 class="text mt-5">Мероприятия</h4>
        <hr class="featurette-divider">
          <p class="text mb-4">
            Мероприятие проводится весь рабочий день, то есть с 11:00 до 18:00. Мы ждём ваш визит и будем рады видеть вас на наших мероприятиях! Не упустите возможность узнать много нового и интересного.
          </p>
          <div class="mt-3">
            <div class="row row-cols-1 row-cols-md-3 g-3">
              <?php
                echo GetIndexEvent();
              ?>
            </div>
            <div class="col d-flex justify-content-center mt-4">
              <a href="page/events.php" class="btn btn-outline-dark fw-semibold">Подробнее</a>
            </div>
          </div>
    </div>            
  </section>

<?php
  include 'inc/footer.php';
?>
