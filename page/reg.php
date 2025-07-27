<?php
    session_start();
    include '../inc/header.php';
?>

    <section>
        <div class="container w-50 mt-5" style="min-height:88vh">
            <h2 class="text-center">Регистрация</h2>
            <?php
                if ($_GET['message']) {
                    echo "<div class='d-flex justify-content-center'> 
                                     <p class='text-danger'>{$_GET['message']}</p>
                                </div>";
                }
                if ($_GET['message_hesh']) {
                    echo "<div class='d-flex justify-content-center'> 
                                     <p class='text-danger'>{$_GET['message_hesh']}</p>
                                </div>";
                }
            ?>
            <form action="../controller/registration.php" method="post" class="needs-validation" novalidate>
                
                <div class="form-group mb-2">
                    <label for="validationCustom01" class="form-label ">Фамилия</label>
                    <input type="text" class="form-control" id="validationCustom01" name="surname" pattern="^[А-Яа-яЁё]+$" required>
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Введите вашу фамилию
                    </div>
                </div>

                <div class="form-group mb-2">
                    <label for="validationCustom02" class="form-label">Имя
                    </label>
                    <input type="text" class="form-control" id="validationCustom02" name="name" required>
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Введите ваше имя
                    </div>
                </div>

                <div class="form-group mb-2">
                    <label for="validationCustom03" class="form-label">Отчество
                    </label>
                    <input type="text" class="form-control" id="validationCustom03" name="patronymic" required>
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Введите ваше отчество
                    </div>
                </div>

                <div class="form-group mb-2">
                    <label for="validationCustom04" class="form-label">Логин
                    </label>
                    <input type="text" class="form-control" id="validationCustom04" name="login" required>
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Придумайте логин
                    </div>
                </div>

                <div class="form-group mb-2">
                    <label for="validationCustom05" class="form-label">Электронная почта
                    </label>
                    <input type="email" class="form-control" id="validationCustom05" name="email" required>
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Пример: Mail@mail.ru
                    </div>
                </div>

                <div class="form-group mb-2">
                    <label for="validationCustom06" class="form-label">Телефон</label>
                    <input type="tel" class="form-control" id="validationCustom06" name="phone" 
                           pattern="^+7(d{3})-d{3}-d{2}-d{2}$" 
                           placeholder="+7(XXX)-XXX-XX-XX" required>
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Пожалуйста, введите номер телефона в формате +7(XXX)-XXX-XX-XX.
                    </div>
                </div>


                <div class="form-group mb-2">
                    <label for="validationCustom07" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="validationCustom07" name="password" minlength="6" required>
                    <div class="valid-feedback">
                        Пароль соответствует требованиям
                    </div>
                    <div class="invalid-feedback">
                        Необходимо ввести не менее 6 символов
                    </div>
                </div>

                <div class="form-group mb-2">
                    <label for="validationCustom08" class="form-label">Подтвердите пароль
                    </label>
                    <input type="password" class="form-control" id="validationCustom08" name="password-repeat" required>
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                        Подтвердите пароль
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-outline-dark">Регистрация</button>
                </div>
            </form>
        </div>
    </section>

<?php
    include '../inc/footer.php';
?>