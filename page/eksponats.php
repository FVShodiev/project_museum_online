<?php
    session_start(); 
    include '../inc/header.php';
    include '../function/function.php';
?>

    <section>
        <button onclick="scrollToTop()" id="scrollToTopBtn" title="Наверх" class="rounded">&and;</button>
        
        <div class="container" style="min-height:88vh">
            <div class="d-flex justify-content-between align-items-center mt-5">
                <h4 class="featurette-heading">Экспонаты музея</h4>    
                <a href="3D eksponats.php" class="btn btn-sm btn-outline-dark mt-2 fw-semibold">3D экспонаты
                </a>
            </div>
            
            <?php
                echo GetEksponats();
            ?>
        </div>
    </section>

<?php
    include '../inc/footer.php';
?>