<?php
    session_start(); 
    include '../inc/header.php';
    include '../function/function.php';
?>

    <section>
        <div class="container">
            <button onclick="scrollToTop()" id="scrollToTopBtn" title="Наверх" class="rounded">&and;</button>
            
            <div class="d-flex justify-content-between align-items-center mt-5">
                <h4 class="featurette-heading">Экспонаты музея</h4>    
                <a href="eksponats.php" class="btn btn-sm btn-outline-dark mt-2 fw-semibold">Изображения
                </a>
            </div> 
            
            <?php
                echo Get3DEksponats();
            ?>
        </div>  
    </section>

<?php
    include '../inc/footer.php';
?>