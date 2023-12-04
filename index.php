<?php
include __DIR__ . "/Views/header.php";
include __DIR__ . "/Model/Movie.php"
    ?>

<main>
    <div class="container">
        <section>Sezione</section>
        <div class="row ">
            <?php foreach ($movies as $movie) {
                $movie->printCard();
            } ?>
        </div>
    </div>
</main>

<?php
include __DIR__ . "/Views/footer.php"; ?>