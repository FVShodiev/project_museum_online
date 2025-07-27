<?php
    session_start(); 
    include '../inc/header.php';
    include '../function/function.php';
?>

    <section>
        <div class="container mt-5" style="min-height:88vh">
            <button onclick="scrollToTop()" id="scrollToTopBtn" title="Наверх" class="rounded">&and;</button>
            
            <h2 class="text-center">Мероприятия музея</h2>
            
            <?php
                if(isset($_GET['message'])){
                    echo "<div class='d-flex justify-content-center'> 
                                <p class='text-success'>{$_GET['message']}</p>
                        </div>";
                }
            ?>
            
            <h4 class="text mt-3">Активные мероприятия</h4>
                <hr class="featurette-divider">
                <div class="row row-cols-1 row-cols-md-3 g-3 mt-3">
                    <?php
                       echo GetActivEvent();
                    ?>
                </div>


            <h4 class="text mt-5">Прошедшие мероприятия</h4>
                <hr class="featurette-divider">
                <div class="row row-cols-1 row-cols-md-3 g-3 mt-3 mb-3">
                    <?php
                       echo GetInactivEvent();
                    ?>
                </div>
        </div>
    </section>

<?php
    include '../inc/footer.php';
?>
