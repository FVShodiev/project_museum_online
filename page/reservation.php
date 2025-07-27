<?php
    session_start(); 
    if(!isset($_SESSION['login'])){
        header("Location: authorization.php");
        exit;
    }
    include '../inc/header.php';
?>

    <sectio>
        <div class="container mt-5 w-50" style="min-height:88vh">
            <h2 class="text-center text-dark">Запись в музей</h2>
            <p class="text-danger fw-semibold pt-4">
                Ежедневно с 11:00 до 18:00
            </p>
            <form action="../controller/reservation.php" method="post">
                <div class="form-group mb-3">
                    <label for="date">Дата посещения</label>
                    <input type="date" class="form-control" id="date" name="day" required>
                </div>
                <div class="form-group mb-3">
                    <label for="time">Время посещения</label>
                    <input type="time" class="form-control" id="time" name="time" required>
                </div>
                <div class="form-group mb-3">
                    <label for="comments">Комментарии</label>
                    <textarea class="form-control" id="comments" rows="3" placeholder="Введите ваши комментарии (по желанию)" name="message"></textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-dark fw-semibold">Записаться</button>
                </div>
            </form>
        </div>
    </section>

<?php
    include '../inc/footer.php';
?>