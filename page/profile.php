<?php 

  session_start();
    if(!isset($_SESSION['login'])){
      header("Location: authorization.php");
      exit;
    }

    if($_SESSION['role'] == "Администратор"){
      header("Location: ../admin/");
      exit;
    }

  include '../inc/header.php';
  include '../function/function.php';

?>

  <section>
    
    <button onclick="scrollToTop()" id="scrollToTopBtn" title="Наверх" class="rounded">&and;</button>
    
    <div class="container" style="min-height:88vh">
      <h2 class="text-center p-2 pt-5">Личный кабинет</h2>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="card p-3">
            <?php
              echo GetProfile($_SESSION['login']);
            ?>
          </div>
        </div>
      </div>
      
      <div class="bd-example-snippet bd-code-snippet">
        <div class="bd-example m-0 border-0">
          <nav>
            <div class="nav nav-tabs mb-3 mt-4" id="nav-tab" role="tablist">
              <button class="nav-link active fw-semibold" id="nav-user-reservation-tab" data-bs-toggle="tab" data-bs-target="#nav-user-reservation" type="button" role="tab" aria-controls="nav-user-reservation" aria-selected="true">
                Записи в музей
              </button>
              <button class="nav-link fw-semibold" id="nav-user-event-tab" data-bs-toggle="tab" data-bs-target="#nav-user-event" type="button" role="tab" aria-controls="nav-user-event" aria-selected="false">
                Мероприятия
              </button>
              <button class="nav-link fw-semibold" id="nav-user-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-user-contact" type="button" role="tab" aria-controls="nav-user-contact" aria-selected="false">
                Обратная связь
              </button>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-user-reservation" role="tabpanel" aria-labelledby="nav-user-reservation-tab">
              <div class="row row-cols-1 row-cols-md-2 g-3">
                <?php
                  echo GetProfileReservation($_SESSION['login']);
                ?>
              </div>
            </div>
            <div class="tab-pane fade" id="nav-user-event" role="tabpanel" aria-labelledby="nav-user-event-tab">
              <div class="row row-cols-1 row-cols-md-2 g-3">
                <?php 
                  echo GetUserActivEvent($_SESSION['login']);
                ?>
              </div>
            </div>
            <div class="tab-pane fade" id="nav-user-contact" role="tabpanel" aria-labelledby="nav-user-contact-tab">
              <div class="row row-cols-1 row-cols-md-2 g-3">
                <?php
                  echo GetReHelp($_SESSION['login']);
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php
  include '../inc/footer.php';
?>