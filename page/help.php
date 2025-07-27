<?php

  session_start(); 
  if(!isset($_SESSION['login'])){
    header("Location: authorization.php");
    exit;
  }
  include '../inc/header.php';

?> 

  <section>
    <div class="container w-50" style="min-height:88vh">
      <div class="col">
        <h2 class="text-center mt-5 mb-3">Опишите ошибку</h2>
        <p class="text">
          Прежде чем обратится к администратору пожалуйста прочитайте примерные ошибки с которыми пользователи могут столкнуться. Благодарим вас за сотрудничество.
        </p>
        <form action="../controller/help.php" method="post" class="m-auto">
          <div class="mb-3">
            <textarea class="form-control shadow-sm  p-3 rounded" id="message" name="message" rows="5"></textarea>
          </div>
          <div class="d-flex justify-content-end">
            <input type="submit" class="btn btn-outline-dark fw-semibold rounded" value="Отправить">
          </div>
        </form>
      </div>

      <div class="col m-0 border-0 mt-5">
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h4 class="accordion-header">
              <button class="accordion-button collapsed fw-semibold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseA" aria-expanded="false" aria-controls="collapseA">
                Не корректные даты в мероприятиях
              </button>
            </h4>
            <div id="collapseA" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                Скором временем администратор исправит данную ошибку, частая причина такой ошибки это какие либо технические неполадки.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h4 class="accordion-header">
              <button class="accordion-button collapsed fw-semibold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Ошибки в экспонатах
              </button>
            </h4>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                Все данные взяты из открытого источника и нашего музея, если есть предложения напишите нам.  
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h4 class="accordion-header">
              <button class="accordion-button collapsed fw-semibold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Не получается записаться в музей
              </button>
            </h4>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                Главная причина такой ошибки это то что вы ввели не правильную дату или время. Так же администратор может отменить запись по причине того что вы ввели не правильную дату или время. По возможности ожидайте так как администратор обязательно свяжется с вами. Если обрашения не было то напишите нам.
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