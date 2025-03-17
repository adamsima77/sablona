<?php include_once "parts/header.php"?>
<?php include "parts/nav.php" ?>
<?php include "functions/function.php";?>

        <main>
            <section class="banner">
                <div class="container text-white">
                    <h1>Portfólio</h1>
                </div>
            </section>

            <?php portfolio("json/data.json"); ?>

        </main>
        <?php include_once "parts/footer.php"?>