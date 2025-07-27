<?php
  session_start();
  if ($_SESSION['role'] != "Администратор") {
    header("Location: ../page/profile.php");
    exit;
  }
  include '../inc/header.php';
  include '../function/function.php';
?>

<div class="container " style="min-height:88vh">
  <button onclick="scrollToTop()" id="scrollToTopBtn" title="Наверх" class="rounded">&and;</button>
 
  <h2 class="text-center p-2 pt-5">Панель администратора</h2>

  <div class="bd-example-snippet bd-code-snippet">
    <div class="bd-example m-0 border-0">
      <nav>
        <div class="nav nav-tabs mb-3 mt-4" id="nav-tab" role="tablist">
          <button class="nav-link active fw-semibold" id="nav-reservation-tab" data-bs-toggle="tab" data-bs-target="#nav-reservation"
            type="button" role="tab" aria-controls="nav-reservation" aria-selected="true">Записи в музей</button>
          <button class="nav-link fw-semibold" id="nav-event-tab" data-bs-toggle="tab" data-bs-target="#nav-event" type="button"
            role="tab" aria-controls="nav-event" aria-selected="false">Управление мероприятиями</button>
          <button class="nav-link fw-semibold" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button"
            role="tab" aria-controls="nav-contact" aria-selected="false">Обращение пользователей</button>
          <button class="nav-link fw-semibold" id="nav-eksponats-tab" data-bs-toggle="tab" data-bs-target="#nav-eksponats"
            type="button" role="tab" aria-controls="nav-eksponats" aria-selected="false">Управление экспонатами</button>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-reservation" role="tabpanel" aria-labelledby="nav-reservation-tab">
          <div class="row row-cols-1 row-cols-md-2 g-3 mb-5 mt-3">
            <?php
            echo GetUpdateReservation();
            ?>
          </div>
        </div>
        <div class="tab-pane fade" id="nav-event" role="tabpanel" aria-labelledby="nav-event-tab">
          <div class="row row-cols-1 row-cols-sm-2 g-3 mt-3 mb-3">
            <div class="col">
              <h5 class="text mb-2">Добавить мероприятие</h5>
                  <button type="submit" class="btn btn-outline-dark m-1 fw-semibold" data-bs-toggle="modal"
                      data-bs-target="#UpdateModalEvent">
                      Добавить
                  </button>
            </div>
            <div class="col">
              <h5 class="text mb-2">Статистика</h5>
              <div class="card p-3 mb-3">
                <h6>Кол-во пользователей: <?php echo GetUsers() ?></h6>
              </div>
              <div class="card p-3 mb-3">
                <h6>Кол-во участников в мероприятиях: <?php echo GetActivUsers() ?></h6>
              </div>
            </div>
          </div>
          <h5 class="text mt-5">Мероприятия</h5>
          <hr class="featurette-divider">
          <div class="row row-cols-1 row-cols-md-2 g-3 mt-3 mb-5">
            <?php
            echo GetUpdateEvents();
            ?>
          </div>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
          <div class="row row-cols-1 row-cols-md-2">
            <form action="../controller/rehelp.php" method="post" class="m-auto">
              <div class="mb-3">
                  <label for="name" class="text mb-2">ID пользователя</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="id" required>
              </div>
              <div class="mb-3">
                  <label for="name" class="text mb-2">Текст</label>
                  <textarea class="form-control shadow-sm  p-3 rounded" id="message" name="text" rows="3"></textarea>
              </div>
              <div class="d-flex justify-content-end">
                  <input type="submit" class="btn btn-outline-dark shadow-sm rounded fw-semibold" value="Отправить">
              </div>
            </form>
            <div>
              <p class="text-danger fw-semibold">Важное</p>
              <?
                echo GetAlertHelp()
              ?>
            </div>
          </div>
          <hr class="featurette-divider">
          <div class="row row-cols-1 row-cols-sm-2 g-3 mt-3 mb-5">
            <?php
              echo GetHelp();
            ?>
          </div>
        </div>
        <div class="tab-pane fade" id="nav-eksponats" role="tabpanel" aria-labelledby="nav-eksponats-tab">
          <div class="container w-75 ">
            <h5 class="mt-5">Добавить экспонат</h5>
            <form action="../controller/eksponats.php" method="post">
              <div class="form-group mt-3">
                <label for="name">Название экспоната:</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="form-group mt-3">
                <label for="description">Описание:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
              </div>
              <div class="form-group mt-3">
                <label for="edu_name">Причина такого наименовения:</label>
                <textarea class="form-control" id="edu_name" name="edu_name" rows="3" required></textarea>
              </div>
              <div class="form-group mt-3">
                <label for="interesting_facts_1">Интересные факты:</label>
                <input type="text" class="form-control" id="interesting_facts_1" name="interesting_facts_1">
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" id="interesting_facts_2" name="interesting_facts_2">
              </div>
              <div class="form-group mt-3 mb-3">
                <input type="text" class="form-control" id="interesting_facts_3" name="interesting_facts_3">
              </div>
              <div class="form-group mt-3 mb-3">
                <label for="interesting_facts_3">Ссылка на изображение</label>
                <input type="text" class="form-control" id="interesting_facts_3" name="img">
              </div>
              <div class="form-group mt-3 mb-3">
                <label for="interesting_facts_3">Ссылка на 3D модель</label>
                <input type="text" class="form-control" id="interesting_facts_3" name="model">
              </div>
              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-outline-dark m-1 fw-semibold">Отправить</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<div class="modal fade" id="exampleModalDefault" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Обновление мероприятия</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="p-3" action="../controller/update-event.php" method="post" enctype="form-data">
          <div class="form-group mb-3">
            <label for="id" class="text mb-2">ID мероприятия</label>
            <input type="text" class="form-control w-25" id="id" name="id" required>
          </div>
          <div class="form-group mb-3">
            <label for="date" class="mb-2">Дата</label>
            <input type="date" class="form-control" id="date" name="date" required>
          </div>
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-outline-dark m-1 fw-semibold">
              Обновить
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="UpdateModalEvent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="UpdateModalEvent">Добавление мероприятия</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                <form class="p-3" action="../controller/create-event.php" method="post">
                  <div class="form-group mb-3">
                    <label for="name" class="text mb-2">Название</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="name" required>
                  </div>
                  <div class="form-group mb-3">
                    <label for="date" class="mb-2">Дата</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                  </div>
                  <div class="form-group mb-3">
                    <label for="description" class="mb-2">Описание</label>
                    <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                  </div>
                  <div class="form-group mb-3">
                    <label for="name" class="text mb-2">Ссылка на изображение</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="img" required>
                  </div>
                  <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-dark m-1 fw-semibold">
                      Добавить
                    </button>
                  </div>
                </form>

      </div>
    </div>
  </div>
</div>

<?php
include "../inc/footer.php";
?>