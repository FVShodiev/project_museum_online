<?php
    session_start();
    include '../inc/header.php';
?>

    <section>
        <div class="container mt-5 w-50" style="min-height:88vh">
            <h2 class="text-center">Вход</h2>
            <?php
                if (isset($_GET['message'])) {
                    echo "<div class='d-flex justify-content-center'> 
                                <p class='text-danger'>{$_GET['message']}</p>
                            </div>";
                }
            ?>
            <form action="../controller/login.php" method="post" class="needs-validation" novalidate>
                <div class="form-group mb-2">
                    <label for="validationCustom04" class="form-label">
                        Логин
                    </label>
                    <input type="text" class="form-control" id="validationCustom04" name="login" required>
                    <div class="valid-feedback">
                        Логин соответствует требованиям
                    </div>
                    <div class="invalid-feedback">
                        Введите логин
                    </div>
                </div>

                <div class="form-group mb-2">
                    <label for="validationCustom07" class="form-label">
                        Пароль
                    </label>
                    <input type="password" class="form-control" id="validationCustom07" name="password" required>
                    <div class="valid-feedback">
                        Пароль соответствует требованиям
                    </div>
                    <div class="invalid-feedback">
                        Необходимо ввести пароль
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-outline-dark fw-semibold px-3">Вход</button>
                </div>
            </form>
        </div>
    </section>

<?php
    include '../inc/footer.php';
?>